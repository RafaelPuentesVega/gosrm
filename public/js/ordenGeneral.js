var validaAnotacion = null;
var changeAnotacion = null;
function reporteTecnicoEdit() {
    reporteTecnicoDiv = document.getElementById("reporteTecnicoDiv");
    reporteTecnicoInput = document.getElementById("reporteTecnico");
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

$(document).on("click",  "#btnEnviarBodega", function() {
    $('#mldEnviarBodega').modal('show'); // abrir
});
//guaradar enviar a bodega
$(document).on("click",  "#btnEnviarBodegaMdl", function() {
    if($("#enviarBodegaObservacion").val() == '' || $("#enviarBodegaObservacion").val() == null){
        toastr["warning"]("<h6>Diligenciar un comentario </h6>")
        $("#enviarBodegaObservacion").focus();
        return;
    }

    validaAnotacion = 'cambiarEstadoOrden';
    estado = 'SE ENVIA EQUIPO A BODEGA - ';
    changeAnotacion =estado + $("#enviarBodegaObservacion").val();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
      })

      swalWithBootstrapButtons.fire({
        title: 'Seguro Desea enviar equipo a bodega?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        reverseButtons: false

      }).then((result) => {
        if (result.isConfirmed) {
            enviarBodega();
            setTimeout(function(){
                guardarAnotacion();
            }, 1500);
        }else{
            validaAnotacion = null;
        }
    });
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
function alertPendRepuesto(){
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hay repuestos pendientes de autorizar'
    })
}

async function terminaryEntregarOrden() {
    try {
        await terminarOrden(false);
        entregarOrden();
    } catch (error) {
        hidepreloader();
        console.error("Error al terminar la orden:", error);
    }
}

function enviarBodega(){
    showpreloader();
    let idOrden = $("#idOrden").val();
    $.ajax({
        url: '../enviarBodega',
        data: {
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.state == "save") {
                $('#mldEnviarBodega').modal('hide');
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
            hidepreloader();
        }
    });
}
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
    let editReporte = $("#reporteTecnico").val();
    let idOrden = $("#idOrden").val();
    if (editReporte.length < 1) {
        toastr["warning"]("<h6>Diligenciar Reporte tecnico </h6>")
        $("#reporteTecnico").focus();
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
    ValorServicioInput = document.getElementById("valorservicio");
    btnEdit = document.getElementById("btneditvalorServicio");
    btnSave = document.getElementById("btnsavevalorServicio");
    btnTerminarOrden = document.getElementById("btnTerminarOrden");
    checkSinIva = document.getElementById("checkSinIva");


    ValorServicioInput.style.display = 'block';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'block';
    btnTerminarOrden.style.display = 'none';
    checkSinIva.disabled = false;
}
