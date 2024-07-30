<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidos extends Model
{
    use HasFactory;


    protected $table = "detalle_pedidos";
    protected $fillable =[
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
