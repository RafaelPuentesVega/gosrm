$(document).ready(function () {
    // Selecciona automáticamente el botón "Movimientos" al cargar la página
    $('#btnMovimiento').prop('checked', true);
    // Muestra el contenido correspondiente al botón seleccionado
    showContent();
    fieldRequired();//agregar * a los campos obligatorios

        // Manejador de clic para el botón de exportación
        $('#exportarExcel').click(function() {
            exportarTablaAExcel($('#miTabla'));
        });
    
        // Función para exportar la tabla a Excel
        function exportarTablaAExcel($table) {
            // Obtén la fecha actual
            var fechaActual = new Date();

            // Formatea la fecha como dd_mm_aaaa
            var formatoFecha = fechaActual.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });


            var html = '<table>' + $table.html() + '</table>';
            var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'reporte_'+ formatoFecha +'.xls';
            a.click();
        }

        $('#tipo').change(function() {
            var tipo = $(this).val();
            
            if (tipo === 'ingreso') {
                $('#soporte_div').hide();                
                $('#soporte').prop('required', false);
            } else if (tipo === 'salida') {
                $('#numero_orden_div').hide();
                $('#soporte_div').show();                
                $('#soporte').prop('required', true);
            } else {
                $('#soporte_div').hide();
                $('#numero_orden_div').hide();
                $('#soporte').prop('required', false);
            }
            fieldRequired();
        });
});

function showContent() {
    movimiento = document.getElementById("movimientos");
    informes = document.getElementById("informe");

    btnMovimiento = document.getElementById("btnMovimiento");
    btnInformes = document.getElementById("btnInforme");

    if (btnMovimiento.checked) {
        movimiento.style.display = 'block';
        informes.style.display = 'none';

    }
    else if (btnInformes.checked) {
        movimiento.style.display = 'none';
        informes.style.display = 'block';
    }
}



function formatoSeparadorMil(input) {
    // Elimina cualquier carácter que no sea un número
    let numero = input.value.replace(/\D/g, '');

    // Aplica el formato con separador de mil
    numero = numero.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    // Actualiza el valor del campo de entrada con el signo de peso
    input.value = '$' + numero;
}
$('#btn-guardar').on('click', function () {

    tipo = $('#tipo').val();
    descripcion = $('#descripcion').val();
    num_orden = $('#numero_orden').val();
    metodo_pago = $('#metodo_pago').val();

    var valor = $('#valor').val();
    valor = valor.replace(/,/g, ''); // Eliminar comas
    valor = valor.replace(/\$/g, ''); // Eliminar signo de dólar


    soporte = $('#soporte')[0].files[0]; // Obtener el archivo seleccionado
    var formulario = $('#registrarCaja');

    if (!validarCamposObligatorios(formulario)) {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, complete todos los campos obligatorios *',
            timer: 1200,
            showConfirmButton: false
        });
        return;
    }

    // Mostrar spinner
    showpreloader();

    // Crear un objeto FormData
    var formData = new FormData();
    formData.append('valor', valor);
    formData.append('tipo', tipo);
    formData.append('descripcion', descripcion);
    formData.append('num_orden', num_orden);
    formData.append('metodo_pago', metodo_pago);
    formData.append('soporte', soporte);

    $.ajax({
        type: "POST",
        url: "guardarMovimientocaja",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                                        // Limpiar los campos de entrada
                $('#valor').val("");
                $('#descripcion').val("");
                $('#numero_orden').val("");
                $('#metodo_pago').val("");
                $('#tipo').val("");
                $('#soporte').val(""); // Limpiar el campo de archivo  
            
                Swal.fire({
                    icon: 'success',
                    html: '<b><i>' + data.message + '</i></b> ',
                    timer: 2500,
                    showConfirmButton: false
                });


            }

            if (data.status == false) {
                Swal.fire({
                    icon: 'error',
                    html: '<b><i>' + data.message + '</i></b> ',
                    showConfirmButton: true
                });
            }
            
            //ocultar spinner
            hidepreloader();
        }

    });
});

$('#btnInforme').on('click', function () {

    getDataMovimientos();

});

$('#btn-buscar').on('click', function () {

    getDataMovimientos();
});

function getDataMovimientos(){

    fechaInicial = $('#fechaInicial').val();
    fechaFinal = $('#fechaFinal').val();
    
      //mostrar spinner
      showpreloader();

    $.ajax({
        type: "POST",
        url: "getDataMovimientos",
        data: {
            fechaInicial: fechaInicial,
            fechaFinal: fechaFinal
        },
        success: function (data) {            
            //ocultar spinner
            hidepreloader();
            if (data.status == true) {
                Swal.fire({
                    icon: 'success',
                    html: '<b><i>' + data.message + '</i></b> ',
                    timer: 1000,
                    showConfirmButton: false
                });
                var total = parseFloat(data.total.replace(/\./g, '').replace(',', '.')); // Convertir formato a número
                var egreso = parseFloat(data.egreso.replace(/\./g, '').replace(',', '.')); // Convertir formato a número
                var ingreso = parseFloat(data.ingreso.replace(/\./g, '').replace(',', '.')); // Convertir formato a número
                                
                $('#egreso').text(egreso.toLocaleString());
                $('#ingreso').text(ingreso.toLocaleString());
                $('#total').text(total.toLocaleString());

                $('#efectivo-historico').text(data.valoresTotales.efectivoHistorico.toLocaleString());
                $('#transferencia-historico').text(data.valoresTotales.transferenciaHistorico.toLocaleString());

                $('#efectivo-busqueda').text(data.valoresTotales.efectivoBusqueda.toLocaleString());
                $('#transferencia-busqueda').text(data.valoresTotales.transferenciaBusqueda.toLocaleString());

                $('#total-busqueda').text('Total Busqueda: $ ' + data.valoresTotales.totalBusqueda.toLocaleString());
                $('#total-historico').text('Total Historico: $ ' + data.valoresTotales.totalHistorico.toLocaleString());
                
                
                $('#fecha-busqueda').text(data.fechas.toLocaleString());

                // Procesar datos y llenar la tabla
                var table = $('#miTabla').DataTable();
                table.clear().draw();

                for (var i = 0; i < data.data.length; i++) {
                    var movimiento = data.data[i];
                        // Crear un botón de enlace para ver el archivo
                    var botonVerArchivo = '';
                    if (movimiento.ruta_soporte) {
                        botonVerArchivo = '<a href=".' + movimiento.ruta_soporte + '" target="_blank" class="btn btn-primary btn-sm">Ver Archivo</a>';
                    }
                    table.row.add([
                        formatarFechaHora(movimiento.created_at),
                        movimiento.tipo,
                        '$'+formatarNumero(movimiento.valor),
                        movimiento.metodo_pago,
                        movimiento.descripcion,
                        movimiento.orden_id,
                        botonVerArchivo
                        // Agrega más columnas según tus datos
                    ]).draw();
                }

            }

            if (data.status == false) {
                Swal.fire({
                    icon: 'error',
                    html: '<b><i>' + data.message + '</i></b> ',
                    showConfirmButton: true
                });
            }
        }

    });

}

// Función para formatear la fecha con hora
function formatarFechaHora(fecha) {
    var date = new Date(fecha);
    return date.toLocaleString('es-ES', { hour12: false });
}

// Función para formatear los números sin símbolo de la moneda y sin decimales
function formatarNumero(numero) {
    return parseFloat(numero).toLocaleString('es-ES', { maximumFractionDigits: 0 });
}
