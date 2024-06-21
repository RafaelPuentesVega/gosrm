<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plantillanotificaciones;

class CorreoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $findAll = plantillanotificaciones::all();
        return view('modulos.correo-admin.correo-admin', compact(['findAll']));
    }
    public function buscarPlantilla(Request $request)
    {
        try {
            $findAll = plantillanotificaciones::where('id_plantillanotificaciones' , $request['id'])->first();
            $vistaPath = $findAll->path;
           // dd( $vistaPath);
            $arrayDatos = [
                'nombreTecnico'=> "[Nombre Tecnico]",
                'orden' => "[No orden]",
                'nombreCliente' =>"[Nombre Cliente]",
                'equipo' => "[Tipo Equipo]",
                'marca' => "[Marca Equipo]",
                'referencia' => "[Ref Equipo]",
                'celularCliente' => "[Celular Cliente]",
                'diasVencido' => "[Dias Vencido]",
                'serial' => "[Serial Equipo]",
                'fechaReparacion' => date('Y-m-d'),
                'nombre' =>"[Nombre Cliente]",
            ];
        } catch (\Throwable $th) {

        }

        return response()->json(view($vistaPath)->with('datos' ,$arrayDatos)->render());
    }
    public function consultarCaractPlantilla(Request $request){
        try {
        $retorno = ["state" => 1 , "message" => "ok" ,"data" => null ];
        $findAll = plantillanotificaciones::select('plantillanotificaciones.*' , 'parametrosnotificaciones.dias')->Leftjoin('parametrosnotificaciones' , 'plantillanotificaciones.id_parametro', '=' , 'parametrosnotificaciones.id')->where('plantillanotificaciones.id_plantillanotificaciones' , $request['id'])->first();
        $retorno['data']['descripcion'] = $findAll->descripcion;
        if($findAll->dias == null || $findAll->descripcion == ""){
            $retorno['data']['dias'] = "ENVIO AUTOMATICO";
        }else{
            $retorno['data']['dias'] = $findAll->dias." DIAS HABILES";
        }
        $retorno['data']['dirigido'] = $findAll->tipo;
        $retorno['data']['notificacion'] = $findAll->nombre;

        }catch (\Throwable $th) {
            $retorno['message'] = "OCURRIO UN ERROR EN EL SERVIDOR";
            $retorno['data'] = null;
            $retorno['state'] = 0;
        }
        return json_encode($retorno);

    }
}
