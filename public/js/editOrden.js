var validaAnotacion = null;
var changeAnotacion = null;
$(document).on("click",  "#btncambiarTecnico", function() {
    let idOrden = $("#idOrden").val();
    showpreloader();
    $.ajax({
        url: '../consultarTecnico',
        data: {
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            output = '';
            if (json.state === "ok") {
                control = json.data.length;
                output += '<select class="js-example-basic js-states form-control" id="tecnicoSelect" required>';
                output +='<option  value="">Seleccionar...</option>';
                for (let i = 0; i < control; i++) {
                    id = json.data[i].id;
                    nombre = json.data[i].name;
                    output +='<option  value="'+id+'*'+nombre+'">'+nombre+'</option>';
                }
                output += '</select>';
                $("#Tecnicos").html(output);
                $('#mdlcambiarTecnico').modal('show'); // abrir
                hidepreloader();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrio un error',
                    footer: 'Recargue la pagina'
                })
                hidepreloader();
            }
        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrio un error',
                footer: 'Recargue la pagina'
            })
            hidepreloader();
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
});

$(document).on("click",  "#guardarCambioTecnico", function() {
    if($("#tecnicoSelect").val() == '' || $("#tecnicoSelect").val() == null ){
        toastr["warning"]("<h6>Seleccionar el Tecnico</h6>")
        $("#tecnicoSelect").focus();
        return;
    }
    if($("#comentarioCambioTecnico").val() == '' || $("#comentarioCambioTecnico").val() == null){
        toastr["warning"]("<h6>Diligenciar un comentario </h6>")
        $("#comentarioCambioTecnico").focus();
        return;
    }

    validaAnotacion = 'cambiarEstadoOrden';
    arrayTecnico  = $("#tecnicoSelect").val().split('*');
    idTecnico = arrayTecnico[0];
    tecnicoNuevo = arrayTecnico[1];
    estadoTecnico = 'SE CAMBIA TECNICO DE "'+$("#tecnicoAntes").val()+'" A "'+tecnicoNuevo+'" - ';
    changeAnotacion =estadoTecnico + $("#comentarioCambioTecnico").val();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
      })

      swalWithBootstrapButtons.fire({
        title: 'Seguro Desea Cambiar el Tecnico?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        reverseButtons: false

      }).then((result) => {
        if (result.isConfirmed) {
            actualizarTecnico(idTecnico);
            setTimeout(function(){
                guardarAnotacion();
            }, 1500);
        }else{
            validaAnotacion = null;
        }
    });

});
function actualizarTecnico(id) {
    idtecnicoNuevo = id;
    let idOrden = $("#idOrden").val();
    showpreloader();
    $.ajax({
        url: '../updateTecnico',
        data: {
            idOrden : idOrden,
            idtecnicoNuevo : idtecnicoNuevo
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            output = '';
            if (json.state === "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Se Actualizo Correctamente El Tecnico',
                    showConfirmButton: true,
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrio un error',
                    footer: 'Recargue la pagina'
                })
                hidepreloader();
            }
        },
        error: function (xhr, status) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrio un error',
                footer: 'Recargue la pagina'
            })
            hidepreloader();
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
}

