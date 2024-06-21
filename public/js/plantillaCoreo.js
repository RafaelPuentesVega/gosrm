$(document).on("click",  "#btnVer", function() {
    consultarPlantilla();
})
const selectPlantilla = document.querySelector('#selectPlantilla');

selectPlantilla.addEventListener('change', (event) => {
    $('#btnVer').prop('disabled', false);
    consultarPlantillaDescripcion();
});
function  consultarPlantillaDescripcion() {
    showpreloader();
    $.ajax({
        url: "consultarCaractPlantilla",
        method: 'POST',
        data: {
            id: $('#selectPlantilla').val(),
        },
        dataType: 'json',
        success: function(json) {
            hidepreloader();
            if(json.state == 1){
                $('#caracteristicaPlantillas').show();
                $('#notificacionNomb').html(json.data.notificacion);
                $('#frecEnvio').html(json.data.dias);
                $('#dirigido').html(json.data.dirigido);
                $('#descripcion').html(json.data.descripcion);

            }else{
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ocurrio un error',
            footer: 'Recargue la pagina'
        })
            }

        }
    });
}

function  consultarPlantilla() {
    showpreloader();
    $.ajax({
        url: "consultarPlantillaCorreo",
        method: 'POST',
        data: {
            id: $('#selectPlantilla').val(),
        },
        success: function(result) {
            $('#div_id').html(result);
            $('#mdlPlantilla').modal('show');
            hidepreloader();
        }
    });
}
