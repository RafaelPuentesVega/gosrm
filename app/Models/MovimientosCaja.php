<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientosCaja extends Model
{
    use HasFactory;


    protected $table = "movimientos_caja";
    protected $fillable =[

        'id',
        'valor',
        'metodo_pago',
        'descripcion',
        'tipo',
        'orden_id',
        'user_creation',
        'ruta_soporte'
];
}
