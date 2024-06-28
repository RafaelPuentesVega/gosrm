$(document).ready(function() {
    loadTableProducto();    
});

function loadTableProducto(){

        // Destruir la tabla existente si ya está inicializada
        if ($.fn.DataTable.isDataTable('#tablaProductos')) {
            $('#tablaProductos').DataTable().destroy();
        }
        // Inicializar DataTables con configuraciones básicas
        var table = $('#tablaProductos').DataTable({
        
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
                        // Formatear el precio con decimales de mil
                        return new Intl.NumberFormat().format(data);
                    }
                },
                { data: 'proveedor' },   
                { 
                    data: 'precio_compra',
                    render: function(data, type, row) {
                        return new Intl.NumberFormat().format(data);
                    }
                },
                { data: 'codigo_barras' },   
            ]
        });
}
