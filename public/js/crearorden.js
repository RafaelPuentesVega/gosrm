//Variables globales
var cliente_id = '';
var equipo_id = '';
var usuario_empresa = '' ;
var id = '';
var emailQuestion = '';
var whatsappQuestion = '';
var contrato = '';
var garantia = '';
var btnguardar = '';
var serialAdaptatador = '';
var verifica_funcionamiento = '';
var accesorios = '';
var servicio = '';
var caracteristicas_equipo = '';
var descripcion_dano = '';
var tecnico = '';
var tipocliente = '';


function limpiardatoscliente(){
    this.cliente_id = '';
    this.usuario_empresa = '';
    output = '';
    $("#tipocliente").val('');
    $("#cliente_documento").val('');
    $("#cliente_nombres").val('');
    $("#cliente_correo").val('');
    $("#cliente_direccion").val('');
    $("#cliente_celular").val('');
    $("#cliente_telefono").val('');

    $('#cliente_dependencia_empresa').val('')
    $('#cliente_usuario_empresa').val('')
    $('#cliente_celular_usuario').val('')

    document.getElementById('btnGuardarUsuarioEmpresa').style.display = "block";;
    $('#cliente_dependencia_empresa').val('')
    $('#cliente_usuario_empresa').val('')
    $('#cliente_celular_usuario').val('')
    document.getElementById('cliente_dependencia_empresa').disabled = false;
    document.getElementById('cliente_usuario_empresa').disabled = false;
    document.getElementById('cliente_celular_usuario').disabled = false;
    document.getElementById('btnGuardarUsuarioEmpresa').disabled = false;

    //boton de guardar
    outputbtnsave = '';
    outputbtnsave += '<button title="GUARDAR" data-toggle="tooltip" data-placement="bottom" style="border: none; margin: 10px" type="button" class="btn btn-info btn-fill pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >';
    outputbtnsave += '<i style="font-size: 20px" class="fas fa-save"></i>';
    outputbtnsave += '<span style="font-size: 16px" > Guardar Cliente</span></button>';
    $("#btn-update").html(outputbtnsave);

    document.getElementById('tipocliente').disabled = false;
    document.getElementById('cliente_documento').disabled = false;
    document.getElementById('cliente_nombres').disabled = false;
    document.getElementById('cliente_correo').disabled = false;
    document.getElementById('cliente_direccion').disabled = false;
    document.getElementById('cliente_celular').disabled = false;
    consultarUsuarioEmpresa();
    $("#consultarEquipo").html(output);
    limpiardatosequipo();
}

function limpiardatosequipo(){
    this.equipo_id = '';
    $('#equipo_tipo').val('')
    $('#equipo_marca').val('');
    $('#equipo_referencia').val('');
    $('#equipo_serial').val('');
    document.getElementById('equipo_marca').disabled = false;
    document.getElementById('equipo_referencia').disabled = false;
    document.getElementById('equipo_serial').disabled = false;
    document.getElementById('equipo_tipo').disabled = false;

    btnGuardarEquipo.style.display = "block";
    document.getElementById('selectEquipo').style.display = "block";
    document.getElementById('saveequi').style.display = "block";
    document.getElementById('checkTipoEquipo').style.display = "block";
    document.getElementById('equipo_tipo').style.display = "none";

    document.getElementById('checkTipoEquipo').disabled = false;
    document.getElementById('tipoEquipoSelect').disabled = false;

    objCheckEqu = document.getElementById("checkTipoEquipo");
    objCheckEqu.style.removeProperty("display");
    document.getElementById('btnLimpiarEquipo').style.display = "none";
}

