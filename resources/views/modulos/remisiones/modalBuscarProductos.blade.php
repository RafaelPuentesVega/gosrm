<!-- Modal para agregar producto -->
<div class="modal fade" id="modalBuscarProducto" tabindex="-1" role="dialog" aria-labelledby="modalBuscarProductoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalBuscarProductoLabel">Productos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  class="row" >
                    <div class="col-md-12"  >
                        <div class="form-group text-right">
                            <button id="btn-agregar-producto" name="btn-crear-cliente" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </div>
                <br>


                <table id="tablaBuscarProductos" class="table table-striped " style="width:100%">
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
