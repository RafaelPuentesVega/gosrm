<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    protected $table = "tipo_equipo";
    protected $fillable = [
        'id_equipoo_id',
        'nombre_tipo_equipo',
        'user_created_tipo_equip',
        'created_at_tipo_equip'
    ];
    public $timestamps = false;}
