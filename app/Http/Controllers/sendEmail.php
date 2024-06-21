<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class sendEmail extends Controller
{
    public static function ordenSalidaEmail($pdf , $array )
    {

        $arrayDatos = [
            'correo'=> $array->cliente_correo,
            'orden' => $array->id_orden,
            'nombre' => $array->cliente_nombres,
            'equipo' => $array->equipo_tipo,
            'marca' => $array->equipo_marca,
            'referencia' => $array->equipo_referencia,
            'serial'=>$array->equipo_serial
        ];

        Mail::send('modulos.email.emailOrdenSalida',["datos"=>$arrayDatos] , function($message) use ($arrayDatos,$pdf){
            $numeroOrden = $arrayDatos['orden'];
            $correoCliente = $arrayDatos['correo'];
            $message->from('refillmatesas@gmail.com' , 'Refill Mate');
            $message->to($correoCliente);
            $message->subject('Refill Mate - Orden de entrega Numero '.$numeroOrden);
            $message->attachData($pdf->output(),'Orden Salida Numero ' .($numeroOrden).' .pdf');
        });
    }
    public static function restablecerContraseñaEmail($url , $array)
    {

        $arrayDatos = [
            'correo'=> $array->cliente_correo,
            'orden' => $array->id_orden,
            'nombre' => $array->cliente_nombres,
            'equipo' => $array->equipo_tipo,
            'marca' => $array->equipo_marca,
            'referencia' => $array->equipo_referencia,
            'serial'=>$array->equipo_serial
        ];

        Mail::send('modulos.email.emailOrdenSalida',["datos"=>$arrayDatos] , function($message) use ($arrayDatos,$pdf){
            $numeroOrden = $arrayDatos['orden'];
            $correoCliente = $arrayDatos['correo'];
            $message->from('refillmatesas@gmail.com' , 'Refill Mate');
            $message->to($correoCliente);
            $message->subject('Refill Mate - Orden de entrega Numero '.$numeroOrden);
            $message->attachData($pdf->output(),'Orden Salida Numero ' .($numeroOrden).' .pdf');
        });
    }

    public static function ordenEntradaEmail($pdf , $array )
    {
        $arrayDatos = [
            'correo'=> $array->cliente_correo,
            'orden' => $array->id_orden,
            'nombre' => $array->cliente_nombres,
            'equipo' => $array->equipo_tipo,
            'marca' => $array->equipo_marca,
            'referencia' => $array->equipo_referencia,
            'serial'=>$array->equipo_serial
        ];
        Mail::send('modulos.email.emailOrdenIngreso',["datos"=>$arrayDatos] , function($message) use ($arrayDatos,$pdf){
            $numeroOrden = $arrayDatos['orden'];
            $correoCliente = $arrayDatos['correo'];
            $message->from('refillmatesas@gmail.com' , 'Refill Mate');
            $message->to($correoCliente);
            $message->subject('Refill Mate - Orden de ingreso Numero '.$numeroOrden);
            $message->attachData($pdf->output(),'Orden de ingreso Numero ' .($numeroOrden).'.pdf');
        });
    }

    public static function notificacionCliente( $array )
    {
        $arrayDatos = [
            'correo'=> $array['cliente_correo'],
            'orden' => $array['id_orden'],
            'nombre' =>$array['cliente_nombres'],
            'fechaReparacion' =>$array['fecha_reparacion_orden'],
            'equipo' =>$array['equipo_tipo'],
            'marca' => $array['equipo_marca'],
            'referencia' => $array['equipo_referencia'],
            'serial' => $array['equipo_serial']

        ];

        Mail::send('modulos.email.emailClienteRecoger',["datos"=>$arrayDatos] , function($message) use ($arrayDatos){
            $numeroOrden = $arrayDatos['orden'];
            $correoCliente = $arrayDatos['correo'];
            $message->from('refillmatesas@gmail.com' , 'Refill Mate');
            $message->to($correoCliente);
            $message->subject('Refill Mate - Equipo Pendiente por Recoger');
        });
    }

    public static function notificacionTecnico( $array )
    {
        //Calculamos los dias en numeros la diferente de dias vencidos
        $fechaActualDatetime = new \DateTime;
        $datetimeFechaEstimada = new \DateTime($array['fecha_estimada_orden']);
        $diasVencido = $datetimeFechaEstimada->diff($fechaActualDatetime)->days;
        $arrayDatos = [
            'correoTecnico'=> $array['email'],
            'nombreTecnico'=> $array['name'],
            'orden' => $array['id_orden'],
            'nombreCliente' =>$array['cliente_nombres'],
            'equipo' => $array['equipo_tipo'],
            'marca' => $array['equipo_marca'],
            'referencia' => $array['equipo_referencia'],
            'celularCliente' => $array['cliente_celular'],
            'diasVencido' => $diasVencido
        ];
        Mail::send('modulos.email.emailTecnicoVencida',["datos"=>$arrayDatos] , function($message) use ($arrayDatos){
            $numeroOrden = $arrayDatos['orden'];
            $correoTecnico = $arrayDatos['correoTecnico'];
            $message->from('refillmatesas@gmail.com' , 'Refill Mate');
            $message->to($correoTecnico);
            $message->subject('Refill Mate - ¡Alerta Orden Vencida! '.$arrayDatos['orden']);
        });
    }
}
