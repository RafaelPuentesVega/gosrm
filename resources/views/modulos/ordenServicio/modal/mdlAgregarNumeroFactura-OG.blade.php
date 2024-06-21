<!-- Modal -->
<div class="modal fade" id="mdlAgregarNumeroFactura-OG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="text-center">
                <label style="color: #fefefec2; font-size: 15px" for="">Agregar Numero Factura</label>
            </div>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <input type="text" hidden id="idOrden">
                           <label for=""> Orden Numero</label> - <strong id="idOrdemdlFactura" style="font-size: 15px"></strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div>
                                <input id="mdNumeroFactura" type="text" class="form-control" name="mdNumeroFactura" required autocomplete="off">
                            </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="guardarNumeroFactura()">Guardar</button>
        </div>
      </div>
    </div>
  </div>
