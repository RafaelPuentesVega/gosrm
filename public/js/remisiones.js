
var productosArray = [];

$(document).ready(function() {


    //abrir modal producto
    $('#btnAbrirBuscarProducto').on('click', function() {
        loadTableBuscarProducto()
        $('#modalBuscarProducto').modal('show');
    });

    //abrir modal cliente
    $('#btnAbrirBuscarCliente').on('click', function() {
        loadTableBuscarCliente()
        $('#modalBuscarCliente').modal('show');
    });
    // Añadir la clase required-label a los labels de campos requeridos
    $('form :input[required]').each(function() {
        var label = $('label[for="' + $(this).attr('id') + '"]');
        label.addClass('required-label');
    });

    $("#documentoCliente").on("blur", function() {
        documentoCliente = $('#documentoCliente').val();
        if(documentoCliente.length > 4){
            completarCliente( '' , documentoCliente);
        }
    });

    $("#documentoCliente").on("keydown", function(event) {
        if (event.key === "Enter") {
            documentoCliente = $('#documentoCliente').val();
            if(documentoCliente.length > 4){
                completarCliente( '' , documentoCliente);
            }
        }
    });

    //Autocomplete producto
    $("#remisionNombreProducto").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "autocompleteNombreProducto",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            completarProducto(ui.item.value)
            return false;  
        }
    });

    //Autocomplete cliente
    $("#documentoCliente").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "autocompletedocumento",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            completarCliente(ui.item.value)
            return false;  
        }
    });

    $('#btn-guardar-producto-remision').click(function(event) {
        event.preventDefault();

        let nombreProducto = $('#remisionNombreProducto').val();
        let cantidadProducto = $('#remisionCantidadProducto').val();
        let precioProducto = $('#remisionPrecioProducto').val();
        let subtotalProducto = $('#remisionSubtotalProducto').val();

        if(nombreProducto && cantidadProducto && precioProducto) {
            let producto = {
                nombre: nombreProducto,
                cantidad: cantidadProducto,
                precio: precioProducto,
                subtotal: subtotalProducto
            };

            productosArray.push(producto);
            actualizarTablaProductos();
            limpiarCamposProducto();
        } else {
            alert('Por favor, complete todos los campos obligatorios.');
        }
    });
});

function limpiarCamposProducto() {
    $('#remisionNombreProducto').val('');
    $('#remisionCantidadProducto').val('');
    $('#remisionPrecioProducto').val('');
    $('#remisionSubtotalProducto').val('');
}

function actualizarTablaProductos() {
    let tabla = $('#tablaProductosAgregados tbody');
    tabla.empty();

    productosArray.forEach((producto, index) => {
        tabla.append(`
            <tr>
                <td>${index + 1}</td>
                <td>${producto.nombre}</td>
                <td>${producto.cantidad}</td>
                <td>${producto.precio}</td>
                <td>${producto.subtotal}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button>
                </td>
            </tr>
        `);
    });
}

function eliminarProducto(index) {
    productosArray.splice(index, 1);
    actualizarTablaProductos();
}

function calcularSubtotal() {
    let cantidad = parseFloat($('#remisionCantidadProducto').val());
    let precioUnitario = parseFloat($('#remisionPrecioProducto').val().replace(/,/g, '').replace(/\./g, ''));

    if (!isNaN(cantidad) && !isNaN(precioUnitario)) {
        let subtotal = cantidad * precioUnitario;
        $('#remisionSubtotalProducto').val(subtotal.toLocaleString('es-ES'));
    } else {
        $('#remisionSubtotalProducto').val('');
    }
}

