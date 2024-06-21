<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plantillanotificaciones extends Model
{
    use HasFactory;
    protected $table = "plantillanotificaciones";
    protected $fillable =[
        'id_plantillanotificaciones',
        'nombre',
        'descripcion',
        'path',
        'created_at',
        'updated_at',
        'delete_at'
    ];
}
