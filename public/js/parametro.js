$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).on("click", "#servicio", function() {
    window.location.href = 'parametro/servicios';
});
$(document).on("click", "#ordenServicio", function() {
    showpreloader();
    $.ajax({
        url: 'vencimientOrdenBuscar',
        type: 'POST',
        dataType: 'json',
        success: function (json) {
                //Datos
                output = "";
                control = json.data.length;
                if(json.message == 'ok'){
                    output += '<table  id="tableNotificaciones" class="table table-striped"  >'
                    output += '<thead  class="thead-light">'
                    output += '<tr >'
                    output += '<th scope="col" class="text-center" style="height: 5px; color:#16172C"><strong>#</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>Descripcion</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>Actualizado</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>Dias (*Habiles)</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong></strong></th>'
                    output += '</tr>'
                    output += '</thead>'
                    output += '<tbody>'
                    for (let i = 0; i < control; i++) {
                        id = json.data[i].id;
                        nombre = json.data[i].nombre;
                        dias = json.data[i].valor;
                        observacion =json.data[i].descripcion;
                        actualizado =json.data[i].updated_at;
                        fecha = new Date(actualizado)
                        updated_at = fecha.toLocaleDateString()

                        item = i +1;
                        output += '<tr data-toggle="tooltip"  title="' + observacion + '">'
                        output += '<td width="10%"  class="text-center">' + item  + '</td>'
                        output += '<td width="65%" class="text-center">' + nombre + '</td>'
                        output += '<td width="65%" class="text-center">' + updated_at + '</td>'
                        output += '<td width="15%" class="text-center"><input class="form-control" type="number"  id="diasVencimientoID'+ id +'" value="'+ dias +'"> </td>'
                        output += '<td width="10%" class="text-center"><button title="Actualizar" data-toggle="tooltip" onclick="actualizarDiasVencimiento('+ id +')" class="btn style" style="text-decoration: none;border: none"><i style="color: #059ebd;font-size:18px" class="fas fa-edit"></i></button> </td>'
                        output += '</tr>'
                    }
                    output += '</tbody>'
                    output += '<table>'
                    $("#tableVencimiento").html(output);
                    //ABRE MODAL
                    $('#vencimientomdl').modal('show');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al consultar al servidor',
                        footer: 'Recargue la pagina'
                      })
                }

        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Disculpe, existió un problema en el servidor',
                footer: 'Recargue la pagina'
              })
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
});
$(document).on("click", "#notificaciones", function() {
    showpreloader();
    $.ajax({
        url: 'notificacionesEmail',
        type: 'POST',
        dataType: 'json',
        success: function (json) {
                //Datos
                output = "";
                control = json.data.length;
                if(json.message == 'ok'){
                    output += '<table  id="tableNotificaciones" class="table table-striped"  >'
                    output += '<thead  class="thead-light">'
                    output += '<tr >'
                    output += '<th scope="col" class="text-center" style="height: 5px; color:#16172C"><strong>#</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>NOTIFICACION</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>DIAS (*Habiles)</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong></strong></th>'
                    output += '</tr>'
                    output += '</thead>'
                    output += '<tbody>'
                    for (let i = 0; i < control; i++) {
                        id = json.data[i].id;
                        notificacion = json.data[i].descripcion;
                        dias = json.data[i].dias;
                        observacion =json.data[i].observacion;
                        item = i +1;
                        output += '<tr data-toggle="tooltip"  title="' + observacion + '">'
                        output += '<td width="10%"  class="text-center">' + item  + '</td>'
                        output += '<td width="65%" class="text-center">' + notificacion + '</td>'
                        output += '<td width="15%" class="text-center"><input class="form-control" type="number"  id="diasNotificacionID'+ id +'" value="'+ dias +'"> </td>'
                        output += '<td width="10%" class="text-center"><button title="Actualizar" data-toggle="tooltip" onclick="actualizarNotificacion('+ id +')" class="btn style" style="text-decoration: none;border: none"><i style="color: #059ebd;font-size:18px" class="fas fa-edit"></i></button> </td>'
                        output += '</tr>'
                    }
                    output += '</tbody>'
                    output += '<table>'
                    $("#tableNotificacion").html(output);
                    //ABRE MODAL
                    $('#notificacionesmdl').modal('show');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al consultar al servidor',
                        footer: 'Recargue la pagina'
                      })
                }

        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Disculpe, existió un problema en el servidor',
                footer: 'Recargue la pagina'
              })
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
});

function actualizarNotificacion(id){
    dias = $("#diasNotificacionID"+id).val();
    if(dias < 1 || dias > 30){
        toastr["warning"]("<h5>Ingresar Dia entre rango 1 y 30</h5>")
        $("#diasNotificacionID"+id).focus();
        return true;
    }
    showpreloader();
    $.ajax({
        url: 'updateNotificacion',
        type: 'POST',
        dataType: 'json',
        data : {id:id ,dias:dias },
        success: function (json) {
            if(json.message == 'ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Actualizado Correctamente',
                    showConfirmButton: true,
                  }).then((result) => {
                    if (result.isConfirmed) {
                        $('#notificacionesmdl').modal('hide');
                    }
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Disculpe, existió un problema en el servidor',
                    footer: 'Recargue la pagina'
                  })
            }
        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Disculpe, existió un problema en el servidor',
                footer: 'Recargue la pagina'
              })
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
}

function actualizarDiasVencimiento(id){
    dias = $("#diasVencimientoID"+id).val();
    if(dias < 1 || dias > 30){
        toastr["warning"]("<h5>Ingresar Dia entre rango 1 y 30</h5>")
        $("#diasVencimientoID"+id).focus();
        return true;
    }
    showpreloader();
    $.ajax({
        url: 'updateDiasVencimiento',
        type: 'POST',
        dataType: 'json',
        data : {id:id ,dias:dias },
        success: function (json) {
            if(json.message == 'ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Actualizado Correctamente',
                    showConfirmButton: true,
                  }).then((result) => {
                    if (result.isConfirmed) {
                        $('#vencimientomdl').modal('hide');
                    }
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Disculpe, existió un problema en el servidor',
                    footer: 'Recargue la pagina'
                  })
            }
        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Disculpe, existió un problema en el servidor',
                footer: 'Recargue la pagina'
              })
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
}
