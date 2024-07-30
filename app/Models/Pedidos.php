<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;


    protected $table = "pedidos";
    protected $fillable =[
        'id',
        'fecha',
        'total',
        'proveedor_id',
        'metodo_pago',
        'tipo_transaccion',
        'usuario_creacion'
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
