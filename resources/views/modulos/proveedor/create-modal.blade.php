<!-- Modal para agregar proveedor -->
<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProveedorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalAgregarProveedorLabel">Agregar Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarProveedor">
                    <div class="row" >                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="documentoProveedorMdl">Documento</label>
                                <input required type="text" class="form-control text-uppercase" id="documentoProveedorMdl" name="documentoProveedorMdl">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nombreProveedorMdl">Nombre</label>
                                <input required type="text" class="form-control text-uppercase" id="nombreProveedorMdl" name="nombreProveedorMdl">
                            </div>
                        </div>

                    </div>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celularProveedorMdl">Celular</label>
                                <input required type="text" class="form-control text-uppercase" id="celularProveedorMdl" name="celularProveedorMdl">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ubicacionProveedorMdl">Ubicación</label>
                                <input required type="text" class="form-control text-uppercase" id="ubicacionProveedorMdl" name="ubicacionProveedorMdl">
                            </div>
                        </div>
                    </div>
                        <div class="text-right">
                            <button type="button" id="btn-crear-proveedor" class="btn btn-primary text-bold-700">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
