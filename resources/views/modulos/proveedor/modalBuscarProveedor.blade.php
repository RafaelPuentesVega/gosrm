<!-- Modal para agregar proveedor -->
<div class="modal fade" id="modalBuscarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalBuscarProveedorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalAgregarProductoLabel">Proveedores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  class="row" >
                    <div class="col-md-12"  >
                        <div class="form-group text-right">
                            <button id="btn-agregar-proveedor" name="btn-agregar-proveedor" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </div>
                <br>

                <table id="tablaBuscarProveedores" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Ubicacion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
