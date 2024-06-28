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
                        <strong>PRODUCTOS</strong>
                </div>
            </div>
            <div class="card">

                <div class="container-fluid">
                    <br>
                    <div class="text-right">
                        <button id="btnAbrirProducto" class="btn btn-primary text-bold-600 text-xxl-center" >Añadir Producto</button>

                    </div>
                    <br>


                    <table id="tablaProductos" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Precio Venta</th>                                
                                <th>Ult. Proveedor</th>
                                <th>Ult. Precio Compra</th> 
                                <th>Codigo de Barras</th> 
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

@include('modulos.productos.create-modal')


@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script src="{!! url('js/producto.js') !!}"></script>
<script src="{!! url('js/producto_crear.js') !!}">

@endsection

            