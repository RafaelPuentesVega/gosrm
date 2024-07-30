<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;


    protected $table = "productos";
    protected $fillable =[
        'id',
        'nombre',
        'descripcion',
        'precio',
        'id_categoria',
        'marca',
        'modelo',
        'estado',
        'cantidad_stock',
        'proveedor',
        'precio_compra',	
        'codigo_barras'
    ];

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
