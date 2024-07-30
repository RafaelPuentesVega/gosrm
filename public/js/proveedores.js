$(document).ready(function() {
    $('#btn-crear-proveedor').on('click', function() {
        guardarProveedor();
    });
});

function guardarProveedor(){

    var formulario = $('#formAgregarProveedor');

    if (!validarCamposObligatorios(formulario)) {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, complete todos los campos obligatorios.',
            timer: 1200,
            showConfirmButton: false
          })
        // alert('Por favor, complete todos los campos obligatorios.');
        return;
    }
    var formData = $('#formAgregarProveedor').serialize();

    showpreloader();
    var rutaActual = window.location.href;

    $.ajax({
        type: "POST",
        url: "agregarProveedor",
        data: formData ,
        success: function(data) { 
            hidepreloader();

            if(data.success){
                $('#modalAgregarProveedor').modal('hide');
            }

            let iconf = data.success ? 'success' : 'error';
            Swal.fire({
                icon: iconf,
                html: '<b><i>' + data.message + '</i></b> ',
                timer: 2500,
                showConfirmButton: false
            });
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
}
