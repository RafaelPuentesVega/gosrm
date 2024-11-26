<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Productos;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class StockService
{
    //actualiza el stock
    public function adjustStock($productId, $quantity, $type , $origin , $originNumber)
    {
        DB::transaction(function () use ($productId, $quantity, $type, $origin , $originNumber) {
            $product = Productos::findOrFail($productId);

            if ($type == 'ingreso') {
                $product->increment('cantidad_stock', $quantity);
            } elseif ($type == 'salida') {
                $product->decrement('cantidad_stock', $quantity);
            } else {
                throw new \Exception('Invalid stock Tipo de movimiento.');
            }

            StockMovement::create([
                'product_id' => $productId,
                'type' => $type,
                'quantity' => $quantity,
                'origin' => $origin,
                'number_origin' => $originNumber
            ]);
        });
    }
    //actualiza el ultimo proveedor y valor
    public function updateLastValueAndSupplier($productId, $lastValue, $lastSupplier)
    {
        $product = Productos::findOrFail($productId);

        $product->update([
            'precio_compra' => $lastValue,
            'proveedor' => $lastSupplier,
        ]);
    }
}
