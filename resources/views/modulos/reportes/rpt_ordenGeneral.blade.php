
    <html>

        <head>
            {{-- <title>Orden de ingreso</title> --}}
         {{-- <style>
                table,
                tr,
                td,
                th {
                    border: 1px solid black;
                    word-wrap: break-word;
                    font-family: Verdana;
                }

                table {
                    border-collapse: collapse;
                    table-layout: fixed;
                    /* font-style: courier, arial;
                    font-family: 'Inconsolata', monospace; */
                }
                .fuente {

                    font-family: 'Verdana', sans-serif; */

                }

            </style> --}}
        </head>

        <body >
<table class="table">
    <thead>

        <tr>
            <th colspan="28">generado: {{date('Y-m-d H:i:s')}}</th>
       </tr>
        <tr>
            <th style="text-align: center; font-size: 12px; font-family: Verdana ; color: blue; font-weight: bold" colspan="28">REPORTE CONSOLIDADO - ORDEN GENERAL</th>
       </tr>
        <tr>
             <th>{{-- Valor vacio--}} </th>
            <th  colspan="5" style="font-weight: bold; height: 30px; text-align: center">Datos fechas</th>
            <th colspan="7" style="font-weight: bold;height: 30px;text-align: center">Datos Cliente</th>
            <th colspan="4" style=" font-weight: bold;height: 30px;text-align: center">Datos Equipo</th>
            <th colspan="6" style="font-weight: bold;height: 30px;text-align: center">Datos Orden</th>
            <th colspan="5" style="font-weight: bold;height: 30px;text-align: center">Precios</th>

        </tr>
        <tr style="font-weight: bold">
            <th style="" >N° Orden</th>
            <th style="">Fecha de ingreso</th>
            <th>Fecha Estimada</th>
            <th>Fecha de Diagnostico</th>
            <th>Fecha de Reparacion</th>
            <th>Fecha de Entrega</th>
            <th>Tipo Cliente</th>
            <th>Numero Documento Cliente</th>
            <th>Nombre Cliente</th>
            <th>Correo Cliente</th>
            <th>Direccion Cliente</th>
            <th>Celular Cliente</th>
            <th>Telefono Cliente</th>
            <th>Tipo Equipo</th>
            <th>Marca Equipo</th>
            <th>Referencia Equipo</th>
            <th>Serial Equipo</th>
            <th>Servicio</th>
            <th>Caracteristicas Fisicas</th>
            <th>Descripcion daño</th>
            <th>Garantia</th>
            <th>Contrato</th>
            <th>Tecnico</th>
            <th>Valor Servicio</th>
            <th>Iva Servicio</th>
            <th>Valor Repuestos</th>
            <th>Valor Total</th>
            <th>Numero Factura</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $data)
        <tr>
            <td>{{ $data->id_orden }}</td>
            <td>{{ $data->fecha_creacion_orden }}</td>
            <td>{{ $data->fecha_estimada_orden }}</td>
            <td>{{ $data->fecha_diagnostico_orden }}</td>
            <td>{{ $data->fecha_reparacion_orden }}</td>
            <td>{{ $data->fecha_entrega_orden }}</td>

            <td>{{ $data->cliente_tipo }}</td>
            <td>{{ $data->cliente_documento }}</td>
            <td>{{ $data->cliente_nombres }}</td>
            <td>{{ $data->cliente_correo }}</td>
            <td>{{ $data->cliente_direccion }}</td>
            <td>{{ $data->cliente_celular }}</td>
            <td>{{ $data->cliente_telefono }}</td>

            <td>{{ $data->equipo_tipo }}</td>
            <td>{{ $data->equipo_marca }}</td>
            <td>{{ $data->equipo_referencia }}</td>
            <td>{{ $data->equipo_serial }}</td>

            <td>{{ $data->servicio_orden }}</td>
            <td>{{ $data->caracteristicas_equipo_orden }}</td>
            <td>{{ $data->descripcion_dano_orden }}</td>
            <td>{{ $data->garantia_orden }}</td>
            <td>{{ $data->contrato_orden }}</td>
            <td>{{ $data->name }}</td>

            <td>{{ $data->valor_servicio_orden }}</td>
            <td>{{ $data->iva_orden }}</td>
            <td>{{ $data->valor_repuestos_orden }}</td>
            <td>{{ $data->valor_total_orden }}</td>
            <td >{{ $data->factura_numero_orden }}</td>

                @switch($data->estadoOrden)
                    @case(1)
                    @if($data->fecha_estimada_orden <= date('Y-m-d H:i:s'))
                    <td style="background-color: red">Vencida</td>
                    @else
                    <td >Reparacion</td>
                    @endif
                        @break
                    @case(2)
                    <td style="background-color: green">Lista Para Entrega</td>
                        @break
                    @case(3)
                    <td >Entregada</td>
                    @break
                    @default
                    <td>Desconocido</td>
                @endswitch

        </tr>
    @endforeach
    </tbody>
</table>


</body>
</html>