$('#btnGuardarOrden').on('click', function(){
     btnguardar = document.getElementById('btnGuardarCliente');
     serialAdaptatador = $("#serialAdaptador").val();
     verifica_funcionamiento = $("#verificacion_funcionamiento").val();
     accesorios = $("#accesorios").val();
     servicio = $("#servicio").val();
     caracteristicas_equipo = $("#caracteristicas_equipo").val();
     descripcion_dano = $("#descripcion_dano").val();
     tecnico = $("#tecnicoSelect").val();
     tipocliente = $("#tipocliente").val();

    if (cliente_id.length == 0 || cliente_id.length == '') {
        toastr["warning"]("<h6>Seleccionar un Cliente </h6>")
        return true;
    }
    if(tipocliente == 'EMPRESA'){

        if (usuario_empresa.length < 1 || usuario_empresa.length == '') {
            $("#cliente_dependencia_empresa").focus();
            toastr["warning"]("<h6>Seleccionar O guardar una Dependencia</h6>")
            return true;
        }
    }

    if (equipo_id.length == 0 || equipo_id.length == '') {
        toastr["warning"]("<h6>Seleccionar un Equipo </h6>")
        return true;
    }

    if (document.getElementById('checkcontrato').checked) {
        contrato = 'SI';
    }
    if (!document.getElementById('checkcontrato').checked) {
        contrato = 'NO';
    }
    if (document.getElementById('checkgarantia').checked) {
        garantia = 'SI';
    }
    if (!document.getElementById('checkgarantia').checked) {
        garantia = 'NO';
    }
    if (document.getElementById('checkadaptador').checked) {
        if (serialAdaptatador.length < 1) {
            toastr["warning"]("<h6>Digitar Serial Adaptador</h6>")
            $("#serialAdaptador").focus();
            return;
        }
        if (serialAdaptatador.length < 6) {
            toastr["warning"]("<h6>El serial debe contener 6 digitos</h6>")
            $("#serialAdaptador").focus();
            return;
        }
    }
    if (!document.getElementById('checkadaptador').checked) {
        serialAdaptatador = '';
    }
    if (verifica_funcionamiento.length < 1) {
        toastr["warning"]("<h6>Seleccionar Verificacion de funcionamiento</h6>")
        $("#verificacion_funcionamiento").focus();
        return;
    }
    if (accesorios.length < 1) {
        toastr["warning"]("<h6>Diligenciar accessorios</h6>")
        $("#accesorios").focus();
        return;
    }
    if (servicio.length < 1) {
        toastr["warning"]("<h6>Seleccionar un servicio</h6>")
        $("#servicio").focus();
        return;
    }
    if (caracteristicas_equipo.length < 1) {
        toastr["warning"]("<h6>Diligenciar Caracteristicas del equipo</h6>")
        $("#caracteristicas_equipo").focus();
        return;
    }
    if (descripcion_dano.length == 0) {
        toastr["warning"]("<h6>Diligenciar el daño del equipo </h6>")
        $("#descripcion_dano").focus();
        return;
    }
    if (tecnico.length < 1) {
        toastr["warning"]("<h6>Seleccionar un Tecnico</h6>")
        $("#tecnico").focus();
        return;
    }

    Swal.fire({
        title: 'Selecciona las opciones para notificar al cliente',
        html: `
        <div style="text-align: left;">
        <label>
            <input type="checkbox" checked id="emailOption">
            <i class="fas fa-envelope" style="color: #007bff;"></i> Correo
        </label><br>
        <label>
            <input type="checkbox" id="whatsappOption">
            <i class="fab fa-whatsapp" style="color: #25d366;"></i> WhatsApp
        </label>
        </div>`,
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
          // Devuelve el estado de las opciones seleccionadas
          const email = document.getElementById('emailOption').checked;
          const whatsapp = document.getElementById('whatsappOption').checked;
          return { email, whatsapp };
        }
      }).then((result) => {
        if (result.isConfirmed) {
          showpreloader();
          // Usa los resultados seleccionados
          const { email, whatsapp, sms } = result.value;
          emailQuestion = email ? 'SI' : 'NO';
          whatsappQuestion = whatsapp ? 'SI' : 'NO';
      
          // Llama a tu función con base en las opciones seleccionadas
          guardarOrdenServicio();
        }
      });

//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//           confirmButton: 'btn btn-success',
//           cancelButton: 'btn btn-danger'
//         },
//       })
//     swalWithBootstrapButtons.fire({
//         title: 'Enviar Correo al cliente?',
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonText: 'Si',
//         cancelButtonText: 'No',
//         reverseButtons: false

//       })
//       .then((result) => {
//         showpreloader();
//         if (result.isConfirmed) {
//              emailQuestion = 'SI';
//              guardarOrdenServicio()
//         } else if (result.dismiss === Swal.DismissReason.cancel) {
//             emailQuestion = 'NO';
//             guardarOrdenServicio()

//             }
//         })
 });
