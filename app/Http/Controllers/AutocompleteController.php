<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AutocompleteController extends Controller
{
    public function BuscarReferencia(Request $request){
        $response = '';
        if(!empty($request->referencia)){
            $referenciaSelect = DB::table('equipo')
            ->where('equipo_referencia', 'like','%'.$request->referencia. '%')
            ->select('equipo_referencia')
            ->distinct('equipo_referencia')
            ->get();
            foreach ($referenciaSelect as $key => $value) {
                $response .= '<div><a style="text-decoration: none; color:#626567" data="'.$value->equipo_referencia.'" id="'.$value->equipo_referencia.'" class="suggest-element" >'.$value->equipo_referencia.'</a></div>';
                }
        }
        return  $response;
    }
    public function BuscarMarca(Request $request){
        $response = '';
        if(!empty($request->marca)){
            $MarcaSelect = DB::table('equipo')
            ->where('equipo_marca', 'like','%'.$request->marca. '%')
            ->select('equipo_marca')
            ->distinct('equipo_marca')
            ->get();
            foreach ($MarcaSelect as $key => $value) {
                $response .= '<div><a style="text-decoration: none; color:#626567" data="'.$value->equipo_marca.'" id="'.$value->equipo_marca.'" class="suggest-element" >'.$value->equipo_marca.'</a></div>';
                }
        }
        return  $response;
    }
    public function BuscarCaracteristicaEquipo(Request $request){
        $response = '';
        if(!empty($request->caracteristicas)){
            $CaracteristicaSelect = DB::table('orden_servicio')
            ->where('caracteristicas_equipo_orden', 'like','%'.$request->caracteristicas. '%')
            ->select('caracteristicas_equipo_orden')
            ->distinct('caracteristicas_equipo_orden')
            ->get();
            foreach ($CaracteristicaSelect as $key => $value) {
                $response .= '<div><a style="text-decoration: none; color:#626567" data="'.$value->caracteristicas_equipo_orden.'" id="'.$value->caracteristicas_equipo_orden.'" class="suggest-element" >'.$value->caracteristicas_equipo_orden.'</a></div>';
                }
        }
        return  $response;
    }
    public function BuscarCedulaCliente(Request $request){
        $response = '';
        if(!empty($request->documento)){
            $CaracteristicaSelect = DB::table('cliente')
            ->where('cliente_documento', 'like','%'.$request->documento. '%')
            ->select('cliente_documento','cliente_nombres')
            ->distinct('cliente_documento')
            ->get();
            foreach ($CaracteristicaSelect as $key => $value) {
                $response .= '<div><a style="text-decoration: none; color:#626567" data="'.$value->cliente_documento.'" id="'.$value->cliente_documento.'" class="suggest-element" >'.$value->cliente_documento.' - '.$value->cliente_nombres.' </a></div>';
                }
        }
        return  $response;
    }
    public function BuscarRepuestoOrden(Request $request){
        $response = '';
        if(!empty($request->repuesto)){
            $RepuestoSelect = DB::table('repuesto')
            ->where('nombre_repuesto', 'like','%'.$request->repuesto. '%')
            ->select('nombre_repuesto')
            ->distinct('nombre_repuesto')
            ->get();
            foreach ($RepuestoSelect as $key => $value) {
                $response .= '<div><a style="text-decoration: none; color:#626567" data="'.$value->nombre_repuesto.'" id="'.$value->nombre_repuesto.'" class="suggest-element" >'.$value->nombre_repuesto.'</a></div>';
                }
        }
        return  $response;
    }

}