function completarCliente(id , documentoCliente = null){

    showpreloader();
    $.ajax({
        url: "consultarCliente",
        dataType: "json",
        type: 'POST',
        data: {
            id: id,
            documento : documentoCliente
        },
        success: function(data) {
            hidepreloader();
            let cliente = data.data[0];
            if(cliente){
                $('#documentoCliente').val(cliente.cliente_documento)
                $('#nombreCliente').val(cliente.cliente_nombres)
                $('#correoCliente').val(cliente.cliente_correo)
                $('#direccionCliente').val(cliente.cliente_direccion)
                $('#celularCliente').val(cliente.cliente_celular)
                $('#telefonoCliente').val(cliente.cliente_telefono)
            }else{
                Swal.fire({
                    icon: 'warning',
                    title : 'Registrar Cliente',
                    text: 'No se encontro registros con el numero de cedula digitado.',
                    timer: 1200,
                    showConfirmButton: false
                  })
                $('#nombreCliente').val('')
                $('#correoCliente').val('')
                $('#direccionCliente').val('')
                $('#celularCliente').val('')
                $('#telefonoCliente').val('')
            }

        },error: function(error){
            hidepreloader();
        }
    });
}

function completarProducto(id){

    showpreloader();
    $.ajax({
        url: "getProductoId",
        dataType: "json",
        data: {
            id: id
        },
        success: function(resp) {
            hidepreloader();
            let producto = resp.data;
            if(producto){
                let nombreProd = producto.nombre + ' - ' + producto.marca + ' - ' + producto.modelo
                $('#remisionNombreProducto').val(nombreProd)
                $("#remisionNombreProducto").prop('disabled', true);
                $("#remisionCantidadProducto").prop('disabled', false);
                $("#remisionPrecioProducto").prop('disabled', false);

            }else{
                Swal.fire({
                    icon: 'warning',
                    title : 'Registrar Cliente',
                    text: 'No se encontro registros.',
                    timer: 1200,
                    showConfirmButton: false
                  })
                $('#remisionNombreProducto').val('')
                $('#remisionCantidadProducto').val('')
                $('#remisionPrecioProducto').val('')
            }

        },error: function(error){
            hidepreloader();
        }
    });
}

function loadTableBuscarProducto(){

    // Destruir la tabla existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tablaBuscarProductos')) {
        $('#tablaBuscarProductos').DataTable().destroy();
    }
    // Inicializar DataTables con configuraciones básicas
    var table = $('#tablaBuscarProductos').DataTable({
    
        responsive: true,
        "language": idioma_espanol,
        ajax: {
            url: 'getproductos',
            dataSrc: 'data' 
        },
        columns: [
            { 
                data: null,
                render: function(data, type, row, meta) {
                    return  (meta.row + 1);
                }
            },
            { data: 'nombre' },
            { data: 'nombre_categoria' },
            { data: 'marca' },
            { data: 'modelo' },
            { data: 'estado' },
            { data: 'cantidad_stock' },
            { 
                data: 'precio',
                render: function(data, type, row) {
                    return new Intl.NumberFormat().format(data);
                }
            },  
            { 
                data: 'precio_compra',
                render: function(data, type, row) {
                    return new Intl.NumberFormat().format(data);
                }
            },
            { data: 'codigo_barras' }
            
        ],
        rowCallback: function(row, data) {
            $(row).on('click', function() {
                handleRowClickProducto(data.id);
            });
        }
    });
}

function handleRowClickProducto(id){
    completarProducto(id)
    $('#modalBuscarProducto').modal('hide');
}

function loadTableBuscarCliente(){
    // Destruir la tabla existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#tablaBuscarClientes')) {
        $('#tablaBuscarClientes').DataTable().destroy();
    }
    // Inicializar DataTables con configuraciones básicas
    var table = $('#tablaBuscarClientes').DataTable({
    
        responsive: true,
        "language": idioma_espanol,
        ajax: {
            url: 'consultarCliente',
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
            { data: 'cliente_documento' },
            { data: 'cliente_nombres' },
            { data: 'cliente_direccion' },
            { data: 'cliente_correo' },
            { data: 'cliente_celular' }
            
        ],
        rowCallback: function(row, data) {
            $(row).on('click', function() {
                handleRowClickCliente(data.cliente_id);
            });
        }
    });

}


function handleRowClickCliente(id){
    completarCliente(id , '')
    $('#modalBuscarCliente').modal('hide');
}