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
        'metodo_pago',
        'usuario_creacion',
        'tipoPago'
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class,  'cliente_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleRemisiones::class , 'remision_id' );
    }


    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
