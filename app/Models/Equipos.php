<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $table = "equipo";
    protected $fillable =[

        'equipo_tipo',
        'equipo_marca',
        'equipo_referencia',
        'equipo_serial',
        'equipo_byg'
];
}
