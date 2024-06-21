<?php

namespace App\Http\Controllers;

use App\Models\RequerimientoInterno;
use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RequerimientoInternoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->rol != 'ADMINISTRATIVO'){
            return redirect('inicio');
        }

        $repuestoSinAutorizar = 1; //ESTADO DE REPUESTO - SIN AUTORIZAR -
        $repuestoAutorizar = Repuesto::where('estado_repuesto',$repuestoSinAutorizar)->get();
        // dd($repuestoAutorizar->toarray());

        return view('modulos.requerimiento.requerimientointerno')->with('repuestoAutorizar',$repuestoAutorizar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarRepuesto(Request $request)
    {


        $repuestoArray = DB::table('repuesto as repuesto')
        ->join('orden_servicio as orden', 'repuesto.id_orden_servicio_repuesto', '=', 'orden.id_orden')
        ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
        ->select('cliente.*', 'equipo.*', 'orden.*' , 'repuesto.*')
        ->whereRaw("repuesto.id_repuesto = $request->id")
        ->get()->toArray();
        $response = Array('mensaje' =>'ok');
        $response['dataRepuesto'] =$repuestoArray;//Devolvemos a la vista el array del repuesto recien registrado
        return json_encode($response);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequerimientoInterno  $requerimientoInterno
     * @return \Illuminate\Http\Response
     */
    public function show(RequerimientoInterno $requerimientoInterno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequerimientoInterno  $requerimientoInterno
     * @return \Illuminate\Http\Response
     */
    public function edit(RequerimientoInterno $requerimientoInterno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequerimientoInterno  $requerimientoInterno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequerimientoInterno $requerimientoInterno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequerimientoInterno  $requerimientoInterno
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequerimientoInterno $requerimientoInterno)
    {
        //
    }
}
