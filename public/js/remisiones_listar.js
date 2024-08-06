var totalRemision = 0;
var idRemision = '';
$(document).ready(function() {
    loadTableRemisiones();
    
    loadtabledetalleProductos(); 
    
    //abrir modal crear cliente
    $('#btnImprimirRemision').on('click', function() {
        window.open ('../imprimir_remision/'+ idRemision,"remision","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );
    });
});

// Inicializar DataTables para la tabla de detalle dentro del modal
function loadtabledetalleProductos(){
    $('#tablaDetalleProductos').DataTable({
        responsive: true,
        "language": idioma_espanol,
        columns: [
            { data: null }, // Para el índice de la fila
            { data: 'producto' },
            { data: 'cantidad' },
            { 
                data: 'precio_unitario',
                render: function(data, type, row) {
                    return new Intl.NumberFormat().format(data);
                }
            },
            { 
                data: 'subtotal',
                render: function(data, type, row) {
                    return new Intl.NumberFormat().format(data);
                }
            }
        ],
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            }
        ],
        // Destruir la tabla si ya existe
        destroy: true,     


        // Añadir la fila de total al final de la tabla
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
            // Calcula el total
            var total = totalRemision
            // Actualiza el footer
            $(api.column(4).footer()).html(
                '$' + new Intl.NumberFormat().format(total)
            );
        }
    });
}
function loadTableRemisiones(){
        // Destruir la tabla existente si ya está inicializada
        if ($.fn.DataTable.isDataTable('#tablaRemisiones')) {
            $('#tablaRemisiones').DataTable().destroy();
        }
        // Inicializar DataTables con configuraciones básicas
        var table = $('#tablaRemisiones').DataTable({
        
            responsive: true,
            "language": idioma_espanol,
            ajax: {
                url: '../getRemisiones',
                data: {
                    fechaInicial : '',
                    fechaFinal : '',
                    documento : '',
                    nombres : ''
                } 
            },
            columns: [
                { 
                    data: null,
                    render: function(data, type, row, meta) {
                        return  (meta.row + 1);
                    }
                },
                { data: 'id' },

                {                     
                    data: 'fecha',
                    render: function(data, type, row) {
                        return formatoFecha12Horas(data);
                    } 
                },
                { data: 'cliente_documento' },
                { data: 'cliente_nombres' },
                { data: 'tipoPago' },
                { 
                    data: 'total',
                    render: function(data, type, row) {
                        // Formatear el precio con decimales de mil
                        return new Intl.NumberFormat().format(data);
                    }
                }, 
                { 
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-secondary" id="ver-detalle-remision" data-id="${row.id}">Ver detalle</button>`;
                    }
                },
            ]
        });
}
// Manejar el clic en el botón "Ver detalle"
$('#tablaRemisiones').on('click', '#ver-detalle-remision', function() {
    var id = $(this).data('id');
    loadDetalleRemision(id);
});

function loadDetalleRemision(id) {
    showpreloader()
    // Hacer la solicitud AJAX para obtener los detalles de la remisión
    $.ajax({
        url: '../getDetalleRemision',
        method: 'GET',
        data: { id: id },
        success: function(response) {
            // Asignar datos del cliente
            $('#documento').text(response.cliente_documento);
            $('#nombres').text(response.cliente_nombres);
            $('#correo').text(response.cliente_correo);
            $('#telefono').text(response.cliente_telefono);
            $('#celular').text(response.cliente_celular);
            $('#direccion').text(response.cliente_direccion);
            totalRemision = response.total;
            idRemision = response.idRemision;
            $('#idRemision').text(idRemision);

            // Cargar los productos en la tabla
            var table = $('#tablaDetalleProductos').DataTable();
            table.clear();
            table.rows.add(response.productos);
            table.draw();
            hidepreloader()
            // Mostrar el modal
            $('#modalDetalleRemision').modal('show');
        }
    });
}