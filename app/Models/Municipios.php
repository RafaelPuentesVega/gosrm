<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $table = "municipios";
    protected $fillable = [
        'municipio_id',
        'municipio_codigo',
        'municipio_departamento_id',
        'municipio_nombre'
    ];
    public $timestamps = false;

    public static function municipios($municipio_id){
        return Municipios::where('municipio_departamento_id','=','$departamento_id')->get();
    }
}
