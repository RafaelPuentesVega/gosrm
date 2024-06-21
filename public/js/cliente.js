function editCliente(id) {

    btnSave = document.getElementById('btnsaveReporte');
    let editReporte = $("#editReporte").val();
    let idOrden = $("#idOrden").val();
    if (editReporte.length < 1) {
        toastr["warning"]("<h6>Diligenciar Reporte tecnico </h6>")
        $("#editReporte").focus();
        return;
    }
    $.ajax({
        url: 'http://localhost/plataforma/public/edditarReporteTecnico',
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
