<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioEmpresa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "usuario_empresa";
    protected $fillable =[
    'id_cliente_usuario',
    'usuario_dependencia',
    'usuario_nombre',
    'usuario_celular',
    'usuario_created_at'
];
}
