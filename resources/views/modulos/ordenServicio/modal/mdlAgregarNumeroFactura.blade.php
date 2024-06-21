{{-- <div id="mdlAgregarFactura" class="modal-dialog modal-dialog-centered">
    ...
  </div> --}}
  <div class="modal  " id="mdlAgregarFactura" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-sm modal-dialog" role="document">
      <div class="modal-content">
        <br>
        <div class="row" >
            <div class="text-center">
                <label style="color: gray" for="">Agregar Numero Factura</label>
            </div>
                <input width="50%" id="mdNumeroFactura" type="text" class="form-control" name="mdNumeroFactura" required autocomplete="off">

        </div>



        <div class="modal-footer">
          <button type="button" onclick=" guardarNumeroFactura() " class="btn btn-info btn-fill ">Guardar</button>
        </div>
      </div>
    </div>
  </div>
