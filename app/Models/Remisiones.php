<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remisiones extends Model
{
    use HasFactory;


    protected $table = "remisiones";
    protected $fillable =[
        'id',
        'fecha',
        'total',
        'cliente_id',
        'usuario_creacion'
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
