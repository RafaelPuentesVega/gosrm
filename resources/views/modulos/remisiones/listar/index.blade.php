@extends('plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
@endsection
@section('content')
<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style=" color: #ffffff ; padding-bottom :10px;">
                        <strong>REMISIONES </strong>
                </div>
            </div>
            <div class="card">

                <div class="container-fluid">
                    <br>
                    <br>


                    <table id="tablaRemisiones" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>id Remision</th>

                                <th>Fecha</th>
                                <th>Documento</th>
                                <th>Cliente</th>
                                <th>Metodo Pago</th>
                                <th>Valor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    

                </div>

            </div>

        </div>
    </div>
</div>

@include('modulos.remisiones.listar.modalDetalleRemision')

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script src="{!! url('js/remisiones.js') !!}"></script>
<script src="{!! url('js/remisiones_listar.js') !!}"></script>

@endsection

            