function guardarDiagnostico() {
    btnguardar = document.getElementById('btnDiagnostico');
    btnTerminarOrden = document.getElementById('btnTerminarOrden');
    textArea = document.getElementById('diagnostico');
    let diagnostico = $("#diagnostico").val();
    let idOrden = $("#idOrden").val();
    if (diagnostico.length < 1) {
        toastr["warning"]("<h6>Diligenciar Diagnostico </h6>")
        $("#diagnostico").focus();
        return;
    }
    showpreloader();
    $.ajax({
        url: '../guardarObservacion',
        data: {
            diagnostico: diagnostico,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                textArea.disabled = true;
                btnguardar.style.display = "none";
                $('#fecha_diagnostico').val(json.dataOrden)
                setTimeout(function(){
                    hidepreloader()

                    window.location.reload();
                }, 800);
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function guardarAnotacion() {
    let anotacion = '';
    if(validaAnotacion == 'cambiarEstadoOrden'){
         anotacion = changeAnotacion;
    }else{
         anotacion = $("#anotacion").val();
    }
    validaAnotacion = null;
    let idOrden = $("#idOrden").val();
    if (anotacion.length < 1) {
        toastr["warning"]("<h6>Diligenciar un Comentario </h6>")
        $("#anotacion").focus();
        return;
    }
    showpreloader();

    $.ajax({
        url: '../guardarAnotacion',
        data: {
            anotacion: anotacion,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                Swal.fire({
                    icon: 'success',
                    title: 'Comentario Guardado Correctamente',
                    showConfirmButton: true,
                  }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }else{
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al guardar.',
                        footer: 'Recargue la pagina'
                      })
                }
        },
        error: function (xhr, status) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrio un error al guardar.',
                    footer: 'Recargue la pagina'
                })
            hidepreloader();
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
}
function guardarRepuesto() {
    btnguardar = document.getElementById('btnAgregarRepuesto');
    areaTr   = document.getElementById('repuestoIngresado');
    let repuesto = $("#descripcionRepuesto").val();
    let cantidad = $("#cantidadRepuesto").val();
    let idOrden = $("#idOrden").val();
    if (cantidad.length < 1) {
        toastr["warning"]("<h6>Digitar Cantidad</h6>")
        $("#cantidadRepuesto").focus();
        return;
    }
    if (cantidad  < 1) {
        toastr["warning"]("<h6>Ingresar valor correcto</h6>")
        $("#cantidadRepuesto").focus();
        return;
    }
    if (repuesto.length < 1) {
        toastr["warning"]("<h6>Digitar repuesto</h6>")
        $("#descripcionRepuesto").focus();
        return;
    }
    showpreloader()

    $.ajax({
        url: '../guardarRepuesto',
        data: {
            repuesto: repuesto,
            idOrden : idOrden,
            cantidad : cantidad
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se agrego correctamente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                setTimeout(function(){
                    hidepreloader()
                    window.location.reload();
                }, 1000);
            }
        },
        error: function (xhr, status) {
            hidepreloader()
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');

        },
        complete: function (xhr, status) {
        }
    });

}
function terminarOrden(redirect = true) {
    showpreloader();
    return new Promise((resolve, reject) => {
        let btnguardar = document.getElementById('btnAnotacion');
        let reporteTecnico = $("#reporteTecnico").val();
        let idOrden = $("#idOrden").val();
        let valorservicio = $("#valorservicio").val();
        let valorTotalRepuesto = $('#totalValorRepuestos').val();
        let repuesto = $("#descripcionRepuesto").val();
        let cantidad = $("#cantidadRepuesto").val();

        // Verificar si los elementos existen
        if (typeof repuesto !== 'undefined' && typeof cantidad !== 'undefined') {
            if (repuesto.length >= 1 || cantidad.length >= 1) {
                Swal.fire({
                    icon: 'question',
                    title: '¡Repuesto!',
                    html: '<b><i> Tiene 1 repuesto pendiente de registrar. <br> Primero Guardar el repuesto.</i></b>',
                });
                reject(); // Rechazamos la promesa debido a la advertencia.
                return;
            }
        }

        if (typeof reporteTecnico === 'undefined' || reporteTecnico.length < 1) {
            toastr["warning"]("<h6>Diligenciar Reporte Tecnico </h6>");
            $("#reporteTecnico").focus();
            reject(); // Rechazamos la promesa debido a la advertencia.
            return;
        }
        if (typeof valorservicio === 'undefined' || valorservicio.length < 1) {
            toastr["warning"]("<h6>Diligenciar el Valor del servicio </h6>");
            $("#valorservicio").focus();
            reject(); // Rechazamos la promesa debido a la advertencia.
            return;
        }

        let iva = document.getElementById('checkSinIva').checked ? 'NO' : 'SI';
        valorservicio = parseInt(valorservicio.replace(/,/g, ""));
        hidepreloader();

        $.ajax({
            url: '../termirnarOrden',
            data: {
                reporteTecnico: reporteTecnico,
                idOrden: idOrden,
                valorservicio: valorservicio,
                valorTotalRepuesto: valorTotalRepuesto,
                iva: iva
            },
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                if (json.mensaje === "save") {
                    btnguardar.disabled = true;
                    setTimeout(toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO"), 20000);
                    if (redirect) {
                        window.location.href = '../inicio';
                    }
                }
                resolve(); // Resolvemos la promesa al finalizar el éxito.
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
                reject(); // Rechazamos la promesa en caso de error.
            }
        });
    });
}


$(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })

