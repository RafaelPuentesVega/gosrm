@extends('plantilla')
@section('content')
@section('css')
    <link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{!! url('fontawesome/css/fontawesome.min.css') !!}" />
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet"/>
    <style>
        input {
            border-radius: 10rem !important;
            height: 4rem !important;
            padding: 1.5rem 1.5rem !important;
        }
    </style>
    @endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="row">
                <div class="col-md-3 ">

                    <div style="cursor: pointer;border-top: 0.35rem solid #4e73df ; border-radius: 10px; box-shadow: 0 0 11px 4px #0000001f"
                        class="card  table-style">

                        <div class="row align-items-center">

                            <div class="card-content" id="servicio">
                                <div class="col-md-6  ">
                                    <div class="card-header ">
                                        <div class="" style="text-align: center">
                                            <label
                                                style="padding: 20%; font-size: 15px; font-weight: bold">SERVICIOS</label>

                                            <p style="margin: 0%; font-size: 12px; color: rgba(109, 108, 108, 0.747)">
                                                Registrar y administrar.</p>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 ">


                                    <div class="card-body">

                                        <div style="padding: 5%; text-align: center"><img style="margin: 2%"
                                                width="130" class="img-fluid" src="{!! url('assets/img/servicio-tecnico.png') !!}"
                                                alt=""></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1 ">
                </div>
                <div class="col-md-3 ">

                    <div style="cursor: pointer;border-top: 0.35rem solid #4e73df ; border-radius: 10px; box-shadow: 0 0 11px 4px #0000001f"
                        class="card  table-style">

                        <div class="row align-items-center">
                            <div class="card-content" id="notificaciones">
                                <div class="col-md-6  ">
                                    <div class="card-header ">
                                        <div class="" style="text-align: center">
                                            <label
                                                style="padding: 20%; font-size: 15px; font-weight: bold">NOTIFICACIONES</label>

                                            <p style=" font-size: 12px; color: rgba(109, 108, 108, 0.747)">
                                                Configurar Tiempo para el envio de correos.</p>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 ">



                                    <div class="card-body">

                                        <div style="padding: 5%; text-align: center"><img style="margin: 5%"
                                                width="130" class="img-fluid" src="{!! url('assets/img/correo.png') !!}"
                                                alt=""></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1 ">
                </div>
                <div class="col-md-3 ">

                    <div style="cursor: pointer;border-top: 0.35rem solid #4e73df ; border-radius: 10px; box-shadow: 0 0 11px 4px #0000001f"
                        class="card  table-style">

                        <div class="row align-items-center">
                            <div class="card-content" id="ordenServicio">
                                <div class="col-md-6  ">
                                    <div class="card-header ">
                                        <div class="" style="text-align: center">
                                            <label
                                                style="padding: 10%; font-size: 14px; font-weight: bold">ORDEN SERVICIO</label>

                                            <p style="margin: 0%; font-size: 12px; color: rgba(109, 108, 108, 0.747)">
                                                Configurar Tiempo para las ordenes.</p>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 ">



                                    <div class="card-body">

                                        <div style="padding: 5%; text-align: center"><img style="margin: 5%"
                                                width="130" class="img-fluid" src="{!! url('assets/img/gestion-del-tiempo.png') !!}"
                                                alt=""></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal de notificaciones correo --}}
@include('modulos.parametro.modal.mdlNotificacionesEmail')
{{-- Modal de vencimiento de ordenes de servicio --}}
@include('modulos.parametro.modal.mdlDiasVencimientoOrden')
@section('js')
<script src="{!! url('js/parametro.js') !!}"></script>
<script src="{!! url('assets/js/toastr.min.js') !!}"></script>
@endsection
@endsection
