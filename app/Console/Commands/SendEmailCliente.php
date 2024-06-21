<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\OrdenServicio;
use App\Http\Controllers\sendEmail;
use App\Models\NotificacionesEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;



class SendEmailCliente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emailClient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        Log::info('Ejecuto Cron de notificacion tecnico Correctamten');
        $ordenServicio = OrdenServicio::
        join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
        ->whereNotNull('fecha_reparacion_orden')
        ->whereNull('fecha_entrega_orden')
        ->where('estadoOrden' , '2')
        //->where('id_orden' , '6')
        ->get()->toArray();
        $fechaDefault = '1990-01-01 00:00:00';
        //obtener frecuencia de envio - parametros
        $frecuenciaEnvio = NotificacionesEmail::where('descripcion' , 'NOTIFICACION CLIENTE ORDEN TERMINADA')
        ->select('dias')->first();
        $fechaActual = date("Y-m-d H:i:s");


        foreach ($ordenServicio as $key => $value) {

            $fechaNotificacion = $value['notificacion_cliente'] != null ? $value['notificacion_cliente'] : $fechaDefault;

            $fechaFinalSuma = $this->sumarDiasExcluyendoFinDeSemana($fechaNotificacion , $frecuenciaEnvio['dias'] );
            Log::info($fechaFinalSuma);

            if($fechaActual >= $fechaFinalSuma){

                DB::table('observacion')->insert([
                    'id_ordenServicio' => $value['id_orden'],
                    'tipo_observacion' => 3,
                    'descripcion_observacion' => 'SE NOTIFICA AL CLIENTE POR MEDIO DE CORREO ELECTRONICO, INFORMANDO QUE EL EQUIPO SE ENCUENTRA LISTO PARA SU ENTREGA.',
                    'user_observacion' => 'NOTIFICACIONES AUTOMATICAS',
                    'created_at_observacion' => $fechaActual
                ]);
                 DB::table('orden_servicio')
                 ->where('id_orden', $value['id_orden'])
                 ->update( [
                     'notificacion_cliente' => $fechaActual
                     ] );
                $array = $value;
                $SendEmail =  sendEmail::notificacionCliente( $array);
            }
        }
         Log::info('Finalizo Cron de notificacion cliente - entrega Correctamente');

    }

    
    public function sumarDiasExcluyendoFinDeSemana($fechaInicial, $diasASumar) {
        $fecha = Carbon::parse($fechaInicial);
    
        while ($diasASumar > 0) {
            $fecha->addDay();
        
            // Excluir sábados y domingos
            if (!$fecha->isWeekend()) {
                $diasASumar--;
            }
            // Si llegamos al final de la semana, salta al siguiente lunes
            elseif ($fecha->isWeekend() && $diasASumar > 0) {
                $fecha->nextWeekday(); // Saltar al siguiente día hábil
            }
        }
        
    
        return $fecha;
    }
}
