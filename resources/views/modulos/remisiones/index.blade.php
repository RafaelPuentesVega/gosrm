@extends('plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
.table tbody tr {
    cursor: pointer;
}

.table tbody tr:hover {
    background-color: #ff0000;
}
</style>
@endsection
@section('content')
<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style=" color: #ffffff ; padding-bottom :10px;">
                        <strong>REMISIONES</strong>
                </div>
            </div>
            <div class="card">
                <br>
                <div class="row">
                    <div class="container-fluid">

                            <form id="formDatosCliente">
                                <fieldset class="border ">
                                    <legend class="float-none w-auto p-2" style="font-size: 16px">Información Personal</legend>

                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span id="btnAbrirBuscarCliente" class="input-group-addon" style="width: 40px ; cursor: pointer;" id="basic-addon1">
                                                        <i  style="color: #6c757d; font-size: 16px; " class="fa fa-search"></i>
                                                    </span>
                                                    <input placeholder="Digite numero de documento"  class="form-control text-uppercase" id="documentoCliente" name="documentoCliente">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control text-uppercase" id="nombreCliente" name="nombreCliente">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control text-uppercase" id="correoCliente" name="correoCliente">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control text-uppercase" id="direccionCliente" name="direccionCliente">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control text-uppercase" id="celularCliente" name="celularCliente">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input disabled type="text" class="form-control text-uppercase" id="telefonoCliente" name="telefonoCliente">
                                            </div>
                                        </div>
                                    </div>  
                                </fieldset>

                            </form>
                            <br>

                            <fieldset class="border ">
                                <legend class="float-none w-auto p-2" style="font-size: 16px">Productos</legend>
                                <form id="formDatosProducto">
                                    <div class="row" >
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="remisionNombreProducto">Producto</label>
                                                <div class="input-group">
                                                    <span id="btnAbrirBuscarProducto" class="input-group-addon" style="width: 40px ; cursor: pointer;" id="basic-addon1">
                                                        <i  style="color: #6c757d; font-size: 16px; " class="fa fa-search"></i>
                                                    </span>
                                                        <input placeholder="Nombre producto" required type="text" class="form-control text-uppercase" id="remisionNombreProducto" name="remisionNombreProducto">
                                                </div>
                                            </div>                                        
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="remisionCantidadProducto">Cantidad</label>
                                                <input disabled required type="number"  class="form-control text-uppercase" id="remisionCantidadProducto" name="remisionCantidadProducto" oninput="calcularSubtotal()">
                                            </div>                                        
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="remisionPrecioProducto">Precio Unitario</label>
                                                <input  required disabled type="text" class="form-control text-uppercase" id="remisionPrecioProducto" name="remisionPrecioProducto" oninput="formatoPrecio(this) , calcularSubtotal()" >
                                            </div>                                        
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="remisionSubtotalProducto">SubTotal</label>
                                                <input disabled type="text" class=" form-control text-uppercase" id="remisionSubtotalProducto" name="remisionSubtotalProducto">
                                            </div>                                        
                                        </div>

                                        <div class="col-md-1">
                                                <div style="padding-top: 25px">
                                                    <button type="submit" id="btn-guardar-producto-remision" class="btn btn-primary text-bold-700">Agregar</button>
                                                </div>                                      
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <br>

                            <fieldset class="border ">
                                <legend class="float-none w-auto p-2" style="font-size: 16px">Productos Agregados</legend>
                                <table id="tablaProductosAgregados" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Aquí se agregarán las filas dinámicamente -->
                                    </tbody>
                                </table>
                            </fieldset>

                            <br> <br>
                            <div>
                                <div class="text-right">
                                    <button type="submit" id="btn-guardar-remision" class="btn btn-primary text-bold-700">Guardar Remision</button>
                                </div>     
                            </div>
                            
                            
                    </div>



                    <br> <br>
                </div>


            </div>

        </div>
    </div>
</div>

{{-- modal productos --}}
@include('modulos.remisiones.modalBuscarProductos')
{{-- modal clientes --}}

@include('modulos.remisiones.modalBuscarClientes')
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{!! url('js/remisiones.js') !!}"></script>
<script src="{!! url('js/producto_crear.js') !!}">

@endsection

            