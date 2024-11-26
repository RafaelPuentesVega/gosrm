
var productosArray = [];
var clienteId = '';
var productoId = '';
var baseURL = '';
$(document).ready(function() {
    baseURL = getUrlBase();
    fieldRequired();//agregar * a los campos obligatorios

    //abrir modal producto
    $('#btnAbrirBuscarProducto').on('click', function() {
        loadTableBuscarProducto()
        $('#modalBuscarProducto').modal('show');
    });

    //abrir modal crear cliente
    $('#btn-agregar-cliente').on('click', function() {
        $('#modalBuscarCliente').modal('hide');
        $('#modalCrearCliente').modal('show');
    });


    //abrir modal crear cliente
    $('#btn-agregar-producto').on('click', function() {
        $('#modalBuscarProducto').modal('hide');
        $('#modalAgregarProducto').modal('show');
    });

    //guardar remision
    $('#btn-guardar-remision').on('click', function() {
        guardarRemision(event);
    });
    //abrir modal cliente
    $('#btnAbrirBuscarCliente').on('click', function() {
        loadTableBuscarCliente()
        $('#modalBuscarCliente').modal('show');
    });

    //abrir formulario vista remisiones
    $('#btn-abrir-frm-remisiones').on('click', function() {
        window.location.href = 'remisiones/listar';

    });

        
    $("#documentoCliente").on("blur", function() {
        documentoCliente = $('#documentoCliente').val();
        if(documentoCliente.length > 4){
            completarCliente( '' , documentoCliente);
        }
    });
    //crear cliente
    $('#btn-modal-crear-cliente').on('click', function() {
        guardarClienteModal();
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
                url: baseURL+"/autocompleteNombreProducto",
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
        let precioProducto = $('#remisionPrecioProducto').val().replace(/,/g, '').replace(/\./g, '');
        let subtotalProducto = $('#remisionSubtotalProducto').val().replace(/,/g, '').replace(/\./g, '');
        let idProducto = $('#idProducto').val();

        if(nombreProducto && cantidadProducto && precioProducto) {
            let producto = {
                nombre: nombreProducto,
                cantidad: cantidadProducto,
                precio: precioProducto,
                subtotal: subtotalProducto,
                id : idProducto
            };

            productosArray.push(producto);
            actualizarTablaProductos();
            limpiarCamposProducto();
        } else {
            Swal.fire({
                icon: 'warning',
                text: 'Por favor, complete todos los campos obligatorios.',
                timer: 1200,
                showConfirmButton: false
              })
        }
    });
});

function limpiarCamposProducto() {
    $('#remisionNombreProducto').val('');
    $('#remisionCantidadProducto').val('');
    $('#remisionPrecioProducto').val('');
    $('#remisionSubtotalProducto').val('');
    $('#idproducto').val('');
}

function actualizarTablaProductos() {
    let tabla = $('#tablaProductosAgregados tbody');
    tabla.empty();

    let total = 0;

    productosArray.forEach((producto, index) => {
        tabla.append(`
            <tr style="cursor: default">
                <td>${index + 1}</td>
                <td>${producto.nombre}</td>
                <td>${producto.cantidad}</td>
                <td>${formatoPreciovalorNumero(producto.precio)}</td>
                <td>${formatoPreciovalorNumero(producto.subtotal)}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button>
                </td>
            </tr>
        `);
        total += parseInt(producto.subtotal);
    });

    tabla.append(`
        <tr style="cursor: default">
            <td colspan="4" class="text-right"><strong>Total:</strong></td>
            <td><strong>${formatoPreciovalorNumero(total)}</strong></td>
            <td></td>
        </tr>
    `);
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
                clienteId = cliente.cliente_id;

            }else{
                clienteId = '';
                Swal.fire({
                title: "Desea crear nuevo cliente?",
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
                limpiardatosclienteRemision();
            }

        },error: function(error){
            hidepreloader();
        }
    });
}

function completarProducto(id){

    showpreloader();
    $.ajax({
        url: baseURL+"/getProductoId",
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
                $('#idProducto').val(producto.id)
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
            url: baseURL+'/getproductos',
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

function guardarClienteModal(){

    event.preventDefault();
    let correoCliente = $('#correoClienteModal').val();
    if (!validarCorreo(correoCliente)) {
        Swal.fire({
            icon: 'warning',
            text: 'Formato de correo no valido.',
            timer: 2500,
            showConfirmButton: false
          })
        return;
    }
    var formData = $('#formCrearCliente').serialize();

    showpreloader();
    var rutaActual = window.location.href;

    $.ajax({
        type: "POST",
        url: "crearCliente",
        data: formData ,
        success: function(data) { 
            hidepreloader();

            if(data.success){
                $('#modalCrearCliente').modal('hide');
                
                completarCliente(data.data.id)

            }

            let iconf = data.success ? 'success' : 'error';
            Swal.fire({
                icon: iconf,
                html: '<b><i>' + data.message + '</i></b> ',
                timer: 2500,
                showConfirmButton: false
            });
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
            hidepreloader();
        }
    });
}

/*   
guardar remision
*/
function guardarRemision(){
    let cliente = clienteId;

    var formulario = $('#formDatosRemision');


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
    if (cliente == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Por favor, Seleccione un cliente.',
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
    Swal.fire({
        title: 'Selecciona las opciones para notificar al cliente',
        html: `
        <div style="text-align: left;">
        <label>
            <input type="checkbox" id="whatsappOption">
            <i class="fab fa-whatsapp" style="color: #25d366;"></i> WhatsApp
        </label>
        </div>`,
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
          const whatsapp = document.getElementById('whatsappOption').checked;
          return { whatsapp };
        }
      }).then((result) => {
        if (result.isConfirmed) {
          showpreloader();
          // Usa los resultados seleccionados
          const { whatsapp } = result.value;
          whatsappQuestion = whatsapp ? 'SI' : 'NO';
      
          let tipoPago =     $('#tipoPagoPedido').val(); 
    
          // Crear el objeto de datos
          let data = {
              cliente: cliente,
              productos: productos,
              precioTotal: parseInt(precioTotal),
              tipoPago: tipoPago,
              whatsappQuestion : whatsappQuestion
          };
          $.ajax({
              type: "POST",
              url: "guardarRemision",
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
                      limpiarDatosRemision()
                      window.open ('imprimir_remision/'+ data.idremision,"remision","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );
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
      });


}
function limpiardatosclienteRemision(){
    $('#nombreCliente').val('')
    $('#correoCliente').val('')
    $('#direccionCliente').val('')
    $('#celularCliente').val('')
    $('#telefonoCliente').val('')
    clienteId = '';
}
function limpiarDatosRemision(){
    productosArray = [];
    actualizarTablaProductos();
    limpiarCamposProducto();
    limpiardatosclienteRemision();
}