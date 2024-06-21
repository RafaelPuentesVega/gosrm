
  <div class="modal  " id="mdlcambiarTecnico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <br>
        <div class="row" >
            <div class="text-center">
                <label style="color: gray" for="">Cambiar Tecnico</label>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="tecnicoAntes" value="{{ $arrayData->name }}" hidden>
            <div id="Tecnicos">

            </div>
          </div>

        </div>
        <hr>
        <div style="margin-top: -3%" class="text-center">
          <label style="color: gray ; font-size: 11px" for="">Agregar comentario, Indicando el cambio del Tecnico.</label>
        </div>
        <div class="row">
          <div class="col-md-12">
            <textarea  rows="4" id="comentarioCambioTecnico" maxlength="500" class="form-control" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>

          </div>

        </div>



        <div class="modal-footer">
          <button type="button" id="guardarCambioTecnico" class="btn btn-info btn-fill ">Guardar</button>
        </div>
      </div>
    </div>
  </div>
