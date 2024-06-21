<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacion;
use Illuminate\Support\Facades\DB;

class ObservacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardarObservacion(Request $request)
    {
        $fechaActual = new \DateTime();
        $tipoObservacion = 1; //Observacion - 1- DIAGNOSTICO - Guardado en la BD
        $user=  auth()->user()->name;
        $idOrden = $request->idOrden;

        $observacion = new Observacion;
        $observacion->id_ordenServicio = $idOrden;
        $observacion->tipo_observacion = $tipoObservacion;
        $observacion->descripcion_observacion = $request->diagnostico;
        $observacion->user_observacion = $user;
        $observacion->created_at_observacion = $fechaActual;
        $observacion->save();

        DB::table('orden_servicio')
            ->where('id_orden', $idOrden)
            ->update(
        ['fecha_diagnostico_orden' => $fechaActual]
                );
        $fechaDiagnostico = date('Y-m-d');
        $response = Array('mensaje' => 'save'   );
        $response['dataOrden'] =$fechaDiagnostico;//Devolvemos a la vista el array del recien registrado
         return json_encode($response);
       // dd($response);

    }
    public function guardarAnotacion(Request $request)
    {
        $fechaActual = date('Y-m-d h:i:s');
        $tipoObservacion = 3; //Observacion - 3 - COMENTARIO - Guardado en la BD
        $user=  auth()->user()->name;
        $idOrden = $request->idOrden;

        $observacion = new Observacion;
        $observacion->id_ordenServicio = $idOrden;
        $observacion->tipo_observacion = $tipoObservacion;
        $observacion->descripcion_observacion = $request->anotacion;
        $observacion->user_observacion = $user;
        $observacion->created_at_observacion = $fechaActual;
        $observacion->save();

        $response = Array('mensaje' => 'save'   );
        return json_encode($response);
       // dd($response);

    }
}
