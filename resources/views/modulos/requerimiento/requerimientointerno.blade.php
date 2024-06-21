@extends('plantilla')
@section('content')

@section('css')
<link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/>
<link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet"/>
@endsection

<div class="wrapper">
    <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-15">
                                <div class="card "  >
                                    <div class="header" style="background-color: #06419f">
                                        <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>REPUESTOS PENDIENTES DE AUTORIZACION</strong></h3>
                                    </div>
                                </div>

                                <table id="clients" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr style="font-size: 50px;">

                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>CANTIDAD</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>REPUESTO</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>N° ORDEN</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>TECNICO</strong></th>
                                            <th scope="col" class="text-center"  style="font-size: 15px;color:#16172C"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($repuestoAutorizar->toarray()))
                                        <tr>

                                        <td class="text-center" colspan="5"> <img style="  width:30%;
                                            height:30%;" src="{!! url('assets/img/alDia.jpg') !!}" alt=""></td>
                                        </tr>

                                        <tr>
                                        <td style="background-color: #dedede48; color: gray" colspan="5" class="text-center">*No hay repuestos pendientes de autorizar</td>

                                        </tr>
                                        @else
                                        @foreach($repuestoAutorizar as $repuestoAutoriza)
                                            <tr style="height: 50px">
                                                <td width="10%" class="text-center">{{$repuestoAutoriza->cantidad_repuesto}}<strong></strong></td>
                                                <td width="50%" class="text-center">{{$repuestoAutoriza->nombre_repuesto}}<strong></strong></td>
                                                <td width="10%" class="text-center" style="font-size: 20px"><strong>{{$repuestoAutoriza->id_orden_servicio_repuesto}}</strong></td>
                                                <td width="25%" class="text-center">{{$repuestoAutoriza->user_creation_repuesto}}<strong></strong></td>

                                                <td width="5%">
                                                    <button  title="AGREGAR PRECIO" data-toggle="tooltip" data-placement="left" style="border: none; outline:none; text-decoration: none; margin: 0px" type="submits" class="btn btn-warning btn-fill  pull-right " id="btnGuardarCliente" onclick="editarRepuesto('{{ $repuestoAutoriza->id_repuesto }}')" >
                                                        <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-currency-dollar box-info pull-left"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>


                        </div>
                    </div>
                </div>
         </div>
    </div>
</div>

@include('modulos.requerimiento.modalAutorizar')

@section('js')
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="{!! url('js/requerimiento.js') !!}"></script>
    <script src="{!! url('assets/js/toastr.min.js') !!}"></script>
@endsection

@endsection
