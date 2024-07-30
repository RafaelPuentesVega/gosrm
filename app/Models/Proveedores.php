<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = "proveedores";

    protected $fillable = [
        'nombre',
        'ciudad', 
        'celular',
        'documento'
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}