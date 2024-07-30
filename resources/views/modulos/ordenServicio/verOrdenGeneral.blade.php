@extends('plantilla')
@section('content')
@section('css')
    <style>
    hr{
     border: 0.01px solid #bababa3f !important;
    }
    #mdNumeroFactura {
        border-radius: 10rem !important;
        height: 4rem !important;
        padding: 1.5rem 1.5rem !important;
    }
    </style>
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="{!! url('fontawesome/css/all.css" rel="stylesheet') !!}"/>
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">


@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif" >

            <body style="background-color: #d8d8d892">

                <div class="container-fluid">


                    <div class="row ">
                        <div class="col-md-15">

                            <div class="card "  >
                                <div class="header" style="box-shadow: 0 0 11px 4px #0000001f;background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>ORDEN DE SERVICIO N° {{ $arrayData->id_orden }} - ORDEN GENERAL</strong></h3>
                                </div>
                            </div>


                            <div class="card " style="box-shadow: 0 0 11px 4px #0000001f;border-radius: 10px 10px 10px 10px">



                                <div class="header">
                                    <input disabled id="idOrden" value="{{ $arrayData->id_orden }}" hidden>
                                    <input disabled id="totalValorRepuestos" value="{{ $totalValorRepuestos }}" hidden>
                                </div>
                                <div class="content">



                                    <div class="row" style="">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <label class="responsive-font" for=""><i style="color: rgba(0, 0, 0, 0.841); font-size: 18px" class="fas fa-calendar-alt"></i><strong>&nbsp;FECHA INGRESO</strong></label>

                                                    <h4 style="width: 83%" class="caja"
                                                    id="fecha_creacion_orden"> {{ date("Y-m-d h:i:s a",strtotime($arrayData->fecha_creacion_orden))  }}</h4>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="responsive-font" for=""><i style="color: rgba(0, 0, 0, 0.841); font-size: 18px" class="fas fa-calendar-day"></i><strong>&nbsp;FECHA ESTIMADA</strong></label>
                                                <h4 style="width: 83%" class="caja"
                                                id="fecha_estimada"> {{ date("Y-m-d h:i:s a",strtotime($arrayData->fecha_estimada_orden))}}</h4>

                                             </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="responsive-font" for=""><i style="color: rgba(0, 0, 0, 0.841); font-size: 16px" class="fas fa-calendar"></i><strong style="font-size: 10px">FECHA DIAGNOSTICO</strong></label>

                                                    @if(isset($arrayData->fecha_diagnostico_orden))
                                                     <h4 style="width: 83%"  class="caja" id="fecha_diagnostico">{{date("Y-m-d h:i:s a",strtotime($arrayData->fecha_diagnostico_orden)) }}</h4>

                                                    @else
                                                    <h4 style="width: 83%"  class="caja" id="fecha_diagnostico">- <br> -</h4>
                                                    @endif


                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label  class="responsive-font" for=""><i style="color: rgba(0, 0, 0, 0.841); font-size: 16px" class="fas fa-calendar-week"></i><strong style="font-size: 11px">&nbsp;FECHA REPARACION</strong></label>

                                            @if(isset($arrayData->fecha_reparacion_orden))
                                            <h4 style="width: 83%"  class="caja" id="fecha_creacion_orden">{{date("Y-m-d h:i:s a",strtotime($arrayData->fecha_reparacion_orden)) }}</h4>

                                           @else
                                           <h4 style="width: 83%"  class="caja" id="fecha_creacion_orden">- <br> -</h4>
                                           @endif
                                        </div>

                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label class="responsive-font" for=""><i style="color: rgba(0, 0, 0, 0.841); font-size: 16px" class="fas fa-calendar-check"></i><strong style="font-size: 11px">&nbsp;FECHA ENTREGA</strong></label>
                                            @if(isset($arrayData->fecha_entrega_orden))
                                            <h4 style="width: 83%"  class="caja" id="fecha_creacion_orden">{{date("Y-m-d h:i:s a",strtotime($arrayData->fecha_entrega_orden)) }}</h4>

                                           @else
                                           <h4 style="width: 83%"  class="caja" id="fecha_creacion_orden">- <br> -</h4>
                                           @endif
                                        </div>
                                        </div>

                                    </div>
                                    <div class="tabla">

                                        <div class="table-responsive-xl">

                                            <table class=" table table-style" width="100%"
                                                style="border-radius: 8px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(255, 255, 255, 0) 2.5px solid">

                                                <tr style=" font-size: 17px;  ">
                                                    <th colspan="4"
                                                        style="padding: 1px ;border-top-left-radius: 10px; border-top-right-radius: 10px;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                        &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong> </label>  </th>
                                                    </th>
                                                </tr>
                                                <tr style=" font-size: 12px ">
                                                    <th width=""
                                                        style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                        &nbsp;<strong><label>Nit o C.C: &nbsp; </label>
                                                        {{ $arrayData->cliente_documento }}</strong>
                                                    </th>
                                                    <th colspan="2"
                                                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp; <strong>
                                                            <label>Nombre:&nbsp;</label>
                                                    {{ $arrayData->cliente_nombres }}</strong> </th>
                                                    <th width=""
                                                        style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>E-Mail:&nbsp;</label>
                                                        {{ $arrayData->cliente_correo }}</strong>
                                                    </th>

                                                </tr>

                                                <tr>
                                                    <th width="20%"
                                                        style="font-size: 12px ;height: 40px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Ciudad:&nbsp;</label>{{ $arrayData->municipio_nombre }}
                                                        - {{ $arrayData->departamento_nombre }}</strong>

                                                    </th>
                                                    <th width="20%"
                                                        style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Telefono:&nbsp;</label>{{ $arrayData->cliente_telefono }}</strong>

                                                    </th>
                                                    <th width="20%"
                                                        style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Celular:&nbsp;</label>{{ $arrayData->cliente_celular }}</strong>

                                                    </th>
                                                    <th width="40%"
                                                        style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Direccion:&nbsp;</label>{{ $arrayData->cliente_direccion }}</strong>

                                                    </th>

                                                </tr>
                                                @isset($arrayData->usuario_dependencia)
                                                    <tr>
                                                        <th
                                                            style="height: 38px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                            &nbsp; <strong><label>Dependencia:
                                                                    &nbsp;</label>{{ $arrayData->usuario_dependencia }}</strong>

                                                        </th>
                                                        <th colspan="2"
                                                            style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                            &nbsp;<strong><label>Usuario:&nbsp;</label>
                                                            {{ $arrayData->usuario_nombre }}</strong>

                                                        </th>
                                                        <th
                                                            style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                            &nbsp;<strong><label>Celular Usuario:&nbsp;</label>
                                                            {{ $arrayData->usuario_celular }}</strong>

                                                        </th>
                                                    </tr>
                                                @endisset

                                            </table>
                                        </div>


                                </div>
                            </div>

                            <div class="card" style="margin-top: -15px">

                                <div class="header">

                                </div>
                                <div class="content">

                                    <div class="table-responsive-xl">

                                        <table class="table-style" width="100%"
                                            style="border-radius: 8px;box-shadow: 0 0 11px 4px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                                            <tr>
                                                <th colspan="4"
                                                    style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1;font-size: 15px; height: 1px;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>EQUIPO</strong> </label>  </th>

                                                </th>

                                            </tr>

                                            <tr style="height: 38px">
                                                <th width="20%"
                                                    style=" font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<label><strong>Equipo:
                                                            &nbsp;</label>{{ $arrayData->equipo_tipo }}</strong>

                                                </th>
                                                <th width="30%"
                                                    style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Marca:&nbsp;</label>{{ $arrayData->equipo_marca }}
                                                    </strong>

                                                </th>
                                                <th width="30%"
                                                    style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Referencia:&nbsp;</label>{{ $arrayData->equipo_referencia }}
                                                    </strong>

                                                </th>
                                                <th width="20%"
                                                    style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1px solid">
                                                    &nbsp;<strong><label>Serial:&nbsp;</label>{{ $arrayData->equipo_serial }}</strong>

                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <hr style="border: 1px solid">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Garantia:</strong></label>
                                                {{$arrayData->garantia_orden}} <br>
                                                <label><strong>Contrato:</strong></label>
                                                {{$arrayData->contrato_orden}}

                                             </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Servicio:</strong></label> <br>
                                                {{ $arrayData->servicio_orden }}
                                             </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Accesorios:</strong></label> <br>
                                                {{ $arrayData->accesorios_orden }}
                                                @if( $arrayData->serial_adaptador_orden <> null)

                                                <div style=" ">
                                                <label ><strong>Adaptador Serial N°:</strong></label>
                                                {{ $arrayData->serial_adaptador_orden}}
                                                </div>
                                                @endif
                                             </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Caracteristicas Equipo:</strong></label> <br>
                                                {{ $arrayData->caracteristicas_equipo_orden }}
                                             </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <label><strong> Daño Equipo: </strong></label> <br>
                                                {{ $arrayData->descripcion_dano_orden }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <label><strong> REPORTE TECNICO: </strong></label>
                                                @if(auth()->user()->rol == "ADMINISTRATIVO" &&  $arrayData->estadoOrden == 2)
                                                <button style="border: none; outline:none; text-decoration: none; margin: -10px" type="button" title="Editar Reporte" data-toggle="tooltip" data-placement="left"  class="btn btn-warning btn-fill  pull-right " id="btneditarReporte" onclick="reporteTecnicoEdit()" >
                                                    <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-pencil-fill box-info pull-left"></i>
                                                </button>
                                                @endif
                                                <button style="display: none; border: none; outline:none; text-decoration: none; margin: -10px" type="button" title="Guardar Reporte" data-toggle="tooltip" data-placement="left"  class="btn btn-success btn-fill  pull-right " id="btnsaveReporte" onclick="reporteTecnicoSave()" >
                                                    <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-clipboard box-info pull-left"></i>
                                                </button>
                                                <br>
                                                <div class="col-md-13">
                                                    <div class="form-group">
                                                        <textarea rows="4" id="reporteTecnico" class="form-control" maxlength="1500" placeholder="" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >{{ $arrayData->reporte_tecnico_orden }}</textarea>
                                                    </div>
                                                </div>      
                                                <div id="reporteTecnicoDiv">
                                                </div>
                                                <br><br>
                                                <div style="text-align: right; margin-bottom: -20px"><label><strong>TECNICO: </strong></label>{{$arrayData->name}}
                                                    @if($arrayData->estadoOrden == 1 )
                                                    <button id="btncambiarTecnico" title="Cambiar Tecnico" data-toggle="tooltip" class="btn style"><i style="font-size: 16px" class="fas fa-undo"></i></button>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div style="text-align: left; margin-top: -5px; font-size: 10px"><i><label style=" font-size: 11px">Estado:</label>
                                                @if ($arrayData->fecha_estimada_orden <= date('Y-m-d H:i:s') && $arrayData->estadoOrden == 1)
                                                {{-- {{-- ORDEN VENCIDA --}}
                                                <span
                                                    class="badge badge-pill badge-danger">Reparacion</span>
                                                @elseif($arrayData->estadoOrden == 1)
                                                    {{-- {{-- ORDEN RECIEN INGRESO --}}
                                                    <span
                                                        class="badge badge-pill badge-info">Reparacion</span>
                                                @elseif($arrayData->estadoOrden == 2)
                                                    {{-- {{-- ORDEN LISTA PARA ENTREGAR --}}
                                                    <span
                                                        class="badge badge-pill badge-success">Lista Para
                                                        Entregar</span>
                                                @elseif($arrayData->estadoOrden == 3 && $arrayData->factura_numero_orden == null)
                                                    {{-- {{-- ORDEN ENTREGADA SIN FACTURA --}}
                                                    <span
                                                        class="badge badge-pill badge-warning">Facturacion</span>
                                                @elseif($arrayData->estadoOrden == 3)
                                                    <span
                                                        class="badge badge-pill badge-primary">Entregada</span>
                                                    {{-- {{-- ORDEN ENTREGADA --}}
                                                @elseif($arrayData->estadoOrden == 4)
                                                    <span
                                                        class="badge badge-pill " style="    background-color: #7057A2!important">Bodega</span>
                                                    {{-- {{-- ORDEN EN BODEGA --}}
                                                @endif

                                                @if($arrayData->estadoOrden > 1 &&  $arrayData->estadoOrden != 4 && auth()->user()->rol == "ADMINISTRATIVO")
                                                <button id="btncambiarEstado" title="Cambiar Estado Orden" data-toggle="tooltip" class="btn style"><i style="font-size: 16px" class="fas fa-undo"></i></button>
                                                @endif
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div style="text-align: right; margin-top: -5px; font-size: 10px"><i><label style=" font-size: 9px">Recibido Por:</label>@if(isset($arrayData->user_created)) {{$arrayData->user_created}}@else N/A  @endif</i> </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                        <label><strong>DIAGNOSTICO</strong></label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                @if(isset($Arraydiagnostico->descripcion_observacion))
                                                <div class="caja" style="text-align: left"> {{$Arraydiagnostico->descripcion_observacion}}</div>

                                                @else
                                                <div style="color: red;">*Pendiente diagnostico</div> <br>

                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                    @if($arrayData->estadoOrden != 3)
                                    <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea rows="1" style="text-transform: uppercase" id="anotacion"
                                                    class="form-control" maxlength="240" placeholder="Novedades"
                                                    autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    <button title="Agregar Novedad" data-toggle="tooltip" data-placement="right"
                                                        style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none"
                                                        type="button" class="btn btn-info btn-fill " id="btnAnotacion"
                                                        onclick="guardarAnotacion()">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-plus-lg box-info pull-left"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if (sizeOf($anotacion) != 0)
                                    <br>
                                        <div class="table-responsive-xl">

                                            <table class="table table-striped table-style " width="100%"
                                                style=" box-shadow: 0 0 11px 4px #0000001f ;text-align: center; border-radius: 10px; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                                <thead class="thead-light">
                                                    <tr
                                                        style="background-color: rgba(226, 226, 226, 0.295);; height: 38px">
                                                        <th width="16%"
                                                            style=" font-size: 12px ;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            <strong>FECHA </strong>

                                                        </th>
                                                        <th width="64%"
                                                            style="font-size: 12px ; font-weight:normal;text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            <strong> NOVEDADES</strong>

                                                        </th>
                                                        <th width="20%" style="font-size: 12px ;font-weight:normal;  text-align: center
                                                        ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            <strong>USUARIO</strong>

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($anotacion as $comentario)
                                                        <tr>
                                                            <th width="20%"
                                                                style="font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                               {{ $comentario->created_at_observacion }}

                                                            </th>
                                                            <th width="50%"
                                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                {{ $comentario->descripcion_observacion }}

                                                            </th>
                                                            <th width="30%"
                                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                               {{ $comentario->user_observacion }}
                                                            </th>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="table-responsive-xl">
                                        <table style="box-shadow: 0 0 11px 4px #0000001f;font-family: Verdana, sans-serif; border-radius: 10px" class="table" width="100%" style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 50px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 1.5px solid">
                                            <tr style="  font-size: 13px ; background-color: #AED6F1">

                                                <th class="text-center" width="10%" colspan="2"
                                                    style="border-top-left-radius: 10px;  height: 1px; font-weight:normal; text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid ">
                                                    &nbsp;<strong>Cantidad </strong>
                                                </th>
                                                <th width="60%"
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid ">
                                                    &nbsp; <strong>
                                                        Descripcion</strong> </th>
                                                <th width="15%"
                                                    style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid">
                                                    &nbsp;<strong>$ Unitario</strong>
                                                </th>
                                                <th width="15%"
                                                    style="border-top-right-radius: 10px;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid">
                                                    &nbsp;<strong>$ Total</strong>

                                                    @if($arrayData->estadoOrden == 2 && auth()->user()->rol == "ADMINISTRATIVO")
                                                    <button style="border: none; outline:none; text-decoration: none; margin: -1px" type="button" title="Editar valor Servicio" data-toggle="tooltip" data-placement="left"  class="btn btn-warning btn-fill  pull-right " id="btneditvalorServicio" onclick="valorServicioEdit()" >
                                                        <i style="color: #ffffff; font-size: 18px; margin: -7px" class="bi bi-pencil-fill box-info pull-left"></i>
                                                    </button>
                                                    <button style="display: none; border: none; outline:none; text-decoration: none; margin: -1px" type="button" title="Guardar valor Servicio" data-toggle="tooltip" data-placement="left"  class="btn btn-success btn-fill  pull-right " id="btnsavevalorServicio" onclick="changePrice()" >
                                                        <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-clipboard box-info pull-left"></i>
                                                    </button>
                                                    @endif
                                                </th>

                                            </tr>
                                            @if(sizeOf($repuesto) != 0)
                                                @foreach ($repuesto as $repuestos)
                                                    <tr style=" font-size: 13px " >
                                                        @if($arrayData->estadoOrden  == 1 && auth()->user()->rol == "ADMINISTRATIVO")
                                                            <th width="1%"  style=" height: 1px; font-weight:normal; text-align: center ; border-left: rgba(0, 0, 0, 0) 1px solid">
                                                                <button style="margin: 0%;padding: 0px 0px;" data-value="{{$repuestos->id_repuesto}}"  title="Eliminar" data-toggle="tooltip" data-placement="bottom"  type="button" class=" btnEliminarRepuesto style btn btn-close" id="btnEliminarRepuesto">
                                                                    <i style="color: red; font-size: 15px" class="fas fa-trash"></i>
                                                                </button>
                                                            </th>
                                                            <th width="" colspan=""
                                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border-right: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                                &nbsp;{{ $repuestos->cantidad_repuesto }}
                                                            </th>
                                                        @else
                                                            <th width="" colspan="2"
                                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                                &nbsp;{{ $repuestos->cantidad_repuesto }}
                                                            </th>
                                                        @endif
                                                        <th width="" style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;{{ $repuestos->nombre_repuesto }}
                                                        </th>
                                                        @if($repuestos->estado_repuesto == 1)
                                                        <th width="" colspan="2"
                                                            style="color: red; font-size: 13px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid" id="valorTotalRepuesto">
                                                            &nbsp; *Pendiente de Autorizacion
                                                        </th>
                                                        @else
                                                        <th width=""
                                                            style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid" id="valorTotalRepuesto">
                                                            &nbsp;<strong>${{number_format($repuestos->valor_unitario_repuesto, 0, ',', '.')   }}</strong>
                                                        </th>
                                                        <th width=""
                                                            style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>${{number_format($repuestos->valor_total_repuesto, 0, ',', '.') }}</strong>
                                                        </th>
                                                        @endif

                                                    </tr>
                                                @endforeach
                                            @endif

                                            <tr style=" font-size: 13px " id="repuestoIngresado" hidden>
                                                <th id="cantidadRpuestoTr" width=""
                                                    style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                </th>
                                                <th width=""
                                                    style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                </th>
                                                <th width=""
                                                    style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                </th>
                                                <th width=""
                                                    style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                </th>
                                            </tr>
                                            @if ($arrayData->estadoOrden == 1)
                                                <tr id="TragregarRepuesto">
                                                    <th style="border: rgba(0, 0, 0, 0.089) 1.5px solid;cursor: pointer;"
                                                        class="text-center" colspan="3">
                                                        <div id="agregarRepuesto" style="color: #a5a5a5">+ Agregar
                                                            repuesto
                                                        </div>
                                                    </th>
                                                    <th width="" colspan="2"
                                                        style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong></strong>
                                                    </th>
    
                                                </tr>
    
                                                <tr hidden id="divAgregarRepuesto" style=" font-size: 13px ">
                                                    <th
                                                        style=" height: 1px; font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.123) 1px solid">
                                                        <button style="" title="Agregar Repuesto"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            onclick="guardarRepuesto()" title="Agregar" type="button"
                                                            class="btn btn-warning btn-fill " id="btnAgregarRepuesto">
                                                            <i style="color: #ffffff; font-size: 20px; margin: -2px; width: 17px; height: 20px"
                                                                class="fas fa-tools box-info pull"></i>
                                                        </button>
                                                    </th>
                                                    <th width=""
                                                        style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.123) 1px solid">
                                                        <input style="" type="number"
                                                            class="form-control pull-right" name="cantidadRepuesto"
                                                            id="cantidadRepuesto" placeholder="#" autocomplete="off">
                                                    </th>
                                                    <th width=""
                                                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.185) 1px solid">
                                                        <input style="margin-top: 0% " type="text"
                                                            class="form-control pull-right" name="descripcionRepuesto"
                                                            id="descripcionRepuesto" placeholder="Nombre Repuesto"
                                                            autocomplete="off"
                                                            onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                    </th>
                                                    <th width="" colspan="2"
                                                        style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong></strong>
                                                    </th>
                                                </tr>
                                            @endif
                                            <tr style=" font-size: 13px;text-align: center ">
                                                <th width="" colspan="2"
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left; border:  rgba(0, 0, 0, 0) 1px solid 1px solid">
                                                    &nbsp; <strong>
                                                        <div id="suggestionsRepuesto"></div>
                                                    </strong>
                                                </th>
                                                <th width=""
                                                    style=" background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong style="text-align: center">Subtotal</strong>
                                                </th>
                                                <th width=""
                                                    style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    <strong>${{ number_format($totalValorRepuestos, 0, ',', '.') }}
                                                    </strong>
                                                </th>
    
                                            </tr>
    
                                            <tr style=" font-size: 13px ">
                                                <th width="" colspan="2"
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp; <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong>Valor Servicio</strong>
                                                </th>
                                                <th width=""
                                                    style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;
                                                    @if ($arrayData->estadoOrden != 3 )
                                                        <input hidden value="{{ $arrayData->valor_servicio_orden }}"
                                                            style="color: black;font-weight:bold ;margin-top: -10%;text-align: right; "
                                                            type="text" class="form-control number"
                                                            @if ($arrayData->estadoOrden == 2 ) disabled @endif
                                                            name="valorservicio" id="valorservicio" placeholder=""
                                                            autocomplete="off">
                                                    @else
                                                        <strong>
                                                            <div class=""
                                                                style="font-size: 14px;color: black;text-align: right"
                                                                id="labelValorServicio">$
                                                                {{ number_format($arrayData->valor_servicio_orden, 0, ',', '.') }}
                                                            </div>
                                                        </strong>
                                                    @endif
    
                                                </th>
    
                                            </tr>
    
                                            <tr style=" font-size: 13px ">
                                                <th width="" colspan="2"
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp; <strong>
                                                    </strong></th>
                                                <th width=""
                                                    style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp; <strong>IVA 19%</strong>
                                                    <input
                                                        style="width: 20px; height: 20px; border-radius: 1em; margin: 0%"
                                                        title="SIN IVA" data-toggle="tooltip" data-placement="top"
                                                        class="form-check-input" type="checkbox" value=""
                                                        id="checkSinIva" autocomplete="off" onchange="calcularValores()">
    
                                                </th>
                                                <th width=""
                                                    style="font-size: 14px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid"><strong>
                                                        <div class="" style="color: black;text-align: right"
                                                            id="iva">${{ number_format($arrayData->iva_orden, 0, ',', '.') }} </div>
                                                    </strong>
                                                </th>
    
                                            </tr>
    
                                            <tr style=" font-size: 13px ">
                                                <th width="" colspan="2"
                                                    style=" height: 1px; font-weight:normal; text-align: left ">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width="" style="font-weight:normal;text-align: left"> <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong>Total</strong>
                                                </th>
                                                <th width="" id="valorTotalOrden"
                                                    style="color: black; font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                    <strong>
                                                        <div style="text-align: right " id="valorTotalOrde">${{ number_format($arrayData->valor_total_orden, 0, ',', '.') }}</div>
                                                    </strong>
                                                </th>
                                            </tr>
    
                                            @if($arrayData->estadoOrden == 3)
                                            <tr style=" font-size: 13px ">
                                                <th width="" colspan="2"
                                                    style=" height: 1px; font-weight:normal; text-align: left">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left">
                                                    &nbsp; <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>Factura Numero</strong>
                                                    @if(auth()->user()->rol == "ADMINISTRATIVO" && $arrayData->estadoOrden == 3)
                                                    <button title="Agregar Numero Factura" data-toggle="tooltip" id="btnAddFactura" class="btn style" style="margin: 0%;padding: 0%;  text-decoration: none; :hover border-color:white"><i style="font-size: 18px; color: #2874A6"   class="fas fa-file-invoice-dollar"></i></button>
                                                    @endif
                                                </th>
                                                <th width=""
                                                style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2px solid">
                                                &nbsp;<strong>{{$arrayData->factura_numero_orden}}</strong>
                                                </th>

                                            </tr>
                                            @endif

                                        </table>
                                    </div>


                                    <div class="row" required>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="responsive-font" style="font-size: 12px"><strong ><i class="fa-solid fa-print"></i>ORDEN DE ENTRADA</strong></label> <br>
                                                <a href="{{ url('OrdenEntrada', encrypt($arrayData->id_orden)  ) }}">
                                                    <button   class="btn style btn-secondary  " style=" "><i style="font-size: 30px;color: rgb(167, 52, 52)" class="fas fa-file-pdf"></i></button>
                                                </a>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                @if($arrayData->estadoOrden == 3)
                                                <label style="font-size: 12px"><strong><i class="fa-solid fa-print"></i> ORDEN DE SALIDA</strong></label> <br>
                                                <a href="{{ url('imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW', ['email' =>'NO' ,'idOrden' => $arrayData->id_orden] ) }}">
                                                    <button   class="btn btn-secondary pull-left style" style="  padding: 8px; text-decoration: none; :hover border-color:white"><i style="font-size: 30px; color: rgb(167, 52, 52)" class="fas fa-file-pdf"></i></button>

                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                   
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <br>
                                                @if($arrayData->estadoOrden == 1 || $arrayData->estadoOrden == 2)
                                                    <input type="button" style="margin: 5px;padding: 9px 15px;background-color: #4c2d8b ; color: #ffffff" class="btn pull-right align-items-end" id="btnEnviarBodega"
                                                     value= "ENVIAR A BODEGA">
                                        
                                                @endif 
                                                
                                            </div>  
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <br>
                                                @if($arrayData->estadoOrden == 2)
                                                    <input type="button" style="margin: 5px;padding: 9px 15px;" class="btn btn-success pull-right" id="btnEntregarOrden"
                                                        @foreach ($repuesto as $repuestos)
                                                                @if($repuestos->estado_repuesto == 1)
                                                                    disabled  title="PENDIENTE DE AUTORIZAR REPUESTO"
                                                                @endif
                                                        @endforeach
                                                    onclick="entregarOrden(event)"  value= "ENTREGAR EQUIPO">
                                                @elseif($arrayData->estadoOrden == 1 || $arrayData->estadoOrden == 4)
                                                    
                                                    <input type="button" style="margin: 5px;padding: 9px 15px;" class="btn btn-success pull-right" id="btnTerminarEntregarOrden"
                                                    @if ($pendAutRep > 0)
                                                        onclick="alertPendRepuesto()"
                                                    @else
                                                        onclick="terminaryEntregarOrden()"
                                                    @endif
                                                     value= "TERMINAR Y ENTREGAR EQUIPO">
                                        
                                                @endif 

                                            </div>
                                        </div>
                                    </div>



                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
{{-- Incluir modales --}}
@include('modulos.ordenServicio.modal.mdlAgregarNumeroFactura')
@include('modulos.ordenServicio.modal.mldCambiarEstadoOrden')
@include('modulos.ordenServicio.modal.mdlCambiarTecnico')
@include('modulos.ordenServicio.modal.mldEnviarBodega')
@section('js')
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="{!! url('assets/js/toastr.min.js') !!}"></script>
    <script src="{!! url('js/editOrden.js?version=1.1') !!}"></script>
    <script src="{!! url('js/entregarOrden.js?v=1.1') !!}"></script>
    <script src="{!! url('js/ordenGeneral.js?v=1.1') !!}"></script>
    <script src="{!! url('js/facturaNumero.js?v=1.0') !!}"></script>

@endsection


@endsection
