<?php

namespace App\Http\Controllers;

use App\Models\inicio;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $idUsuario = auth()->id();
       // $ordenServicio = OrdenServicio::whereNull('fecha_entrega_orden')->get()->toArray();


    $ordenServicio = OrdenServicio:://DB::table('orden_servicio as orden')
    join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
    ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
    ->whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','1')->get()->toArray();

    $ordenServicioListas = OrdenServicio::
    whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','2')->get()->toArray();

        $control = sizeof($ordenServicio) - 1;
      // $fechaActual = date('Y-m-d G:i:s');
        $fechaActual = strtotime(date("d-m-Y H:i:00",time()));
        $vencidas[] = null;
        $vigentes[] = null ;
        for ($i = 0; $i <= $control; $i++) {

        $fechaEstimada = $ordenServicio[$i]['fecha_estimada_orden'];

        if($fechaActual >  $fechaEstimada){
            $vencidas[] = $ordenServicio[$i];
        }
        if($fechaActual <=  $fechaEstimada){
            $vigentes[] = $ordenServicio[$i];
        }


        }
        $tamañoListas =    sizeof($ordenServicioListas);
        $tamañoVencidas = sizeof($vencidas)-1;
        $tamañovigentes = sizeof($vigentes) -1;
      //CONSULTA PARA TRAER LOS TECNICOS A VISTA DE ADMINISTRADORES
       $user = User::where('rol','Tecnico')
       ->orWhere('rol', 'Coordinador Técnico')->get();

         return view('modulos.inicio')->with('vigentes' ,$vigentes)->with('vencidas' ,$vencidas)->with('user' ,$user)
         ->with('tamañoVencidas' ,$tamañoVencidas)->with('tamañovigentes' ,$tamañovigentes)
         ->with('tamañoListas' ,$tamañoListas) ;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(inicio $inicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inicio $inicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(inicio $inicio)
    {
        //
    }
}