function sinIiva() {

    checkSinIva = document.getElementById('checkTipoEquipo');

    if (checkSinIva.checked) {
        let valorservicio = $("#valorservicio").val();
        totalValor = $('#totalValorFinal').val();

        totalServicio = valorservicio;
        totalServicio = parseInt(totalServicio);
        totalValor = parseInt(totalValor);
        TotalValorFinal = totalServicio + totalValor;


        $('#valorTotal').val('$'+TotalValorFinal);
        document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(0);
       // document.getElementById('valorTotalOrden').innerHTML = new Intl.NumberFormat('es-MX').format(TotalValorFinal);
    }
    else {
    let valorservicio = $("#valorservicio").val();
    totalValor = $('#totalValorFinal').val();

    iva = valorservicio * 0.19 ;
    totalServicio = valorservicio * 1.19;
    totalServicio = parseInt(totalServicio);
    totalValor = parseInt(totalValor);
    TotalValorFinal = totalServicio + totalValor;


    document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(iva);
    //document.getElementById('valorTotalOrden').innerHTML = new Intl.NumberFormat('es-MX').format(TotalValorFinal);

    }

}

function calcularValores(){

let valorservicio = $("#valorservicio").val();
totalValorRepuestos = $('#totalValorRepuestos').val();
valorservicio = parseInt(valorservicio.replace(/,/g, ""));
if (document.getElementById('checkSinIva').checked) {
    iva = 0 ;
    totalValorRepuestos = parseInt(totalValorRepuestos);
    TotalValorFinal = valorservicio + totalValorRepuestos;
    //$('#valorTotalOrde').val('$'+TotalValorFinal);
    document.getElementById('valorTotalOrde').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(TotalValorFinal));
    document.getElementById('iva').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(iva));
   // alert(totalServicio);
}else{
    iva = valorservicio * 0.19 ;
    totalServicio = valorservicio * 1.19;
    var totalServicio = parseInt(totalServicio);
    totalValorRepuestos = parseInt(totalValorRepuestos);
    TotalValorFinal = totalServicio + totalValorRepuestos;
    //$('#valorTotalOrde').val('$'+TotalValorFinal);
    document.getElementById('valorTotalOrde').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(TotalValorFinal));
    document.getElementById('iva').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(iva));
}
}
function changePrice() {
    let valorservicio = $("#valorservicio").val();
    totalValorRepuestos = $('#totalValorRepuestos').val();

    let idOrden = $("#idOrden").val();
    if (document.getElementById('checkSinIva').checked) {
        iva = 'NO';
    }else{
        iva = 'SI' ;
    }
    if(valorservicio.length < 1){
        toastr["warning"]("<h6>Diligenciar el Valor del servicio</h6>")
        $("#valorservicio").focus();
        return;
    }
    valorservicio = parseInt(valorservicio.replace(/,/g, ""));
    showpreloader()
    $.ajax({
        url: '../changePrice',
        data: {
            valorservicio: valorservicio,
            iva : iva,
            totalValorRepuestos : totalValorRepuestos,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {
                toastr["success"]("<h6>Se actualizo correctamente</h6>");
                hidepreloader();
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

document.getElementById('valorservicio').addEventListener('keydown', inputCharacters);

function inputCharacters(event) {
if (event.keyCode == 13 ){
    calcularValores();
}
$( "#valorservicio" ).blur(function() {
    calcularValores();
});
}

function calcularValoresTecnico(){

 }
// function inputCharactersTecnico(event) {
//     if (event.keyCode == 13 ){
//         calcularValoresTecnico();
//     }
//     $( "#valorservicio" ).blur(function() {
//         calcularValoresTecnico();

//     });

// }
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
    calcularValores();
    });
    //Autocomplete Repuestos
    $('#descripcionRepuesto').on('keyup', function() {
        var repuesto = $('#descripcionRepuesto').val();
        $.ajax({
                type: "POST",
                url: "../repuestoOrdenAjax",
                data: {repuesto : repuesto} ,
                success: function(data) {
                    //Escribimos las sugerencias que nos manda la consulta
                    $('#suggestionsRepuesto').fadeIn(1000).html(data);
                    //Al hacer click en algua de las sugerencias
                    $(document).on('click', function(){
                        $('#suggestionsRepuesto').fadeOut(1000);
                        return true;
                    });
                    $('.suggest-element').on('click', function(){
                            //Obtenemos la id unica de la sugerencia pulsada
                            var id = $(this).attr('id');
                            //Editamos el valor del input con data de la sugerencia pulsada
                            $('#descripcionRepuesto').val(id);
                            //Hacemos desaparecer el resto de sugerencias
                            $('#suggestionsRepuesto').fadeOut(1000);
                            return true;
                    });
                }
        });
    });
    $('#btnPendDiag').on('click', function(){
        Swal.fire({
            icon: 'info',
            title:'Oops...',
            html: '<b><i> Guardar Primero Diagnostico Del Equipo.</i></b> ',
          })
          $('#diagnostico').focus();
    });
    $('#btnPendRep').on('click', function(){
        valor = $(this).data('value');
        if(valor == 1){
            sustantivo = 'Respuesto Pendiente';
        }else{
            sustantivo = 'Respuestos Pendientes';
        }
        var text = '</i>' +valor+ '<i>';
        Swal.fire({
            icon: 'info',
            title:'Oops...',
            html: '<b><i> ¡Tiene '+text+' '+sustantivo+' de Autorizar!. <br> Comunicarse Con El Area Comercial.</i></b>',
          })
    });
    $('#btnTerminarOrden').on('click', function(){
        terminarOrden()
    });
    //Vista agregar repuesto
    $('#agregarRepuesto').on('click', function(){
        $('#divAgregarRepuesto').show();
        $('#TragregarRepuesto').hide();
    });

    $('.btnEliminarRepuesto').on('click', function(){
        id = $(this).data('value');
        Swal.fire({
            title: 'Seguro Desea Eliminar?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar.',
            cancelButtonText: 'Cancelar.'
          }).then((result) => {
            if (result.isConfirmed) {
            eliminarRepuesto(id);

            }
          })

    });

    function eliminarRepuesto(id){
        showpreloader()
        $.ajax({
            url: '../deleteRepuesto',
            data: { id: id},
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                if (json.status === "ok") {
                    hidepreloader();
                    Swal.fire(
                    'Eliminado!',
                    'Se ha eliminado correctamente.',
                    'success'
                    ).then(function () {
                        window.location.reload();
                    })
                }else if(json.status === "error"){
                    let message = json.message;
                    hidepreloader();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        html: 'Ocurrio un error en la eliminacion del repuesto. <br> '+message,
                      }).then(function () {
                        window.location.reload();
                    })
                }
            },
            error: function (xhr, status) {
                hidepreloader();
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Ocurrio un error en la eliminacion del repuesto.',
                  }).then(function () {
                    window.location.reload();
                })
            },
            complete: function (xhr, status) {
                hidepreloader();
            }
        });

    }


