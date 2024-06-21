var idRepuesto = '';

function editarRepuesto(id) {

    $.ajax({
        url: 'editarRepuesto',
        data: {
            id: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {
                //Datos Equipo
                $("#equipoRepuesto").html(json.dataRepuesto[0].equipo_tipo);
                $("#equipoMarca").html(json.dataRepuesto[0].equipo_marca);
                $("#equipoReferencia").html(json.dataRepuesto[0].equipo_referencia);
                $("#equipoSerial").html(json.dataRepuesto[0].equipo_serial);
                //Datos Cliente
                $("#clienteTipo").html(json.dataRepuesto[0].cliente_tipo);
                $("#clienteDocumento").html(json.dataRepuesto[0].cliente_documento);
                $("#clienteNombre").html(json.dataRepuesto[0].cliente_nombres);
                //Datos Repuesto
                $('#nombreRepuesto').val(json.dataRepuesto[0].nombre_repuesto);
                $('#cantidadRepuesto').val(json.dataRepuesto[0].cantidad_repuesto);
                idRepuesto = json.dataRepuesto[0].id_repuesto;
                //ABRE MODAL
                showModal();
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function autorizarRepuesto() {

    cantidadRepuesto = $('#cantidadRepuesto').val();
    let precioUnitario = $("#precioUnitario").val();
    if(cantidadRepuesto.length  < 1) {
        toastr["warning"]("<h6>Digitar Cantidad</h6>")
        $("#cantidadRepuesto").focus();
        return;
    }
    if(precioUnitario.length  < 1) {
            toastr["warning"]("<h6>Digitar precio</h6>")
            $("#precioUnitario").focus();
            return;
    }
    if(precioUnitario  < 1) {
        toastr["warning"]("<h6>Digitar precio correcto</h6>")
        $("#precioUnitario").focus();
        return;
        }
    precioUnitario = parseInt(precioUnitario.replace(/,/g, ""));
    showpreloader();

    $.ajax({
        url: 'autorizarRepuesto',
        data: {
            precioUnitario:precioUnitario,
            idRepuesto:idRepuesto,
            cantidadRepuesto : cantidadRepuesto
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {

                toastr["success"]("<h6>Se guardo correctamente</h6>")
                CloseModal()
                setTimeout(function(){
                    hidepreloader()
                    window.location.reload();
                }, 1000);
            }

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function showModal() {
    $('#md-autorizarRepuesto').modal('show'); // abrir
}
   function CloseModal() {
    $('#md-autorizarRepuesto').modal('hide'); // abrir

}

document.getElementById('precioUnitario').addEventListener('keydown', inputCharacters);
function calcularPrecioRepuesto(){
    let valorRepuesto = $("#precioUnitario").val();
    valorRepuesto = parseInt(valorRepuesto.replace(/,/g, ""));
    cantidadRepuesto = $('#cantidadRepuesto').val();
    totalRepuesto = cantidadRepuesto * valorRepuesto;
    $('#precioTotalInput').val(totalRepuesto);
    document.getElementById('precioTotal').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(totalRepuesto));

}
function inputCharacters(event) {

if (event.keyCode == 13) {
    calcularPrecioRepuesto()

}
$( "#precioUnitario" ).blur(function() {
    calcularPrecioRepuesto()
});

}
$(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })
  $('input.number').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
    }

    $(this).val(function(index, value) {
    return value
        .replace(/\D/g, "")
        .replace(/([0-9])([0-9]{0})$/, '$1$2')
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")    ;
    });
    calcularPrecioRepuesto()

    });