$(document).ready(function() {
    $('#equipo_referencia').on('keyup', function() {
        var referencia = $('#equipo_referencia').val();
	$.ajax({
            type: "POST",
            url: "referenciaEquipoAjax",
            data: {referencia : referencia} ,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsReferencia').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $(document).on('click', function(){
                    $('#suggestionsReferencia').fadeOut(1000);
                    return true;
                });
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#equipo_referencia').val(id);
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsReferencia').fadeOut(1000);
                        return true;
                });
            }
        });
    });
    $("#cliente_documento").on("blur", function() {
        documentoCliente = $('#cliente_documento').val();
        if(documentoCliente.length > 4){
            consultarClienteEnter();
        }
    });
    //Autocomplete cedula
    $('#cliente_documento').on('keyup', function() {
        var documento = $('#cliente_documento').val();
	$.ajax({
            type: "POST",
            url: "cedulaClienteAjax",
            data: {documento : documento} ,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsCedula').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $(document).on('click', function(){
                    $('#suggestionsCedula').fadeOut(1000);
                    return true;
                });
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#cliente_documento').val(id);
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsCedula').fadeOut(1000);
                        consultarClienteEnter()
                        return true;
                });
            }
        });
    });
    $('#equipo_marca').on('keyup', function() {
        var marca = $('#equipo_marca').val();
	$.ajax({
            type: "POST",
            url: "marcaEquipoAjax",
            data: {marca : marca} ,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsMarca').fadeIn(1000).html(data);
                //Si damos click en otro lado
                $(document).on('click', function(){
                    $('#suggestionsMarca').fadeOut(1000);
                    return true;
                });
                                //Al hacer click en algua de las sugerencias

                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#equipo_marca').val(id);
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsMarca').fadeOut(1000);
                        return true;
                });
            }
        });
    });
    //Autocomplete Caracteristicas del equipo
    $('#caracteristicas_equipo').on('keyup', function() {
        var caracteristicas = $('#caracteristicas_equipo').val();
	$.ajax({
            type: "POST",
            url: "caracteristicaEquipoAjax",
            data: {caracteristicas : caracteristicas} ,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsCaracteristicas').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $(document).on('click', function(){
                    $('#suggestionsCaracteristicas').fadeOut(1000);
                    return true;
                });
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#caracteristicas_equipo').val(id);
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsCaracteristicas').fadeOut(1000);
                        return true;
                });
            }
        });
    });
});
$(window).on('load', function () {
    showpreloader()
    setTimeout(function () {
        hidepreloader()
}, 700);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function cerrarModal() {
    $('#md-buscarCliente').modal('hide');
}
function showModal() {
    $('#md-buscarCliente').modal('show'); // abrir
}
function guardarEquipoOrden() {
    btnguardar = document.getElementById('btnGuardarEquipo');
    let tipoEmpresa = $("#tipocliente").val();
    let equipo_tipo = $("#equipo_tipo").val();
    let equipo_tipo_select = $("#tipoEquipoSelect").val();
    let equipo_marca = $("#equipo_marca").val();
    let equipo_referencia = $("#equipo_referencia").val();
    let equipo_serial = $("#equipo_serial").val();
    let checkTipoEquipo = '';



    if (cliente_id.length == 0 || cliente_id.length == '') {
        toastr["warning"]("<h6>Seleccionar un Cliente </h6>")
        return;
    }
    if(tipoEmpresa == 'EMPRESA'){

        if (usuario_empresa.length < 1 || usuario_empresa.length == '') {
            toastr["warning"]("<h6>Seleccionar O guardar una Dependencia</h6>")
            return;
        }
    }
   // alert(document.getElementById('checkTipoEquipo').checked);
    if (document.getElementById('checkTipoEquipo').checked) {
        checkTipoEquipo = 'SI';
        equipo_tipo_select = '';
        if (equipo_tipo.length < 1) {
            toastr["warning"]("<h6>Digitar Tipo de equipo</h6>")
            $("#equipo_tipo").focus();
            return;
        }
    }
    if (!document.getElementById('checkTipoEquipo').checked) {
        checkTipoEquipo = 'NO';
        equipo_tipo = '';
        if (equipo_tipo_select.length < 1) {
            toastr["warning"]("<h6>Seleccionar Tipo Equipo</h6>")
            $("#tipoEquipoSelect").focus();
            return;
        }

    }
    if (equipo_marca.length < 1) {
        toastr["warning"]("<h6>Diligenciar Marca del equipo </h6>")
        $("#equipo_tipo").focus();
        $("#equipo_marca").focus();
        return;
    }
    if (equipo_referencia.length < 1) {
        toastr["warning"]("<h6>Diligenciar Referencia del equipo </h6>")
        $("#equipo_referencia").focus();
        return;
    }
    if (equipo_serial.length < 1) {
        toastr["warning"]("<h6>Diligenciar el serial del equipo </h6>")
        $("#equipo_serial").focus();
        return;
    }
    if (equipo_serial.length > 6 || equipo_serial.length < 6) {

        toastr["warning"]("<h6>El Serial debe de contener 6 digitos </h6>")
        $("#equipo_serial").focus();
        return;
    }
    showpreloader();
    $.ajax({
        url: 'guardarEquipoOrden',
        data: {
            equipo_tipo: equipo_tipo,
            equipo_tipo_select:equipo_tipo_select,
            checkTipoEquipo:checkTipoEquipo,
            equipo_marca: equipo_marca,
            equipo_referencia: equipo_referencia,
            equipo_serial: equipo_serial,
            cliente_id: cliente_id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {

                setTimeout(function(){
                    hidepreloader();
                }, 800);
                document.getElementById('equipo_marca').disabled = true;
                document.getElementById('equipo_tipo').disabled = true;
                document.getElementById('equipo_referencia').disabled = true;
                document.getElementById('equipo_serial').disabled = true;
                document.getElementById('checkTipoEquipo').disabled = true;
                document.getElementById('tipoEquipoSelect').disabled = true;
                document.getElementById('btnLimpiarEquipo').style.display = "block";
                document.getElementById('saveequi').style.display = "none";

                toastr["success"]("<h6>Se guardo correctamente el equipo</h6>", "GUARDADO")
                //btnguardar.disabled = true;
                btnguardar.style.display = "none";
                equipo_id = json.dataEquipo.id;
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function consultarEquipo() {
    $.ajax({
        url: 'consultarEquipo',
        data: {
            id: cliente_id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {
                control = json.data.length;
                var output = "";
                table = document.getElementById("consultarEquipo");
                table.style.display = 'block';
                if (control != 0) {
                    output += '<table  id="equipo_orden" class="table table-hover" style="border-radius : 10px 10px ;box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2)"  >'
                    output += '<thead  class="thead-light">'
                    output += '<tr >'
                    output += '<th scope="col" class="text-center" ><strong>EQUIPO</strong></th>'
                    output += '<th scope="col" class="text-center" ><strong>MARCA</strong></th>'
                    output += '<th scope="col" class="text-center"><strong>REFERENCIA</strong></th>'
                    output += '<th scope="col" class="text-center"><strong>SERIAL</strong></th>'
                    output += '</tr>'
                    output += '</thead>'
                    output += '<tbody>'
                    for (let i = 0; i < control; i++) {
                        tipo = json.data[i].equipo_tipo;
                        marca = json.data[i].equipo_marca;
                        referencia = json.data[i].equipo_referencia;
                        serial = json.data[i].equipo_serial;
                        idEquipo = json.data[i].equipo_id;
                        output += '<tr  style = "cursor: pointer;background-color: #ffffff7e" onclick="SeleccionarEquipo(' +idEquipo+ ')"  >'
                        output += '<td class="text-center">' + tipo + '</td>'
                        output += '<td class="text-center">' + marca + '</td>'
                        output += '<td class="text-center">' + referencia + '</td>'
                        output += '<td class="text-center">' + serial + '</td>'
                        // output += '<td> <button title="SELECCIONAR EQUIPO" data-toggle="tooltip" data-placement="bottom" onclick="SeleccionarEquipo(' +idEquipo+ ')" style="margin: 0%; border: none; outline:none; text-decoration: none" title="SELECCIONAR" class="btn btn-round btn-xs"> <i style="margin: 0%; color: #2E86C1; font-size: 17px" class="bi bi-arrow-down-circle-fill pull-left"> </i> </button> </td>'
                        output += '</tr>'
                    }
                    output += '</tbody>'
                    output += '<table>'
                    $("#consultarEquipo").html(output);
                }
            }
            $('#equipo_orden').DataTable({
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
        toastr["warning"]("<h5>Diligenciar Tipo de cliente</h5>")
        $("#tipocliente").focus();
        return;
    }
    if (cliente_documento.length < 1) {
        toastr["warning"]("<h6>Diligenciar N° de Documento </h6>")
        $("#cliente_documento").focus();
        return;
    }
    if (cliente_nombres.length < 1) {
        toastr["warning"]("<h6>Diligenciar Nombre del cliente </h6>")
        $("#cliente_nombres").focus();
        return;
    }
    if(cliente_correo.length < 1){
         toastr["warning"]("<h6>Diligenciar Correo del cliente </h6>")
         $("#cliente_correo").focus();
         return;
    }
    if(!emailval.exec(cliente_correo)){
        toastr["error"]("<h6>Correo no valido</h6>")
        $("#cliente_correo").focus();
        return;
    }
    if(cliente_direccion.length < 1 ){
         toastr["warning"]("<h6>Diligenciar Direccion </h6>")
         $("#cliente_direccion").focus();
         return;
    }
    if(cliente_celular.length < 1){
        toastr["warning"]("<h6>Diligenciar Celular </h6>")
        $("#cliente_celular").focus();
        return;
    }
    if(cliente_celular.length < 10 ){
        toastr["error"]("<h6>El numero de Celular Debe contener 10 digitos </h6>")
        $("#cliente_celular").focus();
        return;
    }
    if(cliente_telefono.length < 1){
        toastr["warning"]("<h6>Diligenciar Telefono </h6>")
        $("#cliente_telefono").focus();
        return;
    }
    showpreloader();
    $.ajax({
        // url: 'guardarCliente',
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
                cliente_id = json.dataCliente.cliente_id;
            }
            if (json.mensaje === "update") {
                toastr["info"]("<h6>Se actualizo correctamente el Cliente</h6>", "ACTUALIZACION")
                btnguardar.disabled = true;
            }
            if (json.mensaje === "clienteCreado") {
                toastr["error"]("<h6>"+json.dataCliente[0].cliente_nombres+"</h6>" , "CLIENTE YA CREADO")
            }
            hidepreloader();

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}

function guardarUsuarioEmpresa() {

    btnguardar = document.getElementById('btnGuardarUsuarioEmpresa');
    let cliente_dependencia_empresa = $("#cliente_dependencia_empresa").val();
    let cliente_usuario_empresa = $("#cliente_usuario_empresa").val();
    let cliente_celular_usuario = $("#cliente_celular_usuario").val();
        if(cliente_id == null || cliente_id.length < 1){
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
        showpreloader()
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
                btnguardar.style.display = "none";
                document.getElementById('cliente_dependencia_empresa').disabled = true;
                document.getElementById('cliente_usuario_empresa').disabled = true;
                document.getElementById('cliente_celular_usuario').disabled = true;
                consultarUsuarioEmpresa();
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
            hidepreloader()
        }
    });

}
function consultarCliente(id) {
    let municipio = $("#municipioSelect").val();
    let departamento = $("#departamentoSelect").val();
    tipoCliente = document.getElementById('tipocliente');
    documentoCliente = document.getElementById('cliente_documento');
    nombreCliente = document.getElementById('cliente_nombres');
    showpreloader()
    $.ajax({
        url: 'consultarCliente',
        data: {id: id },
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
                    cerrarModal();
                    $('#tipocliente').val(json.data[0].cliente_tipo)
                    $('#cliente_documento').val(json.data[0].cliente_documento)
                    $('#cliente_nombres').val(json.data[0].cliente_nombres)
                    $('#cliente_correo').val(json.data[0].cliente_correo)
                    $('#cliente_direccion').val(json.data[0].cliente_direccion)
                    $('#cliente_celular').val(json.data[0].cliente_celular)
                    $('#cliente_telefono').val(json.data[0].cliente_telefono)
                    $('#municipioSelect').val(json.data[0].municipio_id)
                    tipoCliente.disabled = true;
                    documentoCliente.disabled = true;
                    nombreCliente.disabled = true;


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
                    output += '<button title="ACTUALIZAR" style="font-size : 16px ;border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-warning btn-fill   pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >';
                    output += '<i style="font-size : 20px" class="fa-solid fa-pen-to-square"></i>';
                    output += '<span style="margin-left: 5px">Actualizar Cliente</span> </button>';
                    $("#btn-update").html(output);
                    toastr["success"]("<h6>Seleccionado correctamente</h6>")

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
                consultarEquipo();
                consultarUsuarioEmpresa();
            }
            limpiardatosequipo();
            hidepreloader()
        }
    });
}

function SeleccionarUsaurioEmpresa(id) {
    showpreloader()
    $.ajax({
        url: 'SeleccionarUsaurioEmpresa',
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

                        document.getElementById('cliente_dependencia_empresa').disabled = true;
                        document.getElementById('cliente_usuario_empresa').disabled = true;
                        document.getElementById('cliente_celular_usuario').disabled = true;
                        document.getElementById('btnGuardarUsuarioEmpresa').style.display = "none";
                        toastr["success"]("<h6>Seleccionado correctamente</h6>")




                }
            };
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
}
function SeleccionarEquipo(id) {
btnGuardarEquipo = document.getElementById('btnGuardarEquipo');
    showpreloader()
    $.ajax({
        url: 'SeleccionarEquipo',
        data: { id: id },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {

                if (json.data.length > 0) {
                        $('#equipo_tipo').val(json.data[0].equipo_tipo)
                        $('#equipo_marca').val(json.data[0].equipo_marca)
                        $('#equipo_referencia').val(json.data[0].equipo_referencia)
                        $('#equipo_serial').val(json.data[0].equipo_serial)
                        btnGuardarEquipo.style.display = "none";
                        document.getElementById('selectEquipo').style.display = "none";
                        document.getElementById('saveequi').style.display = "none";
                        document.getElementById('checkTipoEquipo').style.display = "none";
                        document.getElementById('btnLimpiarEquipo').style.display = "block";
                        document.getElementById('equipo_tipo').style.display = "block";
                        equipo_id = json.data[0].equipo_id;
                        document.getElementById('equipo_tipo').disabled = true;
                        document.getElementById('equipo_marca').disabled = true;
                        document.getElementById('equipo_referencia').disabled = true;
                        document.getElementById('equipo_serial').disabled = true;
                        toastr["success"]("<h6>Seleccionado correctamente</h6>")


                }
            };
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
            hidepreloader()
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
                    output += '<table  id="usuarioEmpresa" style="box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);border-radius: 10px" class="table table-striped table-hover"  >'
                    output += '<thead class="thead-light">'
                    output += '<tr >'
                    output += '<th  scope="col" class="text-center" style="height: 5px; color:#16172C"><strong>DEPENDENCIA</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>USUARIO</strong></th>'
                    output += '<th scope="col" class="text-center" style="color:#16172C"><strong>CELULAR</strong></th>'
                    output += '</tr>'
                    output += '</thead>'
                    output += '<tbody>'
                    for (let i = 0; i < control; i++) {
                        dependencia = json.data[i].usuario_dependencia;
                        usuario = json.data[i].usuario_nombre;
                        celular = json.data[i].usuario_celular;
                        idUsuario = json.data[i].id_cliente_empresa;
                        output += '<tr style = "cursor: pointer" onclick="SeleccionarUsaurioEmpresa(' +idUsuario+ ')">'
                        output += '<td  class="text-center">' + dependencia + '</td>'
                        output += '<td  class="text-center">' + usuario + '</td>'
                        output += '<td class="text-center">' + celular + '</td>'
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
    tipoCliente = document.getElementById('tipocliente');
    documentoCliente = document.getElementById('cliente_documento');
    nombreCliente = document.getElementById('cliente_nombres');
    let id = $("#cliente_documento").val();
    if(id.length < 1){
        toastr["warning"]("<h6>Diligenciar N° de Documento</h6>")
        return;
    }
    showpreloader();
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
                output += '<button title="ACTUALIZAR CLIENTE" data-toggle="tooltip" data-placement="bottom" style="font-size : 16px ;border: none; outline:none; text-decoration: none; margin: 10px" type="submits" class="btn btn-warning btn-fill pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >';
                output += '<i style="font-size : 20px" class="fa-solid fa-pen-to-square"></i>';
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
                        //CONSULTAMOS SI ES EMPRESA - PARA
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
                        tipoCliente.disabled = true;
                        documentoCliente.disabled = true;
                        nombreCliente.disabled = true;
                    consultarEquipo()
                    consultarUsuarioEmpresa()
                    toastr["success"]("<h6>Cliente Consultado correctamente</h6>")
                }else{


                    toastr["info"]("<h6>Cliente no registrado</h6>")
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
                    cliente_id = '' ;
                    consultarUsuarioEmpresa()
                    consultarEquipo()

                }
                hidepreloader();

            };
        },
        error: function (xhr, status) {
            hidepreloader();
            alert('Disculpe, existió un problema en el servidor');
        },
        complete: function (xhr, status) {
            hidepreloader();
            limpiardatosequipo();
        }
    });
}
function validarCamposGuardarOrden(){

}
function guardarOrdenServicio() {

    validarCamposGuardarOrden()
    $.ajax({
        // la URL para la petición
        url: 'guardarOrden',
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data: {
            usuario_empresa : usuario_empresa,
            cliente_id: cliente_id,
            equipo_id: equipo_id,
            serialAdaptatador: serialAdaptatador,
            verifica_funcionamiento: verifica_funcionamiento,
            accesorios: accesorios,
            servicio: servicio,
            caracteristicas_equipo: caracteristicas_equipo,
            descripcion_dano: descripcion_dano,
            tecnico: tecnico,
            garantia: garantia,
            contrato: contrato,
            notificar_email : emailQuestion,
            notificar_whatsapp : whatsappQuestion
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.success == true) {
                toastr["success"]("<h6>Se guardo correctamente la orden </h6>", "GUARDADO")
                id = json.dataOrden.id;
                toastr["success"]("<h6>Enviando Orden</h6>", "ENVIANDO")
                setTimeout(function(){
                }, 2000);
               // window.open ('imprimir_ordeningreso/TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI'+ id +'TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI',"ventana1","width=120,height=300,scrollbars=NO" );
               window.open ('imprimir_ordeningreso/TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI'+ id +'TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI?email='+emailQuestion,"Orden Ingreso","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );
                hidepreloader();
                location.reload();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrio un error al guardar. Error:: ' +  json.error,
                    footer: 'intentar guardar nuevamente'
                  })  
            }
            
        },
        error: function (xhr, status) {
            hidepreloader();
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
            hidepreloader();
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
function tipoEquipo() {
    tipoEquipoCrear = document.getElementById("equipo_tipo");
    tipoEquipoSelect = document.getElementById("selectEquipo");
    checkadaptador = document.getElementById("checkTipoEquipo");
    if (checkadaptador.checked) {
        tipoEquipoCrear.style.display = 'block';
        tipoEquipoSelect.style.display = 'none';
    }
    else {
        tipoEquipoCrear.style.display = 'none';
        tipoEquipoSelect.style.display = 'block';
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
    $('[data-toggle="tooltip"]').tooltip()

    $('#usuarioEmpresa').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [[3, 5, 10], [3, 5, 10]],
        "language": idioma_espanol

    });
    $('#clients').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [[12, 8, 5], [12, 8, 5]],
        "language": idioma_espanol

    });
    $('.dataTables_filter input[type="search"]').
    attr('class','form-control').
    css({'width':'340px','display':'inline-block','position':'left'});
    $('.dataTables_length select').
    attr('class','form-control').
    css({'width':'54px','display':'inline-block','position':'relative'});

    $('.js-example-basic-multiple').select2();

});

//se pego un texto, solo deja pegar los ultimos 6 digitos
const inputField = document.getElementById("equipo_serial");

inputField.addEventListener("paste", function(event) {
  const text = event.clipboardData.getData("text");
  event.preventDefault();

  if (text.length > 6) {
    inputField.value = text.slice(-6);
  } else {
    inputField.value = text;
  }
});

inputField.addEventListener("keypress", function(event) {
  if (inputField.value.length >= 6) {
    event.preventDefault();
  }
});
inputField.oninput = function() {
    if (inputField.value.length > 6) {
      inputField.value = inputField.value.substring(0, 6);
    }
  };
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


