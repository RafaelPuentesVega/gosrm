@extends('plantilla')
@section('css')
    <link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet" />
@endsection
@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="card ">
                    <div class="header" style="background-color: #06419f">
                        <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>PLANTILLAS
                                CORREO</strong></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">TIPO DE NOTIFICACION</label>
                            <select class="js-example-basic js-states form-control" id="selectPlantilla" required>
                                <option disabled selected value=""></option>
                                @foreach ($findAll as $item)
                                    <option value={{ $item->id_plantillanotificaciones }}>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button disabled class="btn  btn-secondary btn-fill " id="btnVer"
                                style="margin-top: 7%">Ver Plantilla</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12" hidden id="caracteristicaPlantillas">
                <div class="card" style="box-shadow: 0 0 11px 4px #00000048; border-radius: 10px" >
                    <div class="row">
                        <div class="col-md-3" >
                            <div class="form-group" >
                                <label for=""><strong>NOTIFICACION</strong></label>
                                <p  style="font-size: 13px ;  font-style: italic;" id="notificacionNomb"></p>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group" >
                                <label for=""><strong>FRECUENCIA DE ENVIO</strong></label>
                                <p style="font-size: 13px ;  font-style: italic;" id="frecEnvio"></p>
                            </div>

                        </div>
                        <div class="col-md-2" >
                            <div class="form-group" >
                                <label for=""><strong>DIRIGIDO</strong></label>
                                <p style="font-size: 13px ;  font-style: italic;" id="dirigido"></p>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group" >
                                <label style="text-align: center" for=""><strong>DESCRIPCION</strong></label>
                                <p style="font-size: 13px ;  font-style: italic;" id="descripcion"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@include('modulos.correo-admin.mdlPlantillaView')
@section('js')
<script src="{!! url('js/plantillaCoreo.js') !!}"></script>
@endsection

@endsection

