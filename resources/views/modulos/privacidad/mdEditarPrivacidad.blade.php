<div  data-backdrop="static" class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" data-target="#staticBackdrop">
      <div class="modal-content">
        <div class="card "  style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
            <div class="header" style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #06419f">
                <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>EDITAR USUARIO</strong></h3>
            </div>
        </div>
        <form  method="POST" action="{{ route('updateuser') }}">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <input hidden autocomplete="none-email" id="mdid" name="mdid">
                    <div class="col-md-12">
                        <label for="name"
                            class="">{{ __('NOMBRE COMPLETO') }}</label>

                                <input id="mdname" @if(auth()->user()->rol != "ADMINISTRATIVO") disabled @endif type="text"
                                    class="form-control"
                                    name="mdname"  required
                                    autocomplete="off"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email"
                            class="">{{ __('CORREO ELECTRONICO') }}</label>
                        <input autocomplete="none-email" id="mdemail" type="email"
                            class="form-control"
                            name="mdemail"  required
                            autocomplete="off"
                            onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toLowerCase()">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="">{{ __('CELULAR') }}</label>
                        <input id="mdcelular" type="number" minlength="5"
                            class="form-control" name="mdcelular"
                            required autocomplete="off"
                            >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="">{{ __('ESTADO') }}</label>
                        <select class="js-example-basic js-states form-control"
                            name="mdstate" id="mdstate"
                            required>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="">{{ __('CARGO') }}</label>
                        <select class="js-example-basic js-states form-control"
                            name="mdrol" id="mdrol"
                            required>
                            <option value="TECNICO">TECNICO</option>
                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Cerrar</button>
            @if(auth()->user()->rol == "ADMINISTRATIVO")
            <button type="submit" class="btn btn-fill btn-info" id="update-user">Actualizar</button>
            @endif
            </div>
        </form>
      </div>
    </div>
  </div>
