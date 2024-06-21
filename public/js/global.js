function cerrarModalClave() {
    $('#changePasswordModal').modal('hide');
}
function ordenblanco(event) {
        window.open ('imprimir_orden_blanco/'+event,"Orden de "+event ,"toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );
}




$(document).ready(function() {


    // Capturar el evento click del icono del ojo para el campo de clave anterior
    $('#togglePasswordOld').click(function() {
        var passwordInput = $('#current_password');
        var passwordFieldType = passwordInput.attr('type');

        // Cambiar el tipo de campo de la clave entre "password" y "text"
        passwordInput.attr('type', passwordFieldType === 'password' ? 'text' : 'password');

        // Cambiar el icono del ojo en consecuencia
        $(this).find('i').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    });

    // Capturar el evento click del icono del ojo para el campo de nueva clave
    $('#togglePasswordNew').click(function() {
        var newPasswordInput = $('#new_password');
        var newPasswordFieldType = newPasswordInput.attr('type');

        // Cambiar el tipo de campo de la nueva clave entre "password" y "text"
        newPasswordInput.attr('type', newPasswordFieldType === 'password' ? 'text' : 'password');

        // Cambiar el icono del ojo en consecuencia
        $(this).find('i').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    });

    // Capturar el evento click del icono del ojo para el campo de confirmación de nueva clave
    $('#togglePasswordConfirmation').click(function() {
        var newPasswordConfirmationInput = $('#new_password_confirmation');
        var newPasswordConfirmationFieldType = newPasswordConfirmationInput.attr('type');

        // Cambiar el tipo de campo de la confirmación de nueva clave entre "password" y "text"
        newPasswordConfirmationInput.attr('type', newPasswordConfirmationFieldType === 'password' ? 'text' : 'password');

        // Cambiar el icono del ojo en consecuencia
        $(this).find('i').toggleClass('fa-eye-slash').toggleClass('fa-eye');
    });
});

$('#changePasswordBtn').click(function() {

    var form = $('#changePasswordForm');
    var formData = form.serialize();

    var requiredFields = $("#changePasswordForm [required]");
    var isValid = true;
    requiredFields.each(function() {
        if ($(this).val().trim() === "") {
          $(this).addClass("is-invalid");
          isValid = false;
        } else {
          $(this).removeClass("is-invalid");
        }
    });

    // Detener el evento si algún campo requerido está vacío
    if (!isValid) {
        return false;
    }
    if($("#new_password").val().length < 8){
        Swal.fire({
            icon: 'warning',
            title: 'Validacion',
            text: 'La nueva contraseña debe contener 8 caractares minimo.'
          }).then((result) => {
            if (result.isConfirmed) {
                $("#new_password").focus();
            }
        })
        return false;
    }

    if($("#new_password").val() !== $("#new_password_confirmation").val()){
        Swal.fire({
            icon: 'warning',
            title: 'Validacion',
            text: 'Las contraseñas no coinciden.'
          })
        return false;
    }


    $.ajax({
        url: $('#myElement').data('gc-url'),
        data: formData,
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.status === "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Guardado',
                    text: json.message,
                  }).then((result) => {
                    if (result.isConfirmed) {
                        cerrarModalClave();
                    }
                })
                $("#changePasswordForm :input").val("");
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json.message,
                  })
            }
        },

        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrio un error con el servidor',
                footer: 'Recargue la pagina'
              })
        },
        complete: function (xhr, status) {
        }
    });
});

