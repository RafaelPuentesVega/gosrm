var validaAnotacion = null;
var changeAnotacion = null;
function reporteTecnicoEdit() {
    reporteTecnicoDiv = document.getElementById("reporteTecnicoDiv");
    reporteTecnicoInput = document.getElementById("editReporte");
    btnEdit = document.getElementById("btneditarReporte");
    btnSave = document.getElementById("btnsaveReporte");

    reporteTecnicoDiv.style.display = 'none';
    reporteTecnicoInput.style.display = 'block';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'block';

}

$(document).on("click",  "#btncambiarEstado", function() {

    $('#mdlcambiarEstado').modal('show'); // abrir

});

$(document).on("click",  "#guardarCambioOrden", function() {
    if($("#comentarioCambioOrden").val() == '' || $("#comentarioCambioOrden").val() == null){
        toastr["warning"]("<h6>Diligenciar un comentario </h6>")
        $("#comentarioCambioOrden").focus();
        return;
    }

    validaAnotacion = 'cambiarEstadoOrden';
    estado = 'SE CAMBIA ESTADO DE "'+$("#estadoActual").val()+'" a "'+$("#estadoNuevo").val()+'" - ';
    changeAnotacion =estado + $("#comentarioCambioOrden").val();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
      })

      swalWithBootstrapButtons.fire({
        title: 'Seguro Desea Cambiar Estado De La Orden?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        reverseButtons: false

      }).then((result) => {
        if (result.isConfirmed) {
            cambiarEstadoOrden();
            setTimeout(function(){
                guardarAnotacion();
            }, 1500);
        }else{
            validaAnotacion = null;
        }
    });




});
function cambiarEstadoOrden(){
    let idOrden = $("#idOrden").val();
    $.ajax({
        url: '../cambiarEstadoOrden',
        data: {
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.state == "save") {
                $('#mdlcambiarEstado').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Se Cambio Correctamente El Estado',
                    showConfirmButton: true,
                  })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: json.message,
                        footer: 'Recargue la pagina'
                    })
                }
        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrio un error',
                footer: 'Recargue la pagina'
            })
        },
        complete: function (xhr, status) {
        }
    });

}
function reporteTecnicoSave() {
    btnSave = document.getElementById('btnsaveReporte');
    let editReporte = $("#editReporte").val();
    let idOrden = $("#idOrden").val();
    if (editReporte.length < 1) {
        toastr["warning"]("<h6>Diligenciar Reporte tecnico </h6>")
        $("#editReporte").focus();
        return;
    }
    $.ajax({
        url: '../editarReporteTecnico',
        data: {
            editReporte: editReporte,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {
                toastr["success"]("<h6>Se actualizo correctamente</h6>", "ACTUALIZADO")
              //  btnSave.disabled = true;
                window.location.reload();
                }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });
}
function valorServicioEdit() {
    ValorServicioDiv = document.getElementById("labelValorServicio");
    ValorServicioInput = document.getElementById("valorservicio");
    btnEdit = document.getElementById("btneditvalorServicio");
    btnSave = document.getElementById("btnsavevalorServicio");
    btnTerminarOrden = document.getElementById("btnTerminarOrden");
    checkSinIva = document.getElementById("checkSinIva");


    ValorServicioDiv.style.display = 'none';
    ValorServicioInput.style.display = 'block';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'block';
    btnTerminarOrden.style.display = 'none';
    checkSinIva.disabled = false;
}
