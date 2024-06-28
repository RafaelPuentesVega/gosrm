$(document).ready(function() {

    $('#btnAbrirProducto').on('click', function() {
        limpiarCampos()
        $('#modalAgregarProducto').modal('show');
    });

    $('#btn-crear-producto').on('click', function() {
        guardarProducto();
    });

    // Añadir la clase required-label a los labels de campos requeridos
    $('form :input[required]').each(function() {
        var label = $('label[for="' + $(this).attr('id') + '"]');
        label.addClass('required-label');
    });
    
});

function cerrarModalAddProduct(){
    $('#modalAgregarProducto').modal('hide');
}
// Función para limpiar los campos del formulario
function limpiarCampos() {
    $('#formAgregarProducto')[0].reset();
}



function guardarProducto(){

    event.preventDefault();

    var formulario = $('#formAgregarProducto');

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
    var formData = $('#formAgregarProducto').serialize();

    showpreloader();
    var rutaActual = window.location.href;

    $.ajax({
        type: "POST",
        url: "agregarproducto",
        data: formData ,
        success: function(data) { 
            hidepreloader();

            if(data.success){
                cerrarModalAddProduct();
                //actualizar la tabla
                if (rutaActual.includes('productos')) {
                    loadTableProducto();
                }
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
        }
    });
}