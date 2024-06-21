@extends('plantilla')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
@endsection
@section('content')
<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style=" color: #ffffff ; padding-bottom :10px;">
                        <strong>CAJA</strong>
                </div>
            </div>
            <div class="card">

                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-12">



                            <div style="" class="btn-group btn-group-justified" onchange="javascript:showContent()" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnMovimiento" autocomplete="off">
                                <label class="btn btn-outline-secondary arrays " for="btnMovimiento" style="font-size: 15.5px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Movimientos</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnInforme" autocomplete="off">
                                <label class="btn btn-outline-secondary arrays" for="btnInforme" style="font-size: 15.5px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Informes</label>

                            </div>
                            <hr>
                            {{-- informe--}}

                            <div id="informe" style="display: none">
                                <div class="content">
                                    <div class="row">

                                        <div class="col-md-5">

                                            <label>Fecha Inicial</label>
                                            <input value="{{ \Carbon\Carbon::now()->toDateString() }}" type="date" id="fechaInicial" name="fechaInicial" class="form-control" placeholder="" autocomplete="off">

                                        </div>

                                        <div class="col-md-5">
                                            <label>Fecha Final</label>
                                            <input value="{{ \Carbon\Carbon::now()->toDateString() }}" type="date" id="fechaFinal" name="fechaFinal" class="form-control" placeholder="" autocomplete="off">
                                        </div>

                                        <div class="col-md-2">

                                            <button title="Guardar" data-toggle="tooltip" id="btn-buscar" type="button" class="btn btn-primary btn-fill ">
                                                <span style="font-size: 16px">Buscar</span>
                                            </button>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">

                                        <div class="col-md-5">
                                            <b>Fechas de Busqueda: </b> <span id="fecha-busqueda"> </span>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><b  id="total-busqueda">Total Busqueda</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div>
                                                        <b>Efectivo $ <span id="efectivo-busqueda"></span></b>
                                                    </div>
                                                    <div>
                                                        <b>Transferencia: $ <span id="transferencia-busqueda"></span></b>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3  class="panel-title"><b id="total-historico">Total Historico</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div>
                                                        <b>Efectivo: $ <span id="efectivo-historico"></span></b>
                                                    </div>
                                                    <div>
                                                        <b>Transferencia: $ <span id="transferencia-historico"></span></b>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="panel panel-warning">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><b>Ingreso</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <b>$ <span id="ingreso"></span></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><b>Salida</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <b>$ <span id="egreso"></span></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><b>Total</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <b>$ <span id="total"></span></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" id="exportarExcel">Exportar a Excel</button>

                                    <table class="table" id="miTabla" class="display">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Valor</th>
                                                <th>Pago</th>
                                                <th>Descripcion</th>
                                                <th style="width: 8%;"># orden</th>
                                                <!-- Agrega más columnas según tus datos -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Los datos se llenarán aquí dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- movimientos--}}
                            <div id="movimientos" style="display: none">

                                <div class="card " style="box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2)">


                                    <div class="header" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1">
                                        <p style="font-size: 15px; font-family: Verdana, Geneva, Tahoma, sans-serif; color: #1C2833; text-align: center; font-size: 14px"> <strong> INGRESO/EGRESO </strong></p>
                                    </div>
                                    <div class="content">


                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select style="appearance:none;" class="js-example-basic js-states form-control" name="tipo" id="tipo">
                                                        <option selected value="">-</option>
                                                        <option value="ingreso">INGRESO</option>
                                                        <option value="salida">SALIDA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Valor</label>
                                                    <input oninput="formatoSeparadorMil(this)" type="text" id="valor" name="valor" class="form-control" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Metodo Pago</label>
                                                    <select style="appearance:none;" class="js-example-basic js-states form-control" name="metodo_pago" id="metodo_pago">
                                                        <option selected value="">-</option>
                                                        <option value="efectivo">EFECTIVO</option>
                                                        <option value="transferencia">TRANSFERENCIA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Descripcion</label>

                                                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" required autocomplete="off" style="text-transform: uppercase">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Nro. Orden</label>

                                                    <input type="text" class="form-control" name="numero_orden" id="numero_orden" placeholder="" required autocomplete="off">

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button  modal -->
                                        <button title="Guardar" data-toggle="tooltip" id="btn-guardar" data-placement="bottom" style=" border: none;  margin: 10px" type="button" class="btn btn-primary btn-fill  pull-right " onclick="showModal()">
                                            <span style="font-size: 16px">Guardar</span>
                                        </button>


                                        <div class="clearfix"></div>


                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    @endsection

    @section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{!! url('js/caja.js?v=1.1') !!}"></script>

    @endsection