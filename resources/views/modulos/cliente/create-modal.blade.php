<!-- Modal para agregar producto -->
<div class="modal fade" id="modalCrearCliente" tabindex="-1" role="dialog" aria-labelledby="modalCrearClienteLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalCrearClienteLabel">Crear Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCrearCliente">
                    <div class="row" required>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tipoClienteModal">Tipo Cliente</label>
                                <select class="js-example-basic js-states form-control" name="tipoClienteModal" id="tipoClienteModal" required>
                                    <option value=""  selected disabled>--Seleccionar--</option>
                                    <option  value="PERSONA">PERSONA</option>
                                    <option value="EMPRESA">EMPRESA</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="documentoClienteModal">Cedula / Nit</label>
                                <input type="number" id="documentoClienteModal" name="documentoClienteModal" class="form-control" required autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="nombreClienteModal">Nombres</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i style="color: #242424; font-size: 22px; margin: -5px" class="bi bi-person-fill box-info pull-left"></i>
                                    </span>
                                <input type="text" class="form-control" name="nombreClienteModal" id="nombreClienteModal" required autocomplete="off" style="text-transform: uppercase" >
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correoClienteModal" >Correo</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                                    <input type="email" class="form-control" name="correoClienteModal" id="correoClienteModal"  required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccionClienteModal">Direccion</label>
                                <input type="text" class="form-control" name="direccionClienteModal" id="direccionClienteModal" required autocomplete="off" style="text-transform: uppercase" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celularClienteModal">Celular</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i style="font-size: 19px" class="fa-solid fa-mobile-screen-button"></i>
                                    </span>
                                <input type="phone" maxlength="10" class="form-control"  name="celularClienteModal" id="celularClienteModal"  required autocomplete="off" >
                            </div>
                        </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefonoClienteModal">Telefono</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i style="color: #242424; font-size: 17px;" class="bi bi-telephone-fill box-info pull-left"></i>
                                    </span>
                                    <input required type="text" class="form-control" maxlength="10" name="telefonoClienteModal" id="telefonoClienteModal" autocomplete="off">
                                </div>
                            </div>
                        </div>

                    </div>
                        <div class="text-right">
                            <button type="button" id="btn-modal-crear-cliente" class="btn btn-primary text-bold-700">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
