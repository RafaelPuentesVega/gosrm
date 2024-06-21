var cliente_id = '';
var usuario_empresa = '' ;

function cerrarModal() {
    $('#md-agregarusuario').modal('hide');
}


function guardarCliente() {

    emailval = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;
    btnguardar = document.getElementById('btnGuardarCliente');
    let cliente_tipo = $("#tipocliente").val();
    let cliente_documento = $("#cliente_documento").val();
    let cliente_nombres = $("#cliente_nombres").val();
    let cliente_correo = $("#cliente_correo").val();
    let cliente_direccion = $("#cliente_direccion").val();
    let cliente_celular = $("#cliente_celular").val();
    let cliente_telefono = $("#cliente_telefono").val();
    let departamento_id = $("#departamentoSelect").val();
    let municipio_id = $("#municipioSelect").val();


    if (cliente_tipo.length == 0) {
        toastr["warning"]("<h6>Diligenciar Tipo de cliente prueba</h6>")
        return;
    }
    if (cliente_documento.length < 1) {
        toastr["warning"]("<h6>Diligenciar N° de Documento </h6>")
        return;
    }
    if (cliente_nombres.length < 1) {
        toastr["warning"]("<h6>Diligenciar Nombre del cliente </h6>")
        return;
    }
    if(cliente_correo.length < 1){
         toastr["warning"]("<h6>Diligenciar Correo del cliente </h6>")
        return;
    }
    if(!emailval.exec(cliente_correo)){
        toastr["error"]("<h6>Correo no valido</h6>")
       return;
    }
    if(cliente_direccion.length < 1 ){
         toastr["warning"]("<h6>Diligenciar Direccion </h6>")
        return;
    }
    if(cliente_celular.length < 1){
        toastr["warning"]("<h6>Diligenciar Celular </h6>")
        return;
    }
    if(cliente_celular.length < 10 ){
        toastr["error"]("<h6>El numero de Celular Debe contener 10 digitos </h6>")
        return;
    }
    if(cliente_telefono.length < 1){
        toastr["warning"]("<h6>Diligenciar Telefono </h6>")
        return;
    }
    $.ajax({
        url: "guardarCliente",
         data: {
            cliente_id: cliente_id,
            equipo_id: equipo_id,
            cliente_tipo: cliente_tipo,
            cliente_documento: cliente_documento,
            cliente_nombres: cliente_nombres,
            cliente_correo: cliente_correo,
            cliente_direccion: cliente_direccion,
            cliente_celular: cliente_celular,
            cliente_telefono: cliente_telefono,
            departamento_id: departamento_id,
            municipio_id: municipio_id,
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se guardo correctamente el Cliente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                cliente_id = json.dataCliente.id;
            }
            if (json.mensaje === "update") {
                toastr["info"]("<h6>Se actualizo correctamente el Cliente</h6>", "ACTUALIZACION")
                btnguardar.disabled = true;
            }
            if (json.mensaje === "clienteCreado") {
                toastr["error"]("<h6>"+json.dataCliente[0].cliente_nombres+"</h6>" , "CLIENTE YA CREADO")
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}

function guardarUsuarioEmpresa() {

    btnguardar = document.getElementById('btnGuardarEmpresa');
    let cliente_dependencia_empresa = $("#cliente_dependencia_empresa").val();
    let cliente_usuario_empresa = $("#cliente_usuario_empresa").val();
    let cliente_celular_usuario = $("#cliente_celular_usuario").val();
        if(cliente_id.length == 0){
            toastr["warning"]("<h6>Seleccionar o Guardar un cliente</h6>")
            return;
        }
        if(cliente_dependencia_empresa.length < 1){
            toastr["warning"]("<h6>Diligenciar Dependencia</h6>")
            return;
        }
        if(cliente_usuario_empresa.length < 1){
            toastr["warning"]("<h6>Diligenciar Nombre de persona encargada</h6>")
            return;
        }
        if(cliente_celular_usuario.length < 1 ){
            toastr["warning"]("<h6>Diligenciar Celular de la persona encargada </h6>")
            return;
        }
        if(cliente_celular_usuario.length < 10 ){
            toastr["warning"]("<h6>El numero de Celular Debe contener 10 digitos </h6>")
            return;
        }
    $.ajax({
        url: 'guardarUsuarioEmpresa',
        data: {
            cliente_id: cliente_id,
            usuario_empresa : usuario_empresa,
            cliente_dependencia_empresa: cliente_dependencia_empresa,
            cliente_celular_usuario: cliente_celular_usuario,
            cliente_usuario_empresa: cliente_usuario_empresa,
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se guardo correctamente el usuario</h6>", "GUARDADO")
                btnguardar.disabled = true;
                usuario_empresa = json.dataUsuario.id;
                consultarUsuarioEmpresa()
            }
            if (json.mensaje === "update") {
                toastr["info"]("<h6>Se actualizo correctamente el usuario</h6>", "ACTUALIZACION")
                btnguardar.disabled = true;
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function consultarCliente(id) {
    let municipio = $("#municipioSelect").val();
    let departamento = $("#departamentoSelect").val();
    $.ajax({
        url: 'consultarCliente',
        data: { id: id },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            var output = "";
            if (departamento.length < 1) {
                $('#departamentoSelect').val(json.data[0].departamento_id);
                consultarMunicipio();
            }
            if (json.mensaje === "ok") {
                if (json.data.length > 0) {
                    var textarea = document.getElementById("empresas");
                    $('#md-agregarusuario').modal('hide');
                    $('#tipocliente').val(json.data[0].cliente_tipo)
                    $('#cliente_documento').val(json.data[0].cliente_documento)
                    $('#cliente_nombres').val(json.data[0].cliente_nombres)
                    $('#cliente_correo').val(json.data[0].cliente_correo)
                    $('#cliente_direccion').val(json.data[0].cliente_direccion)
                    $('#cliente_celular').val(json.data[0].cliente_celular)
                    $('#cliente_telefono').val(json.data[0].cliente_telefono)
                    $('#municipioSelect').val(json.data[0].municipio_id)
                    cliente_id = json.data[0].cliente_id;
                    if (json.data[0].cliente_tipo === "Empresa" || json.data[0].cliente_tipo === "EMPRESA") {
                        $('#cliente_dependencia_empresa').val(json.data[0].cliente_dependencia_empresa)
                        $('#cliente_usuario_empresa').val(json.data[0].cliente_usuario_empresa)
                        $('#cliente_celular_usuario').val(json.data[0].cliente_usuario_celular)
                        textarea.style.display = "block";
                    }
                    else {
                        textarea.style.display = "none";
                        $('#cliente_dependencia_empresa').val('')
                        $('#cliente_usuario_empresa').val('')
                        $('#cliente_celular_usuario').val('')
                    }
                    output += '<button title="ACTUALIZAR" style="border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-primary btn-fill  btn-round pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >';
                    output += '<i style="color: #ffffff; font-size: 17px" class="bi bi-upload box-info pull-left"></i>';
                    output += '<span style="margin-left: 5px">Actualizar Cliente</span>'
                    $("#btn-update").html(output);
                }
            };
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
            if (municipio == "") {
                return (consultarCliente(id));
            }else{
                consultarUsuarioEmpresa()
            }
        }
    });
}

function SeleccionarUsaurioEmpresa(id) {

    $.ajax({
        url: 'sadsad',
        data: { id: id },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            var output = "";
            if (json.mensaje === "ok") {
                if (json.data.length > 0) {
                    usuario_empresa = json.data[0].id_cliente_empresa;
                        $('#cliente_dependencia_empresa').val(json.data[0].usuario_dependencia)
                        $('#cliente_usuario_empresa').val(json.data[0].usuario_nombre)
                        $('#cliente_celular_usuario').val(json.data[0].usuario_celular)
                    output += '<button title="ACTUALIZAR" style="border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-primary btn-fill  btn-round pull-right " id="btnGuardarEmpresa" onclick="guardarUsuarioEmpresa()" >';
                    output += '<i style="color: #ffffff; font-size: 17px" class="bi bi-upload box-info pull-left"></i>';
                    $("#btn-save").html(output);
                }
            };
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
        }
    });
}

function consultarUsuarioEmpresa() {
    $.ajax({
        url: 'consultarUsuarioEmpresa',
        data: {
            id: cliente_id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {
                control = json.data.length;
                var output = "";
                if (control != 0) {
                    output += '<table  id="usuarioEmpresa" class="table table-striped" border bordercolor="#CDCDD8" >'
                    output += '<thead style="background:#E9F7EF " class="thead-light">'
                    output += '<tr >'
                    output += '<th scope="col" class="text-center" style="height: 5px; color:#16172C"><strong>DEPENDENCIA</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>USUARIO</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>CELULAR</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C; width: 2%"><strong></strong></th>'
                    output += '</tr>'
                    output += '</thead>'
                    output += '<tbody>'
                    for (let i = 0; i < control; i++) {
                        dependencia = json.data[i].usuario_dependencia;
                        usuario = json.data[i].usuario_nombre;
                        celular = json.data[i].usuario_celular;
                        idUsuario = json.data[i].id_cliente_empresa;
                        output += '<tr>'
                        output += '<td class="text-center">' + dependencia + '</td>'
                        output += '<td class="text-center">' + usuario + '</td>'
                        output += '<td class="text-center">' + celular + '</td>'
                        output += '<td> <button  onclick="SeleccionarUsaurioEmpresa(' +idUsuario+ ')" style=" border: none; outline:none; text-decoration: none" title="SELECCIONAR" class="btn btn-round btn-xs"> <i style="color: #2E86C1; font-size: 13px" class="bi bi-arrow-down-circle-fill pull-left"> </i> </button> </td>'
                        output += '</tr>'
                    }
                    output += '</tbody>'
                    output += '<table>'
                    $("#ClienteEmpresa").html(output);
                } else {
                    $("#ClienteEmpresa").html(output);
                }
            }
            $('#usuarioEmpresa').DataTable({
                responsive: true,
                autoWidth: false,
                lengthMenu: [[3, 5, 10], [3, 5, 10]],
                "language": idioma_espanol
            });
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}

function consultarMunicipio() {
    let id = $("#departamentoSelect").val();
    if (id.length < 1) {
        return;
    }
    $.ajax({
        url: 'consultarMunicipio',
        data: { id: id },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            control = json.data.length;
            var output = "";
            output += ' <select class="js-example-basic-multiple js-states form-control"  name="municipio_id" id="municipioSelect" autocomplete="off"> '
            if(id == 13){
                output += '<option value= "616" >NEIVA</option>';
            }else{
                output += '<option value= "" >SELECCIONAR..</option>';
            }
            for (let i = 0; i < control; i++) {
                ide = json.data[i].municipio_id;
                nombre = json.data[i].municipio_nombre;
                output += '<option value=' + ide + '>' + nombre + "</option>";
            }
            output += '</select>'
            $("#response-container").html(output);

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
        }
    });
}

function consultarClienteEnter() {
    let municipio = $("#municipioSelect").val();
    let departamento = $("#departamentoSelect").val();
    let id = $("#cliente_documento").val();
    if(id.length < 1){
        toastr["warning"]("<h6>Diligenciar N° de Documento</h6>")
        return;
    }
    $.ajax({
        url: 'consultarClienteEnter',
        data: { id: id },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            var output = "";
            var textarea = document.getElementById("empresas");
            if (json.mensaje === "ok") {
                if (json.data.length > 0) {
                output += '<button title="ACTUALIZAR" style="border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-primary btn-fill  btn-round pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >';
                output += '<i style="color: #ffffff; font-size: 17px" class="bi bi-upload box-info pull-left"></i>';
                output += '<span style="margin-left: 5px">Actualizar Cliente</span>'

                $("#btn-update").html(output);
                    $('#tipocliente').val(json.data[0].cliente_tipo)
                    $('#cliente_nombres').val(json.data[0].cliente_nombres)
                    $('#cliente_correo').val(json.data[0].cliente_correo)
                    $('#cliente_direccion').val(json.data[0].cliente_direccion)
                    $('#cliente_celular').val(json.data[0].cliente_celular)
                    $('#cliente_telefono').val(json.data[0].cliente_telefono)
                    $('#municipioSelect').val(json.data[0].municipio_id)
                    cliente_id = json.data[0].cliente_id;
                    if (json.data[0].cliente_tipo === "Empresa" || json.data[0].cliente_tipo === "EMPRESA") {
                        $('#cliente_dependencia_empresa').val(json.data[0].cliente_dependencia_empresa)
                        $('#cliente_usuario_empresa').val(json.data[0].cliente_usuario_empresa)
                        $('#cliente_celular_usuario').val(json.data[0].cliente_usuario_celular)
                        textarea.style.display = "block";
                    }
                    else {
                        textarea.style.display = "none";
                        $('#cliente_dependencia_empresa').val(json.data[0].cliente_dependencia_empresa)
                        $('#cliente_usuario_empresa').val(json.data[0].cliente_usuario_empresa)
                        $('#cliente_celular_usuario').val(json.data[0].cliente_celular_usuario)
                    }
                    consultarUsuarioEmpresa()
                    toastr["success"]("<h6>Cliente Consultado correctamente</h6>")
                }else{
                    output +=  '<button title="GUARDAR" style="border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-success btn-fill  btn-round pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >'
                    output +=  '<i style="color: #ffffff; font-size: 17px" class="bi bi-save box-info pull-left"></i>'
                    output +=  '<span style="margin-left: 5px"> Guardar Cliente</span>'
                    $("#btn-update").html(output);

                    toastr["info"]("<h6>Cliente no registrado en la base de datos </h6>")
                    $('#tipocliente').val('')
                    $('#cliente_nombres').val('')
                    $('#cliente_correo').val('')
                    $('#cliente_direccion').val('')
                    $('#cliente_celular').val('')
                    $('#cliente_telefono').val('')
                    $('#municipioSelect').val('')
                    $('#cliente_dependencia_empresa').val('')
                    $('#cliente_usuario_empresa').val('')
                    $('#cliente_celular_usuario').val('')
                    cliente_id = 0 ;

                }
            };
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
        }
    });
}

document.getElementById('cliente_documento').addEventListener('keydown', inputCharacters);

function inputCharacters(event) {

  if (event.keyCode == 13) {
    consultarClienteEnter();
  }

}

function change(obj) {


    var selectBox = obj;
    var selected = selectBox.options[selectBox.selectedIndex].value;
    var textarea = document.getElementById("empresas");

    if (selected === 'EMPRESA') {
        textarea.style.display = "block";
    }
    else {
        textarea.style.display = "none";
    }
}
function showContent() {
    serial = document.getElementById("serial");
    checkadaptador = document.getElementById("checkadaptador");
    if (checkadaptador.checked) {
        serial.style.display = 'block';
    }
    else {
        serial.style.display = 'none';
    }
}
function codeAddress() {
        consultarMunicipio()
}
window.onload = codeAddress;


$(document).ready(function () {
    $('#equipo_orden').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [[3, 5, 10], [3, 5, 10]],
        "language": idioma_espanol

    });
    //$('#servicio').materialSelect();

    $('#usuarioEmpresa').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [[3, 5, 10], [3, 5, 10]],
        "language": idioma_espanol

    });
    $('#clients').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [[8, 5, 10], [8, 5, 10]],
        "language": idioma_espanol

    });

    $('.js-example-basic-multiple').select2();

});
var idioma_espanol = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
}


