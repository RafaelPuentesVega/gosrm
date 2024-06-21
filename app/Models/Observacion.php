<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;

    protected $table = "observacion";
    protected $fillable = [
        'id_observacion',
        'id_ordenServicio',
        'tipo_observacion',
        'descripcion_observacion',
        'user_observacion',
        'created_at_observacion',
        'delete_at_observacion'
    ];
    public $timestamps = false;
}
