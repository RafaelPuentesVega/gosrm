<?php

namespace App\Services;

use App\Models\MovimientosCaja;
use App\Models\Product;
use App\Models\Productos;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class MovimientoCajaService
{
    //Guardar movimientos en la caja
    public function guardarMovimientoCaja($data)
    {
        
        $saveData = [
            "valor" => $data['valor'],
            "descripcion" => $data['descripcion'],
            "tipo" => $data['tipo'],
            "orden_id" => $data['orden_id'],
            "user_creation" => $data['user_creation'],
            "metodo_pago" => $data['metodo_pago']
        ];
        // Verificar si 'ruta_soporte' está presente y tiene un valor
        if (isset($data['ruta_soporte']) && !empty($data['ruta_soporte'])) {
            $saveData['ruta_soporte'] = $data['ruta_soporte'];
        }
        MovimientosCaja::create($saveData);

    }


}
