<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use App\Models\ParametrosDetalle;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        if(auth()->user()->rol != 'ADMINISTRATIVO'){
            return redirect('inicio');
        }
        return view('modulos.parametro.parametros-inicio') ;

    }
    public function servicioIndex()
    {
        $servicios = Parametro::all();
        return view('modulos.parametro.parametro') ->with('servicios' ,$servicios) ;
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
        try {
            $datos = request();
            $valida = Parametro::where('nombre_servicio' ,$datos['nombre_servicio'])->first();
            if($valida == null){
                Parametro::create([

                    'nombre_servicio'=>$datos['nombre_servicio'],
                ]);
            }else{
                session()->flash('alert', 'danger');
                session()->flash('message', 'Ya existe un servicio con el Nombre '.$datos['nombre_servicio']);
                return redirect()->back();
            }

        } catch (\Exception $e) {
            dd($e);
            session()->flash('alert', 'danger');
            session()->flash('message', 'Ocurrio un error guardando');
            return redirect()->back();
        }
        session()->flash('alert', 'success');
        session()->flash('message', 'Guardado Correctamente. '.$datos['nombre_servicio']);
        return redirect()->back();
    }


    public function buscarVencimientOrden(Request $request)
    {
        $response = array('message'=>'ok' , 'data' => null);
        try{
            $find = ParametrosDetalle::all();

        }catch(\Exception $e){
            $response['message'] = 'Error';
            return json_encode($response);
        }
        $response['data'] = $find;
        return json_encode($response);

        $response = array('message'=>'ok' );
    }
    public function updateDiasVencimiento(Request $request)
    {
        $response = array('message'=>'ok' );
        try{
            $usuario = ParametrosDetalle::findOrFail($request->id);
            $usuario->valor = $request->dias;
            $usuario->save();

        }catch(\Exception  $e){
            $response['message'] = 'Error';
            return json_encode($response);
        }
        return json_encode($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametro $parametro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametro $parametro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}
