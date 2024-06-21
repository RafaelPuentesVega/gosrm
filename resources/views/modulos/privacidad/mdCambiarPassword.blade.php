<!-- Button to trigger the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal">
    Cambiar clave
</button>

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="card "  style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                    <div class="header" style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #06419f">
                        <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>Cambiar Clave</strong></h3>
                    </div>
                </div>
            <div class="modal-body">
                <form id="changePasswordForm">
                    <div id="myElement" data-gc-url="{{ url('/changePassword') }}"></div>
                    @csrf
                    <div class="form-group">

                        <label >Clave Actual</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="current_password" name="current_password" required>

                            <span style="cursor: pointer;" class="input-group-addon" id="togglePasswordOld" >
                                <i class="fa fa-eye-slash "  aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nueva clave</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                            <span style="cursor: pointer;" class="input-group-addon " id="togglePasswordNew" >
                                <i class="fa fa-eye-slash "  aria-hidden="true"></i>
                            </span>
                        </div>
                        <small>Contraseña debe contener al menos 8 caracteres.</small>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirmar nueva clave</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            <span style="cursor: pointer;" class="input-group-addon " id="togglePasswordConfirmation" >
                                <i class="fa fa-eye-slash "  aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="changePasswordBtn">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
