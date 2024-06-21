<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionesEmail extends Model
{
    use HasFactory;
    protected $table = "parametrosnotificaciones";
    protected $fillable = [
        'id',
        'descripcion',
        'dias',
        'created_at'
    ];
    public $timestamps = false;
}
