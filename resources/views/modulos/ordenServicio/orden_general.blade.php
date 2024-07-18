@extends('plantilla')
@section('content')
@section('css')
    <link href="{!! url('assets/js/toastr.min.css" rel="stylesheet') !!}" />
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="{!! url('bootstrap/bootstrap.css" rel="stylesheet') !!}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto:ital@1&display=swap" rel="stylesheet"> --}}
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body>
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;">
                                        <strong>ORDEN GENERAL</strong>
                                    </h3>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="container-fluid">
                                            <div class="row ">

                                                <div class="col-md-15">
                                                    <button style="border: none;width: 100%"
                                                        class="btn btn-close collapsed " role="button"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <p style="font-size: 14px" class="panel-title">
                                                                B&Uacute;SQUEDA AVANZADA
                                                            </p>
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapseOne"
                                            @if ($dataRequest['estado'] ||
                                                $dataRequest['idTecnico'] ||
                                                $dataRequest['requestFechainicioentrega'] ||
                                                $dataRequest['requestFechainicio'] ||
                                                $dataRequest['serial'] ||
                                                $dataRequest['nombres'] ||
                                                $dataRequest['numOrden'] ||
                                                $dataRequest['cedula']) class="panel-collapse"
                                            @else
                                            class="panel-collapse collapse" @endif
                                            role="tabpanel" aria-expanded="false" aria-labelledby="headingOne">
                                            <div style="padding: 0px" class="panel-body">
                                                <div class="content">
                                                    <div class="row ">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">N° Orden</label>
                                                                <input type="number" id="numero_orden"
                                                                    name="numero_orden" class="number form-control"
                                                                    placeholder="N° Orden" autocomplete="off"
                                                                    @if ($dataRequest['numOrden']) focus value="{{ $dataRequest['numOrden'] }}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 ">
                                                            <div class="form-group">
                                                                <label>Cedula Cliente</label>
                                                                <input type="number" class="numberCedula form-control"
                                                                    name="cedula_cliente" id="cedula_cliente"
                                                                    placeholder="Cedula Cliente" style="focus"
                                                                    @if ($dataRequest['cedula']) focus value="{{ $dataRequest['cedula'] }}" @endif
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <div class="form-group">
                                                                <label>Nombres Cliente</label>
                                                                <input type="text"
                                                                    @if ($dataRequest['nombres']) value="{{ $dataRequest['nombres'] }}" @endif
                                                                    class="nombreCliente form-control"
                                                                    name="nombre_cliente" id="nombre_cliente"
                                                                    placeholder="Nombre Cliente" required
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 ">
                                                            <div class="form-group">
                                                                <label>SERIAL EQUIPO</label>
                                                                <input
                                                                    @if ($dataRequest['serial']) value="{{ $dataRequest['serial'] }}" @endif
                                                                    type="text" class="serial form-control"
                                                                    name="serial" id="serial" placeholder="Serial"
                                                                    required autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row ">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha de ingreso</label>
                                                                <input type="text" id="fecha_ingreso"
                                                                    name="fecha_ingreso"
                                                                    @if ($dataRequest['requestFechafin']) value="{{ $dataRequest['requestFechainicio'] }} - {{ $dataRequest['requestFechafin'] }}"
                                                                     @else style="display:none" value="{{ date('m/01/Y') }} - {{ date('m/01/Y') }}" @endif
                                                                    class="form-control" placeholder="Fecha de ingreso"
                                                                    autocomplete="off">
                                                                <input
                                                                    @if ($dataRequest['requestFechafin']) style="display:none" @endif
                                                                    onclick="clicklblfechaingreso()" type="text"
                                                                    id="fecha_ingreso_lbl"
                                                                    class="fecha_ingreso_lbl form-control"
                                                                    placeholder="Rango de fecha" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha de entrega</label>
                                                                <input
                                                                    @if ($dataRequest['requestFechainicioentrega']) value="{{ $dataRequest['requestFechainicioentrega'] }} - {{ $dataRequest['requestFechafinentrega'] }}"
                                                                 @else style="display:none" value="{{ date('m/01/Y') }} - {{ date('m/01/Y') }}" @endif
                                                                    type="text" id="fecha_entrega"
                                                                    name="fecha_entrega" class="form-control"
                                                                    placeholder="Fecha de ingreso" autocomplete="off">
                                                                <input
                                                                    @if ($dataRequest['requestFechafinentrega']) style="display:none" @endif
                                                                    onclick="clicklblfechaentrega()" type="text"
                                                                    id="fecha_entrega_lbl"
                                                                    class="fecha_entrega_lbl form-control"
                                                                    placeholder="Rango de fecha" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tecnico</label>
                                                                <select placeholder="Rango de fecha"
                                                                    class="js-example-basic js-states form-control"
                                                                    name="selectTecnico" id="selectTecnico">
                                                                    <option value=></option>
                                                                    @foreach ($tecnico as $Tecnico)
                                                                        <option value="{{ $Tecnico->id }}"
                                                                            @if ($dataRequest['idTecnico'] == $Tecnico->id) selected @endif>
                                                                            {{ $Tecnico->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select class="js-example-basic js-states form-control"
                                                                    name="selectEstado" id="selectEstado" required>
                                                                    <option value=''></option>
                                                                    <option
                                                                        @if ($dataRequest['estado'] == '5') selected @endif
                                                                        value='5'>Reparacion</option>
                                                                    <option
                                                                        @if ($dataRequest['estado'] == '1') selected @endif
                                                                        value='1'>Entregada</option>
                                                                    <option
                                                                        @if ($dataRequest['estado'] == '2') selected @endif
                                                                        value='2'>Pendiente de facturar</option>
                                                                    <option
                                                                        @if ($dataRequest['estado'] == '3') selected @endif
                                                                        value='3'>Lista Para Entregar</option>
                                                                    <option
                                                                        @if ($dataRequest['estado'] == '4') selected @endif
                                                                        value='4'>Vencidas</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-1 ">
                                                            <div class="form-group">
                                                                <label>Buscar</label>
                                                                <button class="btn btn-success">BUSCAR</button>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        @if ($dataRequest['estado'] ||
                            $dataRequest['idTecnico'] ||
                            $dataRequest['requestFechainicioentrega'] ||
                            $dataRequest['requestFechainicio'] ||
                            $dataRequest['serial'] ||
                            $dataRequest['nombres'] ||
                            $dataRequest['numOrden'] ||
                            $dataRequest['cedula']) style="display: block"
                        @else style="display: none" @endif>
                        <div style="display: block ;background-color: #d1e7dd;color: #0c5460"
                            class="alert alert-primary" role="alert">
                            <label style="margin: 0%" for=""> <strong> <strong>{{ $totalCount }} </strong>
                                    Resultados de </strong>
                                @if ($dataRequest['estado'] && $dataRequest['idTecnico'])
                                    <br> Estado:
                                    @switch($dataRequest['estado'])
                                        @case(1)
                                            Entregada
                                        @break

                                        @case(2)
                                            Pendiente de facturar
                                        @break

                                        @case(3)
                                            Lista para entregar
                                        @break

                                        @case(4)
                                            Vencidas
                                        @break

                                        @case(5)
                                            Reparacion
                                        @break

                                        @default
                                    @endswitch
                                    </strong><br>Tecnico: </strong>
                                    @foreach ($tecnico as $Tecnico)
                                        @if ($dataRequest['idTecnico'] == $Tecnico->id)
                                            {{ $Tecnico->name }}
                                        @endif
                                    @endforeach
                                @elseif($dataRequest['estado'])
                                    <br> Estado:
                                    @switch($dataRequest['estado'])
                                        @case(1)
                                            Entregada
                                        @break

                                        @case(2)
                                            Pendiente de facturar
                                        @break

                                        @case(3)
                                            Lista para entregar
                                        @break

                                        @case(4)
                                            Vencidas
                                        @break

                                        @case(5)
                                            Reparacion
                                        @break

                                        @default
                                    @endswitch
                                @elseif($dataRequest['idTecnico'])
                                    </strong><br>Tecnico: </strong>
                                    @foreach ($tecnico as $Tecnico)
                                        @if ($dataRequest['idTecnico'] == $Tecnico->id)
                                            {{ $Tecnico->name }}
                                        @endif
                                    @endforeach
                                @endif
                                @if ($dataRequest['requestFechainicioentrega'])
                                    </strong><br>Fecha de Entrega: </strong>
                                    {{ date('d-M-Y', strtotime($dataRequest['requestFechainicioentrega'])) }} - al -
                                    {{ date('d-M-Y', strtotime($dataRequest['requestFechafinentrega'])) }}
                                @endif
                                @if ($dataRequest['requestFechafin'])
                                    </strong><br>Fecha de Ingreso: </strong>
                                    {{ date('d M Y', strtotime($dataRequest['requestFechainicio'])) }} - al -
                                    {{ date('d M Y', strtotime($dataRequest['requestFechafin'])) }}
                                @endif
                                @if ($dataRequest['serial'])
                                    </strong><br>Serial Equipo: </strong>
                                    {{ $dataRequest['serial'] }}
                                @endif
                                @if ($dataRequest['nombres'])
                                    </strong><br>Nombre Cliente: </strong>
                                    {{ $dataRequest['nombres'] }}
                                @endif
                                @if ($dataRequest['cedula'])
                                    </strong><br>Cedula Cliente: </strong>
                                    {{ $dataRequest['cedula'] }}
                                @endif

                                @if ($dataRequest['numOrden'])
                                    </strong><br>Numero de Orden: </strong>
                                    {{ $dataRequest['numOrden'] }}
                                @endif
                            </label>
                            <br>
                            <button onclick="limpiarFiltro()" style="text-align: right; padding: 5px"
                                class="btn btn-primary">Limpiar</button>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-11">
                        </div>
                        <div class="col-md-1">
                            <button onclick="exportExcel('excel')" style="border-inline: none" data-toggle="tooltip"
                                title="Exportar a Excel" class="btn btn-success"><i
                                    style="font-size: 20px; padding: 0px; margin: -3px"
                                    class="fas fa-file-excel"></i></button>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-md-8">
                            <label>Mostrar
                                <select style="width: 66px; display: inline-block; position: relative;"
                                    class="paginate form-control" name="paginate" id="paginate">
                                    <option @if ($numpaginate == 10) selected @endif value="10">10
                                    </option>
                                    <option @if ($numpaginate == 20) selected @endif value="20">20
                                    </option>
                                    <option @if ($numpaginate == 50) selected @endif value="50">50
                                    </option>
                                    <option @if ($numpaginate == 100) selected @endif value="100">100
                                    </option>
                                    <option @if ($numpaginate > 100) selected @endif value="all">
                                        Todos</option>

                                </select>
                                Registros
                            </label>

                        </div>
                        <div class="col-md-4">
                            <p style="text-align: right; font-size: 12px">
                                Mostrando @if ($numpaginate < $totalCount)
                                    {{ $numpaginate }}
                                @else
                                    {{ $totalCount }}
                                @endif de <strong>{{ $totalCount }} </strong>
                                registros</p>
                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="table-responsive-xl">
                            <table class="table table-hover"
                                style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="8%"
                                            style=" font-size: 12px ;font-weight:normal; text-align: center ">
                                            &nbsp;<strong>N° Orden </strong>

                                        </th>
                                        <th width="9%"
                                            style="font-size: 12px ; font-weight:normal;text-align: rigth">
                                            &nbsp;<strong>Fecha <br> Ingreso</strong>

                                        </th>

                                        <th width="10%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Cedula</strong>

                                        </th>
                                        <th width="24%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Cliente </strong>

                                        </th>
                                        <th width="20%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Equipo</strong>

                                        </th>
                                        <th width="20%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Tecnico</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 11px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Valor Servicio</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>IVA</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Valor Total</strong>

                                        </th>
                                        <th width="3%"
                                            style="font-size: 10px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Numero <br> Factura</strong>

                                        </th>
                                        <th width="3%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: left">
                                            <strong>Estado Orden</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenServicio as $OrdenServicio)
                                        <tr onclick="window.location.href='ordenGeneral/{{ encrypt($OrdenServicio->id_orden) }}'" style="cursor: pointer;background-color: #ffffff7e">
                                            {{-- <tr style="background-color: #ffffff7e" > --}}


                                            <th
                                                style="height: 55px;font-size: 16px ; text-align: center ">
                                                <strong>{{ $OrdenServicio->id_orden }}</strong>

                                            </th>
                                            <th
                                                style="font-size: 12px ; font-weight:normal;text-align: left">
                                                <strong>{{ date('Y-m-d h:i:s a', strtotime($OrdenServicio->fecha_creacion_orden)) }}</strong>

                                            </th>

                                            <th
                                                style="font-size: 12px ;font-weight:normal; text-align: left ">
                                                <strong>{{ $OrdenServicio->cliente_documento }}</strong>

                                            </th>

                                            <th
                                                style="font-size: 11px ; font-weight:normal;text-align: left">

                                                <strong>{{ $OrdenServicio->cliente_nombres }}</strong>

                                            </th>
                                            <th
                                                style="font-size: 11px ;font-weight:normal;  text-align: left">
                                                <strong>{{ $OrdenServicio->equipo_tipo }}-
                                                    {{ $OrdenServicio->equipo_marca }} -
                                                    {{ $OrdenServicio->equipo_referencia }}</strong>
                                            </th>
                                            <th
                                                style="font-size: 11px ;font-weight:normal; text-align: left ">
                                                <strong>{{ $OrdenServicio->name }}</strong>
                                            </th>
                                            <th
                                                style="font-size: 14px ;font-weight:normal; text-align: left ">
                                                <strong>${{ number_format($OrdenServicio->valor_servicio_orden, 0, ',', '.') }}</strong>
                                            </th>
                                            <th
                                                style="font-size: 14px ; font-weight:normal;text-align: left">
                                                <strong>
                                                    ${{ number_format($OrdenServicio->iva_orden, 0, ',', '.') }}</strong>

                                            </th>
                                            <th
                                                style="font-size: 14px ; font-weight:normal;text-align: left">
                                                <strong>${{ number_format($OrdenServicio->valor_total_orden, 0, ',', '.') }}</strong>
                                            </th>

                                            @if ($OrdenServicio->factura_numero_orden || $OrdenServicio->estadoOrden != 3)
                                                <th class="text-center" width="6%"
                                                    onclick="window.location.href='ordenGeneral/{{ encrypt($OrdenServicio->id_orden) }}'"
                                                    style="font-size: 13px ; font-weight:normal;text-align: left">
                                                    <strong>{{ $OrdenServicio->factura_numero_orden }}</strong>
                                                </th>
                                            @else
                                                <th width="6%" class="text-center" onclick="event.stopPropagation();"
                                                    style="cursor: default; font-size: 13px ; font-weight:normal;text-align: left">
                                                    <i onclick="modalAgregarFactura({{ $OrdenServicio->id_orden }})"
                                                        style="cursor: pointer; font-size: 19px; color: gray"
                                                        class="style fas fa-file-invoice"></i>
                                                </th>
                                            @endif

                                            <th onclick="window.location.href='ordenGeneral/{{ encrypt($OrdenServicio->id_orden) }}'"
                                                style="font-size: 12px ;font-weight:normal;  text-align: center">

                                                @if ($OrdenServicio->fecha_estimada_orden <= date('Y-m-d H:i:s') && $OrdenServicio->estadoOrden == 1)
                                                    {{-- {{-- ORDEN VENCIDA --}}
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-danger">Vencida</span>
                                                @elseif($OrdenServicio->estadoOrden == 1)
                                                    {{-- {{-- ORDEN RECIEN INGRESO --}}
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-info">Reparacion</span>
                                                @elseif($OrdenServicio->estadoOrden == 2)
                                                    {{-- {{-- ORDEN LISTA PARA ENTREGAR --}}
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-success">Lista Para
                                                        Entregar</span>
                                                @elseif($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null)
                                                    {{-- {{-- ORDEN ENTREGADA SIN FACTURA --}}
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-warning">Facturacion</span>
                                                @elseif($OrdenServicio->estadoOrden == 3)
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-primary">Entregada</span>
                                                    {{-- {{-- ORDEN ENTREGADA --}}
                                                @elseif($OrdenServicio->estadoOrden == 4)
                                                <spa
                                                    class="badge badge-pill" style="float: left; background-color: #7057A2 !important">Bodega</span>
                                                    {{-- {{-- ORDEN EN BODEGA --}}
                                                @endif
                                            </th>

                                        <tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-5">
                            <p style="font-size: 12px">
                                Mostrando @if ($numpaginate < $totalCount)
                                    {{ $numpaginate }}
                                @else
                                    {{ $totalCount }}
                                @endif de <strong>{{ $totalCount }} </strong>
                                registros</p>
                        </div>
                        <div class="col-md-7">
                            <div style="align-content: center;margin: 0%" class="pagination pagination-sm">
                                {{ $ordenServicio->withQueryString()->links() }}
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
</div>
@include('modulos.ordenServicio.modal.mdlAgregarNumeroFactura-OG')

@section('js')
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="{!! url('assets/js/toastr.min.js') !!}"></script>
    <script src="{!! url('js/ordenGeneralFiltro.js') !!}"></script>
    <script src="{!! url('js/facturaNumero.js?v=1') !!}"></script>
    <script src="{!! url('js/moment.min.js') !!}"></script>
    <script src="{!! url('js/daterangepicker.min.js') !!}"></script>
    <script>
        function exportExcel(btn) {

            showpreloader();
            const exportar = btn
            var URLactual = window.location;
            var arrayUrl = URLactual.toString().split('&');
            var QuestionArrayUrl = URLactual.toString().split('?');
            posicion = arrayUrl.length - 1;
            questionpaginate = arrayUrl[posicion].toString().split('=');
            if (questionpaginate[0] == 'export') {
                var res = '';
                //Validacion para colocar paginate despues de un filtro
                for (i = 0; i < posicion; i++) {
                    if (i > 0) {
                        res = res + '&' + arrayUrl[i];
                    } else {
                        res = res + arrayUrl[i];
                    }
                }
                location.href = res + '&export=' + exportar;

            } else if (QuestionArrayUrl.length == 1) {
                location.href = '?export=' + exportar;
            } else {
                location.href = URLactual + '&export=' + exportar;
            }
            setTimeout(hidepreloader, 1500);

        }
    </script>
@endsection


@endsection
