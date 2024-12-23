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
.input-group-addon{
    width: 40px ;
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
                    </h3>
                </div>
            </div>
            <div class="card">
                <br>
                <form id="formDatosRemision">
                    <div class="row">
                        <div class="col-md-3" >
                            <div class="form-group">                                            
                                <label for="tipoPagoPedido">Tipo Pago</label>
                                <select required class="form-control "  id="tipoPagoPedido" name="tipoPagoPedido">
                                    <option value="" disabled selected></option>
                                    <option value="efectivo" >Efectivo</option>
                                    <option value="transferencia" >Transferencia </option>
                                </select>                                              
                            </div>                                        
                        </div>
                    <div class="col-md-9" >
                        <div class="form-group"> 
                            <div style="text-align: right">
                                <button id="btn-abrir-frm-remisiones" type="button" class="btn btn-primary" >Ver remisiones</button>

                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="container-fluid">

                            <form id="formDatosCliente">
                                
                                <fieldset class="border ">
                                    <legend class="float-none w-auto p-2" style="font-size: 16px">Información Cliente</legend>

                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span id="btnAbrirBuscarCliente" class="input-group-addon" style="width: 40px ; cursor: pointer;" id="basic-addon1">
                                                        <i  style="color: #6c757d; font-size: 16px; " class="fa fa-search"></i>
                                                    </span>
                                                    <input type="number" placeholder="Digite numero de documento"  class="form-control text-uppercase" id="documentoCliente" name="documentoCliente">
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
                                                <input disabled style="display: none" required type="text" class="form-control text-uppercase" id="idProducto" name="idProducto">

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
                                <table id="tablaProductosAgregados" class="table table-striped ">
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
{{-- modal crear clientes --}}
@include('modulos.cliente.create-modal')
{{-- modal crear producto --}}
@include('modulos.productos.create-modal')

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{!! url('js/remisiones.js?v=1.0') !!}"></script>
<script src="{!! url('js/producto_crear.js') !!}"></script>

@endsection

            