<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametrosDetalle extends Model
{
    use HasFactory;


    protected $table = "parametros";
    protected $fillable =[
        'id_parametro',
        'nombre',
        'descripcion',
        'valor',
        'created_at',
        'delete_at'
    ];
}
