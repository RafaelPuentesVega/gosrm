<!-- Modal para agregar producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalAgregarProductoLabel">Agregar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarProducto">
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoriaProducto">Categoría</label>
                                <select required class="form-control "  id="categoriaProducto" name="categoriaProducto">
                                    <option value="" disabled selected>--Seleccione--</option>
                                    @foreach ($categoriasProducto as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>                                
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nombreProducto">Nombre</label>
                                <input required type="text" class="form-control text-uppercase" id="nombreProducto" name="nombreProducto">
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marcaProducto">Marca</label>
                                <input required type="text" class="form-control text-uppercase" id="marcaProducto" name="marcaProducto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modeloProducto">Modelo</label>
                                <input type="text" class="form-control text-uppercase" id="modeloProducto" name="modeloProducto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cantidadStockProducto">Cantidad en Stock</label>
                                <input required type="number" class="form-control " id="cantidadStockProducto"
                                    name="cantidadStockProducto">
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="precioProducto">Precio de Venta</label>
                                <input required type="text" class="form-control text-uppercase" id="precioProducto" name="precioProducto" oninput="formatoPrecio(this)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="proveedorProducto">Proveedor</label>
                                <input required type="text" class="form-control text-uppercase" id="proveedorProducto" name="proveedorProducto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="precioCompraProducto">Precio de Compra</label>
                                <input required type="text" class="form-control" id="precioCompraProducto" name="precioCompraProducto" oninput="formatoPrecio(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estadoProducto">Estado</label>
                                <select required class="form-control "  id="estadoProducto" name="estadoProducto">
                                    <option value="" disabled selected></option>
                                    <option value="Nuevo" >Nuevo</option>
                                    <option value="Usado" >Usado</option>
                                </select>                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigoBarrasProducto">Codigo de Barras</label>
                                <input required type="text" class="form-control " id="codigoBarrasProducto" name="codigoBarrasProducto">
                            </div>
                        </div>
                    </div>
                        <div class="text-right">
                            <button type="submit" id="btn-crear-producto" class="btn btn-primary text-bold-700">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
