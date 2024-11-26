@extends('plantilla')
@section('content')
@section('css')
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        table,
        tr,
        td,
        th {
            height: 32px;
        }
        #tablaBuscarProductos tbody tr {
            cursor: pointer;
        }
        #suggestionsRepuesto {
            border-radius: 15px 15px 15px 15px;
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            /* top: 61px; */
            z-index: 9999;
            width: 60%;
        }

        #suggestionsRepuesto .suggest-element {
            border-radius: 15px 15px 15px 15px;
            background-color: #f8f8f8;
            border-top: 1px solid #f0eded;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #btnEliminarRepuesto:hover {
            text-decoration: none;
            border: none;

        }
    </style>
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body style="background-color:rgba(233, 233, 233, 0.295);">

                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-15">

                            <div class="card ">
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;">
                                        <strong>ORDEN DE SERVICIO N° {{ $arrayData->id_orden }}</strong>
                                    </h3>
                                </div>
                            </div>

                            <div class="card " style="border-radius: 10px 10px 10px 10px;box-shadow: 0 0 11px 4px #0000001f;">


                                <div class="header">
                                    <input disabled id="idOrden" value="{{ $arrayData->id_orden }}" hidden>
                                    <input disabled id="totalValorRepuestos" value="{{ $totalValorRepuestos }}" hidden>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <label for=""><i
                                                        style="color: rgba(0, 0, 0, 0.841); font-size: 18px"
                                                        class="fas fa-calendar-alt"></i><strong>&nbsp;FECHA
                                                        INGRESO</strong></label>
                                                <h4 style="width: 83%" class="caja" id="fecha_creacion_orden">
                                                    {{ $arrayData->fecha_creacion_orden }}</h4>

                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for=""><i
                                                        style="color: rgba(0, 0, 0, 0.841); font-size: 18px"
                                                        class="fas fa-calendar-day"></i><strong>&nbsp;FECHA
                                                        ESTIMADA</strong></label>
                                                <h4 style="width: 83%" class="caja" id="fecha_estimada">
                                                    {{ $arrayData->fecha_estimada_orden }}</h4>

                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <label for=""><i
                                                    style="color: rgba(0, 0, 0, 0.841); font-size: 16px"
                                                    class="fas fa-calendar"></i><strong style="font-size: 10px">FECHA
                                                    DIAGNOSTICO</strong></label>

                                            @if (isset($arrayData->fecha_diagnostico_orden))
                                                <h4 style="width: 83%" class="caja" id="fecha_diagnostico">
                                                    {{ $arrayData->fecha_diagnostico_orden }}</h4>
                                            @else
                                                <h4 style="width: 83%" class="caja" id="fecha_diagnostico">- <br> -
                                                </h4>
                                            @endif


                                        </div>
                                    </div>
                                </div>
                                <div class="content">

                                    <div class="tabla">


                                        <table class="table-style" width="100%"
                                            style="border-radius: 8px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                            <tr style=" font-size: 17px;  ">
                                                <th colspan="4"
                                                    style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<label
                                                        style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong>
                                                    </label> </th>
                                                </th>
                                            </tr>
                                            <tr style=" font-size: 12px ">
                                                <th width="22%"
                                                    style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Nit o C.C: &nbsp; </label>
                                                        {{ $arrayData->cliente_documento }}</strong>
                                                </th>
                                                <th colspan="2" width="37%"
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp; <strong>
                                                        <label>Nombre:&nbsp;</label>
                                                        {{ $arrayData->cliente_nombres }}</strong> </th>
                                                <th width="41%"
                                                    style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>E-Mail:&nbsp;</label>
                                                        {{ $arrayData->cliente_correo }}</strong>
                                                </th>

                                            </tr>

                                            <tr>
                                                <th width="30%"
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
                                                <th width="30%"
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
                                <div class="content">

                                    <table class="table-style" width="100%"
                                        style="box-shadow: 0 0 11px 4px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                                        <tr>
                                            <th colspan="4"
                                                style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1;font-size: 15px; height: 1px;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<label
                                                    style="color: #1C2833; font-size: 14px"><strong>EQUIPO</strong>
                                                </label> </th>

                                            </th>

                                        </tr>

                                        <tr style="height: 38px">
                                            <th width="20%"
                                                style=" font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<label><strong>Equipo:
                                                        &nbsp;</label>{{ $arrayData->equipo_tipo }}</strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<strong><label>Marca:&nbsp;</label>{{ $arrayData->equipo_marca }}
                                                </strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<strong><label>Referencia:&nbsp;</label>{{ $arrayData->equipo_referencia }}
                                                </strong>

                                            </th>
                                            <th width="20%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong><label>Serial:&nbsp;</label>{{ $arrayData->equipo_serial }}</strong>

                                            </th>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Garantia:</strong></label>
                                                {{ $arrayData->garantia_orden }} <br>
                                                <label><strong>Contrato:</strong></label>
                                                {{ $arrayData->contrato_orden }}

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
                                                @if ($arrayData->serial_adaptador_orden != null)
                                                    <div style=" ">
                                                        <label><strong>Adaptador Serial N°:</strong></label>
                                                        {{ $arrayData->serial_adaptador_orden }}
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
                                            <div class="form-group">
                                                <label><strong> Daño Equipo</strong></label> <br>
                                                {{ $arrayData->descripcion_dano_orden }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Reporte Tecnico</strong></label> <br>
                                                <textarea @if ($arrayData->estadoOrden != 1) disabled @endif
                                                    @if ($diagnostico != 1) disabled placeholder="Guardar diagnostico" @endif rows="3"
                                                    id="reporteTecnico" class="form-control" maxlength="1500" placeholder="REPORTE TECNICO" autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">{{ $arrayData->reporte_tecnico_orden }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="text-align: right; margin-bottom: -20px"><label><strong>TECNICO:
                                            </strong></label>{{ $arrayData->name }}
                                            @if($arrayData->estadoOrden = 1 )
                                            <button id="btncambiarTecnico" title="Cambiar Tecnico" data-toggle="tooltip" class="btn style"><i style="font-size: 16px" class="fas fa-undo"></i></button>
                                            @endif
                                        </div>
                                    <hr>
                                    <div style="text-align: right; margin-top: -5px; font-size: 10px"><i><label
                                                style=" font-size: 9px">Recibido Por:</label>
                                            @if (isset($arrayData->user_created))
                                                {{ $arrayData->user_created }}
                                            @else
                                                N/A
                                            @endif
                                        </i> </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label style="font-size: 14px"
                                                for=""><strong>Diagnostico</strong></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                @if ($diagnostico == 1)
                                                    <div class="caja" style="text-align: left">
                                                        {{ $Arraydiagnostico->descripcion_observacion }}</div>
                                                @else
                                                    <textarea style="text-transform: uppercase;" rows="2" id="diagnostico" class="form-control" maxlength="1500"
                                                        placeholder="Diagnostico Tecnico" autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    @if ($diagnostico != 1)
                                                        <button title="Agregar Diagnostico" data-toggle="tooltip"
                                                            data-placement="right"
                                                            style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none;"
                                                            type="button" class="btn btn-info btn-fill  "
                                                            id="btnDiagnostico" onclick="guardarDiagnostico()">
                                                            <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                                class="bi bi-plus-lg box-info pull-left"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label style="font-size: 14px"
                                                for=""><strong>NOVEDAD</strong></label>

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea rows="1" style="text-transform: uppercase" id="anotacion" class="form-control" maxlength="240"
                                                    placeholder="Novedades" autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    <button title="Agregar Novedad" data-toggle="tooltip"
                                                        data-placement="right"
                                                        style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none"
                                                        type="button" class="btn btn-info btn-fill "
                                                        id="btnAnotacion" onclick="guardarAnotacion()">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-plus-lg box-info pull-left"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (sizeOf($anotacion) != 0)
                                        <div class="table-responsive-xl">
                                            <div style="text-align: center">ANOTACIONES</div>

                                            <table class="table table-striped" width="100%"
                                                style="text-align: center;border-radius: 10px;box-shadow: 0 0 11px 4px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                                <thead class="thead-light">
                                                    <tr
                                                        style="background-color: rgba(226, 226, 226, 0.295);; height: 38px">
                                                        <th width="16%"
                                                            style=" font-size: 12px ;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>FECHA </strong>

                                                        </th>
                                                        <th width="64%"
                                                            style="font-size: 12px ; font-weight:normal;text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong> NOVEDADES</strong>

                                                        </th>
                                                        <th width="20%"
                                                            style="font-size: 12px ;font-weight:normal;  text-align: center
                                                        ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>USER</strong>

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($anotacion as $comentario)
                                                        <tr>
                                                            <th width="20%"
                                                                style="font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;{{ $comentario->created_at_observacion }}

                                                            </th>
                                                            <th width="50%"
                                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp; {{ $comentario->descripcion_observacion }}

                                                            </th>
                                                            <th width="30%"
                                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;{{ $comentario->user_observacion }}

                                                            </th>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    <hr>
                                    <table class="" width="100%"
                                        style="border-radius: 11px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 1.5px solid">
                                        <tr style=" font-size: 13px ; background-color: #AED6F1">

                                            <th width="10%" colspan="2"
                                                style="border-top-left-radius: 0.5rem; height: 1px; font-weight:normal; text-align: center">
                                                &nbsp;<strong style="">Cantidad </strong>
                                            </th>
                                            <th width="60%" style="font-weight:normal;text-align: left ">
                                                &nbsp; <strong>
                                                    Descripcion</strong> </th>
                                            <th width="15%"
                                                style="font-size: 13px ;font-weight:normal;  text-align: left">
                                                &nbsp;<strong>$ Unitario</strong>
                                            </th>
                                            <th width="15%"
                                                style="border-top-right-radius: 0.5rem;font-size: 13px ;font-weight:normal;  text-align: left">
                                                &nbsp;<strong>$ Total</strong>
                                            </th>
                                        </tr>
                                        @if (sizeOf($repuesto) != 0)
                                            @foreach ($repuesto as $repuestos)
                                                <tr style=" font-size: 13px ">
                                                    @if ($repuestos->estado_repuesto == 1 && $arrayData->estadoOrden == 1)
                                                        <th width="3%"
                                                            style=" height: 1px; font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid; border-right: #ffffff">
                                                            <button style="margin: 5%"
                                                                data-value={{ $repuestos->id_repuesto }}
                                                                title="Eliminar" data-toggle="tooltip"
                                                                data-placement="bottom" type="button"
                                                                class=" btnEliminarRepuesto style btn btn-close"
                                                                id="btnEliminarRepuesto">
                                                                <i style="color: red; font-size: 15px"
                                                                    class="fas fa-trash"></i>
                                                            </button>
                                                        </th>
                                                        <th width="" colspan=""
                                                            style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid; border-left: #ffffff">
                                                            &nbsp;{{ $repuestos->cantidad_repuesto }}
                                                        </th>
                                                    @else
                                                        <th width="" colspan="2"
                                                            style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;{{ $repuestos->cantidad_repuesto }}
                                                        </th>
                                                    @endif
                                                    <th width=""
                                                        style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;{{ $repuestos->nombre_repuesto }}
                                                    </th>
                                                    @if ($repuestos->estado_repuesto == 1)
                                                        <th width="" colspan="2"
                                                            style="color: red; font-size: 13px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"
                                                            id="valorTotalRepuesto">
                                                            &nbsp; *Pendiente de Autorizacion
                                                        </th>
                                                    @else
                                                        <th width=""
                                                            style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid"
                                                            id="valorTotalRepuesto">
                                                            &nbsp;<strong>${{ number_format($repuestos->valor_unitario_repuesto, 0, ',', '.') }}</strong>
                                                        </th>
                                                        <th width=""
                                                            style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>${{ number_format($repuestos->valor_total_repuesto, 0, ',', '.') }}</strong>
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
                                                <input style="display: none" disabled class="form-control" id="idProducto" name="idProducto" type="text" name="">
                                                <div class="input-group">
                                                    <span id="btnAbrirBuscarProductoOrden" class="input-group-addon" style="width: 40px ; cursor: pointer;" id="basic-addon1">
                                                        <i  style="color: #6c757d; font-size: 16px; " class="fa fa-search"></i>
                                                    </span>

                                                    <input style=" align-content: flex-end; margin-top: 0% ; " type="text"
                                                        class="form-control pull-right" name="remisionNombreProducto"
                                                        id="remisionNombreProducto" placeholder="Nombre Repuesto"
                                                        autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
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
                                                @if ($arrayData->estadoOrden == 1)
                                                    <input hidden value="{{ $arrayData->valor_servicio_orden }}"
                                                        style="color: black;font-weight:bold ;margin-top: -10%;text-align: right; "
                                                        type="text" class="form-control number"
                                                        name="valorservicio" id="valorservicio" placeholder=""
                                                        autocomplete="off">
                                                @else
                                                    <strong>
                                                        <div class=""
                                                            style="font-size: 14px;color: black;text-align: right"
                                                            id="iva">$
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
                                                style="font-size: 14px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>
                                                    <div class="" style="color: black;text-align: right"
                                                        id="iva">$
                                                        {{ number_format($arrayData->iva_orden, 0, ',', '.') }}
                                                    </div>
                                                </strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width="" colspan="2"
                                                style=" height: 1px; font-weight:normal; text-align: left ">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width="" style="font-weight:normal;text-align: left">
                                                &nbsp; <strong>
                                                </strong> </th>
                                            <th width=""
                                                style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>Total</strong>
                                            </th>
                                            <th width="" id="valorTotalOrden"
                                                style="color: black; font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                <strong>
                                                    <div style="text-align: right " id="valorTotalOrde">
                                                        ${{ number_format($arrayData->valor_total_orden, 0, ',', '.') }}
                                                    </div>
                                                </strong>
                                            </th>
                                        </tr>

                                    </table>



                                    @if ($arrayData->estadoOrden == 1)
                                        <br><br> <button class="btn btn-success btn-fill pull-right"
                                    @if ($diagnostico != 1) id="btnPendDiag" title="PENDIENTE DE DIAGNOSTICO"
                                    @elseif($pendAutRep >= 1)
                                    id="btnPendRep" title="PENDIENTE DE AUTORIZAR" data-value={{ $pendAutRep }}
                                    @else
                                    id="btnTerminarOrden" @endif>TERMINAR
                                            ORDEN</button>

                                        <div class="clearfix"></div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@include('modulos.ordenServicio.modal.mdlCambiarTecnico')
{{-- modal productos --}}
@include('modulos.remisiones.modalBuscarProductos')
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{!! url('assets/js/toastr.min.js') !!}"></script>
    <script src="{!! url('js/editOrden.js?version=1.2') !!}"></script>
    <script src="{!! url('js/producto_crear.js') !!}"></script>
    <script src="{!! url('js/remisiones.js') !!}"></script>
@endsection


@endsection
