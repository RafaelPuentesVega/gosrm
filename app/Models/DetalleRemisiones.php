<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRemisiones extends Model
{
    use HasFactory;


    protected $table = "detalle_remisiones";
    protected $fillable =[
        'remision_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function remision()
    {
        return $this->belongsTo(Remisiones::class);
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class , 'producto_id');
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
