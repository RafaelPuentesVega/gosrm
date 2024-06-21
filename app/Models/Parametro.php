<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model

{
    use HasFactory;


    public $timestamps = false;

    protected $table = "servicio";
    protected $fillable =[
        'id_servicio',
        'nombre_servicio'
];
}
