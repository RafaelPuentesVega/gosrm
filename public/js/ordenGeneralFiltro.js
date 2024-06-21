let $selectTecnico, $numero_orden, dateinicioEntrada;
$nombre_cliente = $('#nombre_cliente');
$selectTecnico = $('#selectTecnico');
$numero_orden = $('#numero_orden');
$estadoOrden = $('#selectEstado');
$paginate = $('#paginate');
$serial = $('#serial');
function limpiarFiltro(){
    location.href = 'orden_salida';
}
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
    $selectTecnico.change(onChangefilterTecnico);
    $numero_orden.change(onChangefilterOrdenNumber);
    $estadoOrden.change(onChangefilterTecnico);
    $paginate.change(onChangefilterPaginate);
})
$('input.number').keyup(function(event) {
    $numero_orden = $('#numero_orden');
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }
    onChangefilterOrdenNumber();
});
$('input.numberCedula').keyup(function(event) {
    $numero_cedula = $('#cedula_cliente');
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }
    setTimeout(onChangefilterCedulaNumber, 1200);

});
$('input.nombreCliente').keyup(function(event) {
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }
    setTimeout(onChangefilterNombre, 1200);
});
$('input.serial').keyup(function(event) {
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }
    setTimeout(onChangefilterSerial, 1200);
});

function onChangefilterPaginate() {
    const paginate = $paginate.val();
    var URLactual = window.location;
    var arrayUrl = URLactual.toString().split('&');
    var QuestionArrayUrl = URLactual.toString().split('?');
    posicion = arrayUrl.length - 1;
    questionpaginate = arrayUrl[posicion].toString().split('=');
    if (questionpaginate[0] == 'paginate') {
        var res = '';
        //Validacion para colocar paginate despues de un filtro
        for (i = 0; i < posicion; i++) {
            if (i > 0) {
                res = res + '&' + arrayUrl[i];
            } else {
                res = res + arrayUrl[i];
            }
        }
        location.href = res + '&paginate=' + paginate;

    } else if (QuestionArrayUrl.length == 1)  {
        location.href = '?paginate=' + paginate;
    }else{
    location.href = URLactual + '&paginate=' + paginate;
    }
};

function clicklblfechaingreso() {
    document.getElementById('fecha_ingreso').style.display = 'block';
    document.getElementById('fecha_ingreso_lbl').style.display = 'none';
    document.getElementById("fecha_ingreso").focus();

}
function clicklblfechaentrega() {
    document.getElementById('fecha_entrega').style.display = 'block';
    document.getElementById('fecha_entrega_lbl').style.display = 'none';
    document.getElementById("fecha_entrega").focus();

}

function onChangefilterTecnico() {
    const selectTecnico = $selectTecnico.val();
    const estadoOrden = $estadoOrden.val();
    const paginate = $paginate.val();
    location.href = '?idTecnico=' + selectTecnico + '&estado=' + estadoOrden + '&paginate=' + paginate;
}
function onChangefilterOrdenNumber() {
    const numero_orden = $numero_orden.val();
    location.href = '?numOrden=' + numero_orden;
}

function onChangefilterCedulaNumber() {
    const numero_cedula = $numero_cedula.val();
    location.href = '?cedula=' + numero_cedula;
}

function onChangefilterNombre() {
    const nombre_cliente = $nombre_cliente.val();
    location.href = '?nombres=' + nombre_cliente;
}
function onChangefilterSerial() {
    const serial = $serial.val();
    location.href = '?serial=' + serial;
}

$(function() {
    $('input[name="fecha_ingreso"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        const paginate = $paginate.val();
        dateinicioEntrada = start.format('YYYY-MM-DD');
        datefinEntrada = end.format('YYYY-MM-DD');
        location.href = '?dateinicioEntrada=' + dateinicioEntrada + '&datefinEntrada=' +
            datefinEntrada + '&paginate=' + paginate;

    });
    $('input[name="fecha_entrega"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        const paginate = $paginate.val();
        dateinicioEntrada = start.format('YYYY-MM-DD');
        datefinEntrada = end.format('YYYY-MM-DD');
        location.href = '?dateinicioEntrega=' + dateinicioEntrada + '&datefinEntrega=' +
            datefinEntrada + '&paginate=' + paginate;

    });
});
