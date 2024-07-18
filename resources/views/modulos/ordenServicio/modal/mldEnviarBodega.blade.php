
<div class="modal  " id="mldEnviarBodega" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <br>
      <div class="row" >
          <div class="text-center">
              <label style="color: gray" for="">Enviar Equipo a Bodega</label>
          </div>
      </div>
      <br>
      <hr>
      <div style="margin-top: -3%" class="text-center">
        <label style="color: gray ; font-size: 11px" for="">Agregar comentario, Indicando el motivo.</label>
      </div>
      <div class="row">
        <div class="col-md-12">
          <textarea  rows="4" id="enviarBodegaObservacion" maxlength="500" class="form-control" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>

        </div>

      </div>



      <div class="modal-footer">
        <button type="button" id="btnEnviarBodegaMdl" class="btn btn-info btn-fill ">Guardar</button>
      </div>
    </div>
  </div>
</div>
