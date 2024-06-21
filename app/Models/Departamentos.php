<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;

    protected $table = "departamentos";
    protected $fillable = [
        'departamento_id',
        'departamento_nombre',
        'departamento_codigo'
    ];
    public $timestamps = false;
}
