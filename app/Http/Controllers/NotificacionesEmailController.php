<?php

namespace App\Http\Controllers;

use App\Models\NotificacionesEmail;
use Illuminate\Http\Request;

class NotificacionesEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\NotificacionesEmail  $notificacionesEmail
     * @return \Illuminate\Http\Response
     */
    public function consultarNotificaciones(NotificacionesEmail $notificacionesEmail)
    {
        $response = array('message'=>'ok' , 'data' => null);
        try{
            $find = NotificacionesEmail::all();

        }catch(\Exception $e){
            $response['message'] = 'Error';
            return json_encode($response);
        }
        $response['data'] = $find;
        return json_encode($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotificacionesEmail  $notificacionesEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificacionesEmail $notificacionesEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotificacionesEmail  $notificacionesEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificacionesEmail $notificacionesEmail)
    {
        $response = array('message'=>'ok' );
        try{
            $usuario = NotificacionesEmail::findOrFail($request->id);
            $usuario->dias = $request->dias;
            $usuario->save();

        }catch(\Exception $e){
            $response['message'] = 'Error';
            return json_encode($response);
        }
        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotificacionesEmail  $notificacionesEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificacionesEmail $notificacionesEmail)
    {
        //
    }
}
