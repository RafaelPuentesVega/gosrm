<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;
use App\Models\TipoEquipo;
use App\Models\Departamentos;
use App\Models\Municipios;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;


class EquiposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {

            $equipos = Equipos::all();
            return view('modulos.equipo.equipo')
            ->with('equipos' ,$equipos) ;



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
        $datos = request();

       Equipos::create([

        'equipo_tipo'=>$datos['equipo_tipo'],
        'equipo_marca'=>$datos['equipo_marca'],
        'equipo_referencia'=>$datos['equipo_referencia'],
        'equipo_serial'=>$datos['equipo_serial'],
        'equipo_byg'=>$datos['equipo_byg'],

       ]);
        return redirect('equipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function equipoEdit($id)
    {
        $idEquipo =  decrypt($id);

        $dataEquipo = DB::table('equipo')
        ->where('equipo_id', '=', $idEquipo)->get()->first();

        $arrayOrden = DB::table('orden_servicio')
        ->leftJoin('users', 'orden_servicio.id_tecnico_orden', '=', 'users.id')
        ->leftJoin('equipo', 'orden_servicio.id_equipo_orden', '=', 'equipo.equipo_id')
        ->select('orden_servicio.*', 'users.name','equipo.*')
        ->where('equipo.equipo_id', '=', $idEquipo)
        ->orderBy('orden_servicio.id_orden', 'desc')
        ->get()->toArray();

        $arrayCliente = DB::table('cliente')
        ->where('cliente_id', '=', $dataEquipo->equipo_cliente_id)->get()->first();

        return view('modulos.equipo.edit-equipo')
        ->with('dataEquipo' ,$dataEquipo)
        ->with('arrayCliente' ,$arrayCliente)
        ->with('arrayOrden' ,$arrayOrden);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request();

        DB::table('equipo')
        ->where('equipo_id', $id)
        ->update(
            [
            'equipo_tipo'=>$datos['equipo_tipo'],
            'equipo_marca'=>$datos['equipo_marca'],
            'equipo_referencia'=>$datos['equipo_referencia'],
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipos $equipos)
    {
        //
    }

    public function guardarEquipoOrden (Request $request)
    {
        $equipoTipo = '';
        if($request->checkTipoEquipo == 'SI'){
            $equipoTipo = $request->equipo_tipo;
            $userCreation = auth()->user()->name;
            $fechaActual  = date('Y-m-d h:i:s');

            $tipoEquipo = new TipoEquipo;
            $tipoEquipo->nombre_tipo_equipo = $equipoTipo;
            $tipoEquipo->user_created_tipo_equipo = $userCreation;
            $tipoEquipo->created_at_tipo_equipo = $fechaActual;
            $tipoEquipo->save();
        }else{
            $equipoTipo = $request->equipo_tipo_select;
        }

        $equipo = new Equipos;
        $equipo->equipo_tipo = $equipoTipo;
        $equipo->equipo_marca = $request->equipo_marca;
        $equipo->equipo_referencia = $request->equipo_referencia;
        $equipo->equipo_serial = $request->equipo_serial;
        $equipo->equipo_cliente_id = $request->cliente_id;
        $equipo->save();
        $response = Array("mensaje"=>"ok");
        $response['dataEquipo'] =$equipo->toArray();//Devolvemos a la vista el array del cliente recien registrado
        return json_encode($response);

    }

    public function consultarEquipo(Request $request){

        $data = $request->all();
        $response = Array("mensaje"=>"ok");
        $response['data'] = DB::table('equipo')
           ->where('equipo_cliente_id', '=', $data['id'])
           ->get()->toArray();

        return json_encode($response);
        //
    }
    public function SeleccionarEquipo(Request $request){

        $data = $request->all();
        $response = Array("mensaje"=>"ok");
        $response['data'] = DB::table('equipo')
           ->where('equipo_id', '=', $data['id'])
           ->get()->toArray();

        return json_encode($response);
        //
    }
}
