
  <div class="modal  " id="mdlcambiarEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <br>
        <div class="row" >
            <div class="text-center">
                <label style="color: gray" for="">Cambiar Estado Orden</label>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div style="text-align: right">
              @if ($arrayData->estadoOrden == 1)
                  <label>Reparacion</label>
              @elseif($arrayData->estadoOrden == 2)
                  {{-- {{-- ORDEN LISTA PARA ENTREGAR --}}
                  <label >Lista Para Entregar</label>
              @elseif($arrayData->estadoOrden == 3)
                  <label >Entregada</label>
                  {{-- {{-- ORDEN ENTREGADA --}}
              @endif

              <input type="text" hidden id="estadoActual"
              value="@if ($arrayData->estadoOrden == 1)REPARACION
                    @elseif($arrayData->estadoOrden == 2)LISTA PARA ENTREGAR @elseif($arrayData->estadoOrden == 3)ENTREGADA @endif">
            </div>
          </div>
          <div class="col-md-4">
            <div style="text-align: center">
              <i style="font-size: 20px" class="fas fa-long-arrow-alt-right"></i>
            </div>
          </div>
          <div class="col-md-4">
            <div style="text-align: left">
              @if ($arrayData->estadoOrden == 1)
              <label>N/A</label>
              @elseif($arrayData->estadoOrden == 2)
                  {{-- {{-- ORDEN LISTA PARA ENTREGAR --}}
                  <label >Reparacion</label>
              @elseif($arrayData->estadoOrden == 3)
                  <label >Lista Para Entregar</label>
                  {{-- {{-- ORDEN ENTREGADA --}}
              @endif
              <input type="text" hidden id="estadoNuevo"
              value="@if ($arrayData->estadoOrden == 2) REPARACION
              @elseif($arrayData->estadoOrden == 3)LISTA PARA ENTREGAR @endif">
            </div>
          </div>

        </div>
        <hr>
        <div style="margin-top: -3%" class="text-center">
          <label style="color: gray ; font-size: 11px" for="">Agregar comentario, Indicando el cambio de estado.</label>
        </div>
        <div class="row">
          <div class="col-md-12">
            <textarea  rows="4" id="comentarioCambioOrden" maxlength="500" class="form-control" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>

          </div>

        </div>



        <div class="modal-footer">
          <button type="button" id="guardarCambioOrden" class="btn btn-info btn-fill ">Guardar</button>
        </div>
      </div>
    </div>
  </div>
