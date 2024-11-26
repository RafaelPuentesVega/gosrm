<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $table = "stock_movements";

    protected $fillable = [
        'product_id',
        'type', 
        'quantity',
        'origin',
        'number_origin'];

    public function product()
    {
        return $this->belongsTo(Productos::class);
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}