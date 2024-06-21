<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdenServicio;
use App\Models\NotificacionesEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\sendEmail;
use Illuminate\Support\Facades\Log;

class SendEmailTecnico extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emailTecnico';

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
        $fechaActual = date("Y-m-d H:i:s");

        //Consultamos todas la ordenes vencidas
       $ordenServicio = OrdenServicio::
       join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
       ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
       ->join('users', 'id_tecnico_orden', '=', 'users.id')
       //->where('id_orden' , '100')
    //    ->whereNull('fecha_entrega_orden')
        ->where('estadoOrden' , '1')
        ->where('fecha_estimada_orden' ,'<', $fechaActual)
       ->select('cliente.*','equipo.*','users.name','users.email','orden_servicio.*')
       ->get()->toArray();

       //Consultamos la frecuencia de los dias, para enviar la notificaciones.
       $notificacionTecnico = NotificacionesEmail::
        where('descripcion' , 'NOTIFICACION TECNICO ORDEN VENCIDA')
        ->select('dias')->get()->toArray();
        $sumarDias = $notificacionTecnico[0]['dias'];

        $control = sizeof($ordenServicio) -1;
       for ($i = 0; $i <= $control; $i++) {
        //Calculamos los dias en numeros la diferente de dias vencidos
        $fechaActualDatetime = new \DateTime;
        $datetimeFechaEstimada = new \DateTime($ordenServicio[$i]['fecha_estimada_orden']);
        $diasVencido = $datetimeFechaEstimada->diff($fechaActualDatetime)->days;

        $fechaNotificacion = $ordenServicio[$i]['notificacion_cliente'] ;
        $dia = date("w", strtotime($fechaNotificacion));
        // Solo analizas si es día inhábil
        for($ix = 0; $ix < $sumarDias ; $ix++) {
            // Incrementar día
            $dia = $dia + 1;
                // Reiniciar día si es necesario
                if($dia == 7) {
                       $dia = 0;
                    }
                if ($dia == 6) {
                $sumarDias ++;
                }
                if($dia == 0 ){
                    $sumarDias ++;
                }
        }

        $fechaNotificacion = $ordenServicio[$i]['notificacion_tecnico'] ;

        $fechaSumDaysNotificacion =  date("Y-m-d H:i:s",strtotime($fechaNotificacion."+".$sumarDias." days"));

            if($fechaNotificacion == null){
                //dd($ordenServicio[$i]);

                //Actualizamos la observacion de la orden
                DB::table('observacion')->insert([
                    'id_ordenServicio' => $ordenServicio[$i]['id_orden'],
                    'tipo_observacion' => 3,
                    'descripcion_observacion' => 'SE NOTIFICA AL TECNICO MEDIANTE CORREO ELECTRONICO, INFORMANDO QUE LA ORDEN DE SERVICIO SE ENCUENTRA VENCIDA '.$diasVencido." DIAS",
                    'user_observacion' => 'NOTIFICACIONES AUTOMATICAS',
                    'created_at_observacion' => $fechaActual
                ]);
                //Actualizamos la orden, la fecha que se le notifico al tecnico
                DB::table('orden_servicio')
                ->where('id_orden', $ordenServicio[$i]['id_orden'])
                ->update( [
                    'notificacion_tecnico' => $fechaActual
                    ] );
                    $array = $ordenServicio[$i];
                //Llamamos la funcion de enviar la orden de servicio
                $SendEmail =  sendEmail::notificacionTecnico( $array);

            }elseif($fechaActual > $fechaSumDaysNotificacion){
                //Actualizamos la observacion de la orden
                DB::table('observacion')->insert([
                    'id_ordenServicio' => $ordenServicio[$i]['id_orden'],
                    'tipo_observacion' => 3,
                    'descripcion_observacion' => 'SE NOTIFICA AL TECNICO MEDIANTE CORREO ELECTRONICO, INFORMANDO EL ESTADO "VENCIDA" DE LA  ORDEN DE SERVICIO. CUENTA CON '.$diasVencido." DIAS VENCIDA.",
                    'user_observacion' => 'NOTIFICACIONES AUTOMATICAS',
                    'created_at_observacion' => $fechaActual
                ]);
                //Actualizamos la orden, la fecha que se le notifico al tecnico
                DB::table('orden_servicio')
                ->where('id_orden', $ordenServicio[$i]['id_orden'])
                ->update( [
                    'notificacion_tecnico' => $fechaActual
                    ] );
                    $array = $ordenServicio[$i];
                    //Llamamos la funcion de enviar la orden de servicio
                $SendEmail =  sendEmail::notificacionTecnico( $array);
            }
        }
        Log::info('Finalizo Cron de notificacion tecnico Correctamente');

    }
}
