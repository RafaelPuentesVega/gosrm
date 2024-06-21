<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class RepuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardarRepuesto(Request $request)
    {
        $fechaActual = date('Y-m-d h:i:s');
        $estadoRepuesto = 1; //Sin autorizar
        $user=  auth()->user()->name;
        $idOrden = $request->idOrden;

        $repuesto = new Repuesto;
        $repuesto->id_orden_servicio_repuesto = $idOrden;
        $repuesto->nombre_repuesto = $request->repuesto ;
        $repuesto->cantidad_repuesto = $request->cantidad;
        $repuesto->user_creation_repuesto = $user;
        $repuesto->created_at_repuesto = $fechaActual;
        $repuesto->estado_repuesto = $estadoRepuesto;
        $repuesto->valor_total_repuesto = 0;///GUARDAMOS EL VALOR EN 0 PARA PODER REALIZAR LA SUMA EN LA VISTA
        $repuesto->save();

        $response = Array('mensaje' => 'save'   );
        $response['dataOrden'] =$repuesto;//Devolvemos a la vista el array del recien registrado
         return json_encode($response);
       // dd($response);

    }
    public function autorizarRepuesto(Request $request)
    {
        $estadoRepuesto = 2; //AUTORIZADO
        $idRepuesto = $request->idRepuesto;
        $valorTotal = $request->cantidadRepuesto * $request->precioUnitario;

        DB::table('repuesto')
            ->where('id_repuesto', $idRepuesto)
            ->update(
                [
                'valor_unitario_repuesto' => $request->precioUnitario,
                'cantidad_repuesto' => $request->cantidadRepuesto,
                'estado_repuesto' => $estadoRepuesto,
                'valor_total_repuesto' => $valorTotal
                ]
                );

        $response = Array('mensaje' => 'update');
         return json_encode($response);

    }
    public function delete(Request $request)
    {
        try {
            $repuesto =Repuesto::where('id_repuesto',$request->id);
            $question = $repuesto->first();
            if(Auth()->user()->rol != 'ADMINISTRATIVO'){
                if($question->estado_repuesto == 2){
                    throw new Exception('El repuesto ya esta autorizado. Informar a el area comercial, para su eliminacion.');
                }
            }
            $repuesto->delete();
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $response['status'] = 'error';
            return json_encode($response);
        }
        $response = Array('status' => 'ok');
        return json_encode($response);

    }
}
