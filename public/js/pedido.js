var proveedorId = '';

$(document).ready(function() {

    fieldRequired();
    $('#fechaPedido').val(fechaActual());

    //abrir modal producto
    $('#btnAbrirBuscarProveedor').on('click', function() {
        loadTableBuscarProveedor();
        $('#modalBuscarProveedor').modal('show');
    });

    //abrir modal crear cliente
    $('#btn-agregar-proveedor').on('click', function() {
        $('#modalBuscarProveedor').modal('hide');
        $('#modalAgregarProveedor').modal('show');
    });

    //guardar pedido
    $('#btn-guardar-pedido').on('click', function() {
        guardarPedido();
    });

    //abrir modal agregar producto modal
    $('#btnAbrirBuscarProductoPedido').on('click', function() {
        loadTableBuscarProducto()
        $('#modalBuscarProducto').modal('show');
    });

    /// buscar
    $("#documentoProveedor").on("blur", function() {
        documentoCliente = $('#documentoProveedor').val();
        if(documentoCliente.length > 4){
            completarProveedor( '' , documentoCliente);
        }
    });

    $("#documentoProveedor").on("keydown", function(event) {
        if (event.key === "Enter") {
            documentoCliente = $('#documentoProveedor').val();
            if(documentoCliente.length > 4){
                completarProveedor( '' , documentoCliente);
            }
        }
    });
    //cambio estado tipo transaccion
    $('#transaccionPedido').on('change', function() {
        if ($(this).val() == 'contado') {
            $('#tipoPagoContainer').show();
            $('#tipoPagoPedido').prop('disabled', false);
            $('#tipoPagoPedido').prop('required', true);
        } else {
            $('#tipoPagoContainer').hide();
            $('#tipoPagoPedido').prop('disabled', true);
            $('#tipoPagoPedido').prop('required', false);
        }
        fieldRequired();
    });
});

function loadTableBuscarProveedor(){
    // Destruir la tabla existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tablaBuscarProveedores')) {
        $('#tablaBuscarProveedores').DataTable().destroy();
    }
    // Inicializar DataTables con configuraciones básicas
    var table = $('#tablaBuscarProveedores').DataTable({
    
        responsive: true,
        "language": idioma_espanol,
        ajax: {
            url: 'consultarProveedor',
            dataSrc: 'data' ,
            type: 'POST'
        },
        columns: [
            { 
                data: null,
                render: function(data, type, row, meta) {
                    return  (meta.row + 1);
                }
            },
            { data: 'documento' },
            { data: 'nombre' },
            { data: 'ciudad' }
            
        ],
        rowCallback: function(row, data) {
            $(row).on('click', function() {
                handleRowClickProveedor(data.id);
            });
        }
    });

}

function handleRowClickProveedor(id){
    completarProveedor(id , '')
    $('#modalBuscarProveedor').modal('hide');
}

function completarProveedor(id , documentoProveedor = null){

    showpreloader();
    $.ajax({
        url: "consultarProveedor",
        dataType: "json",
        type: 'POST',
        data: {
            id: id,
            documento : documentoProveedor
        },
        success: function(data) {
            hidepreloader();
            let proveedor = data.data[0];
            if(proveedor){
                $('#documentoProveedor').val(proveedor.documento)
                $('#nombreProveedor').val(proveedor.nombre)
                $('#ubicacionProveedor').val(proveedor.ciudad)
                proveedorId = proveedor.id;

            }else{
                proveedorId = '';
                Swal.fire({
                title: "Desea crear nuevo Proveedor?",
                text: 'No se encontro registros con el numero de cedula '+documentoCliente+' digitado.',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Crear!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#modalCrearCliente').modal('show');
                }
                });
                limpiardatosProveedorPedido();
            }

        },error: function(error){
            hidepreloader();
        }
    });
}

/*   
guardar remision
*/
function guardarPedido(){
    let proveedor = proveedorId;

    var formulario = $('#formDatosPedido');

    if (!validarCamposObligatorios(formulario)) {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, complete todos los campos obligatorios.',
            timer: 1200,
            showConfirmButton: false
          })
        // alert('Por favor, complete todos los campos obligatorios.');
        return;
    }

    if (proveedor == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, Seleccione un proveedor.',
            timer: 1200,
            showConfirmButton: false
          })
        return;
    }
    let productos = productosArray;
    if (productos.length === 0) {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, seleccione al menos un producto.',
            timer: 1200,
            showConfirmButton: false
          })
        return;
    }

    let precioTotal = productos.reduce((total, producto) => {
        return parseInt(total) + parseInt(producto.subtotal);
    }, 0);

    let fechaPedido = $('#fechaPedido').val();
    let tipoPagoPedido = $('#tipoPagoPedido').val();
    let transaccionPedido = $('#transaccionPedido').val();

    // Crear el objeto de datos
    let data = {
        proveedor: proveedor,
        productos: productos,
        precioTotal: parseInt(precioTotal),
        fechaPedido : fechaPedido,
        tipoPagoPedido : tipoPagoPedido,
        transaccionPedido : transaccionPedido
    };
    showpreloader();

    $.ajax({
        type: "POST",
        url: "guardarPedido",
        data: JSON.stringify(data),
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function(data) { 
            hidepreloader();

            let iconf = data.success ? 'success' : 'error';
            
            Swal.fire({
                icon: iconf,
                html: '<b><i>' + data.message + '</i></b> ',
                timer: 2500,
                showConfirmButton: false
            });
            if(data.success){
                limpiarDatosPedido()
            }

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
}
function limpiardatosProveedorPedido(){
    $('#documentoProveedor').val('')
    $('#nombreProveedor').val('')
    $('#ubicacionProveedor').val('')

    $('#tipoPagoPedido').val('')
    $('#transaccionPedido').val('')
    $('#fechaPedido').val(fechaActual());
    proveedorId = '';
}

function limpiarDatosPedido(){
    productosArray = [];
    actualizarTablaProductos();
    limpiarCamposProducto();
    limpiardatosProveedorPedido();
}

