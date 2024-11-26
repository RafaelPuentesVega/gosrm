<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    use HasFactory;

    protected $table = "orden_servicio";
    protected $primaryKey = 'id_orden'; // Nombre de la clave primaria
    public $incrementing = true;       // Si es una clave autoincremental
    protected $keyType = 'int';        // Tipo de la clave primaria
    protected $fillable = [
        'id_orden',
        'id_cliente_orden',
        'fecha_creacion_orden',
        'fecha_estimada_orden',
        'fecha_entrega_orden',
        'id_equipo_orden',
        'accesorios_orden',
        'serial_adaptador_orden',
        'verifica_funcionamiento_orden',
        'servicio_orden',
        'caracteristicas_equipo_orden',
        'descripcion_dano_orden',
        'id_tecnico_orden',
        'garantia_orden',
        'contrato_orden',
        'id_cliente_usuario_orden',
        'emailSend',
        'estadoOrden',
        'reporte_tecnico_orden',
        'valor_servicio_orden',
        'iva_orden'

    ];
    public $timestamps = false;
}
