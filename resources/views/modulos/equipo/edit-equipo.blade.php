@extends('plantilla')
@section('content')
@section('css')
    <link href="{!! url('fontawesome/css/all.css" rel="stylesheet') !!}" />


    <link href="{!! url('assets/js/toastr.min.css" rel="stylesheet') !!}" />
    <link href="{!! url('bootstrap/bootstrap.css" rel="stylesheet') !!}" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <style type="text/css">
        .card label {
            color: black;
            font-weight: bold
        }
    </style>
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style=" color: #ffffff ; padding-bottom :10px;">
                        <strong>EQUIPO</strong>
                    </h3>
                </div>
            </div>

            <div class="card">
                <form class="form-update-equipo" id="form-update-equipo" action="{{ route('actualizarEquipo', $dataEquipo->equipo_id) }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="content">
                                    <div class="row" required>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color: black; font-weight: bold"
                                                    for="">EQUIPO</label>
                                                <input value="{{ $dataEquipo->equipo_tipo }}" type="text"
                                                    id="equipo_tipo" name="equipo_tipo" class="form-control"
                                                    placeholder="Equipo" autocomplete="off" required
                                                    style="text-transform: uppercase"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>MARCA</label>
                                                <input value="{{ $dataEquipo->equipo_marca }}" type="text"
                                                    id="equipo_marca" name="equipo_marca" class="form-control"
                                                    placeholder="Marca" autocomplete="off" required
                                                    style="text-transform: uppercase"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>REFERENCIA</label>
                                                    <input type="text" value="{{ $dataEquipo->equipo_referencia }} "
                                                        class="form-control" name="equipo_referencia"
                                                        id="equipo_referencia" placeholder="Referencia" required
                                                        autocomplete="off" style="text-transform: uppercase"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>SERIAL</label>
                                                    <input value="{{ $dataEquipo->equipo_serial }}" type="text"
                                                        class="form-control" name="equipo_serial" id="equipo_serial"
                                                        placeholder="Serial" disabled autocomplete="off">
                                            </div>
                                        </div>
                                    </div>


                                    <div id="btn-update">
                                        <button title="GUARDAR" type="button"
                                            style="padding: 5px;border: none; outline:none; text-decoration: none; margin: 10px"
                                             class="updateEquipo btn btn-info  pull-right " id="btnActualizarEquipo">
                                            <i style="font-size: 18px" class="fas fa-edit"></i>
                                            <span style="font-size: 16px; margin-block-start: 15%">Actualizar</span>
                                        </button>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">



                        <div style="" class="btn-group btn-group-justified" onchange="javascript:showContent()"
                            role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnEquipo" autocomplete="off">
                            <label class="btn btn-outline-secondary arrays " for="btnEquipo"
                                style="font-size: 15.5px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Cliente</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnOrden" autocomplete="off">
                            <label class="btn btn-outline-secondary arrays" for="btnOrden"
                                style="font-size: 15.5px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Orden
                                de servicio</label>


                        </div>
                        <hr>
                        <br><br>
                        {{-- Tabla Orden Servicio --}}

                        <div class="table-responsive-xl" id="ordenServicio" style="display: none">
                            <table id="tableOrdenServicio" class="table table-hover"
                                style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Orden
                                                N°</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Fecha
                                                Ingreso</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Fecha
                                                Entrega</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Equipo</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Tecnico</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Valor
                                                total</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrayOrden as $orden)
                                        <tr style="cursor: pointer; font-size: 11px"
                                            onclick="window.location.href='../ordenGeneral/{{ encrypt($orden->id_orden) }}'"
                                            style="font-size: 12px;height: 50px">


                                            <td class="text-center" style="font-size: 18px">
                                                <strong>{{ $orden->id_orden }}</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong>{{ $orden->fecha_creacion_orden }}</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong>{{ $orden->fecha_entrega_orden }}</strong>
                                            </td>
                                            <td class="text-center"><strong>{{ $orden->equipo_tipo }} -
                                                    {{ $orden->equipo_marca }} -
                                                    {{ $orden->equipo_referencia }}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->name }}</strong></td>
                                            <td class="text-center"><strong>
                                                    @if (!isset($orden->valor_total_orden))
                                                        {{-- Vacio --}}
                                                    @else
                                                        ${{ number_format($orden->valor_total_orden, 0, ',', '.') }}
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Tabla Cliente --}}
                        <div class="table-responsive-xl" id="equipoCliente" style="display: none">
                            <table id="tableEquipoCliente" class="table table-striped table-hover"
                                style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Cliente</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Documento</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Nombres</strong>
                                        </th>
                                        <th scope="col" class="text-center" style="color:#16172C">
                                            <strong>Celular</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="cursor: pointer; font-size: 12px;height: 50px"
                                    onclick="window.location.href='../clienteEdit/{{ encrypt($arrayCliente->cliente_id) }}'">


                                        <td class="text-center">
                                            <strong>{{ $arrayCliente->cliente_tipo }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{ $arrayCliente->cliente_documento }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{ $arrayCliente->cliente_nombres }}</strong>
                                        </td>

                                        <td class="text-center">
                                            <strong>{{ $arrayCliente->cliente_celular }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{!! url('js/editCliente.js') !!}"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

        })
        $(document).on("click",  ".updateEquipo", function() {
        Swal.fire({
        title: 'Seguro desea guardar los cambios?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Actualizar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            $( "#form-update-equipo" ).submit();
        }
        })
        })


    </script>
@endsection
@endsection
