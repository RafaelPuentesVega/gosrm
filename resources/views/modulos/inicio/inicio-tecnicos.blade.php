@extends('plantilla')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="{!! url('iniciocss/bootstrap.css') !!}" rel="stylesheet" />
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">


@endsection
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <body style="background-color:rgba(233, 233, 233, 0.295);">

            <div class="grey-bg container-fluid" onload="alert();">
                <section id="minimal-statistics">



                        @if(auth()->user()->rol == 'Administrativo' || auth()->user()->rol == 'Gerente')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">TECNICO</label>
                                    <select class="js-example-basic-multiple js-states form-control" id="tecnicoSelect" required>
                                                <option >-SELECCIONAR-</option>
                                                @foreach ($user as $users)
                                                <option value="{{ $users->name }}">{{$users->name}}</option>
                                                @endforeach
                                    </select>
                                    </div>
                            </div>
                        </div>
                        @endif

                        <div class="logo  " style="text-align: center">
                            <br>
                            <h1 style="color: rgb(28, 28, 61)"> <strong>Gestión Órdenes de Servicio</strong></h1>
                            <br>

                            <img class="img-circle" style="border-image: 15px" src="{!! url('assets/img/myAvatar.png') !!}"   height="180" >
                            <div class="row">
                                <div class="col-12 mt-3 mb-1" style="text-align: center">
                                    <p class="">{{ auth()->user()->name }}</p>

                                </div>
                            </div>
                        </div>
                    <br><br><br>


                    <div class="row" style="justify-content: center">

                        <div class="col-md-3 ">
                            <a>

                                <div class="card" onclick="vencidas()" style="border: #ffffff">
                                    <div class="card-content">


                                        <div class="card-body" >

                                            <div class="media d-flex" >

                                                <div class="media-body  text-left" >
                                                    <h1  style="color: red; font-family: 'Aref Ruqaa', serif;">
                                                        <strong  style="font-size: 33px">
                                                        {{$tamañoVencidas}}
                                                        </strong>
                                                    </h1>
                                                    <br>

                                                    <h1 style="font-family: 'Aref Ruqaa', serif;"><strong>VENCIDAS</strong></h1>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="icon-direction danger font-large-5 float-left"></i>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <hr style="margin: 0%; border: none; border-bottom: 4px solid rgba(255, 0, 0, 0.705); font-size: 1%">
                                </div>
                            </a>

                        </div>

                        <div class="col-md-3  ">
                            <a>
                                <div class="card" onclick="vigentes()" style="border: #ffffff ">

                                    <div class="card-content">
                                        <div class="card-body" style="text-align: center">
                                            <div class="media d-flex">

                                                <div class="media-body  text-left">
                                                    <h1 style="color: green; font-family: 'Aref Ruqaa', serif;">
                                                    <strong style="font-size: 33px">
                                                       {{$tamañovigentes}}
                                                    </strong>
                                                    </h1>
                                                    <br>

                                                    <h1 style="font-family: 'Aref Ruqaa', serif;"><strong>VIGENTES</strong></h1>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="icon-graph success  font-large-5 float-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin: 0%; border: none; border-bottom: 4px solid rgba(0, 128, 0, 0.685); font-size: 1%">
                                </div>
                            </a>
                        </div>

                    </div>

                    <div id="vencidas-table" style="display: none;">
                        <div style="text-align: center">
                            <label style=" color: red; font-size: 20px"> <strong>VENCIDAS </strong></label>
                        </div>
                        <div class="table-responsive-xl">

                            <table class="table table-striped table-hover" >
                                <thead class="thead-light">
                                    <tr class="table-danger">

                                        <th scope="col" width="7%" class="text-center"><label> Orden N° </label>
                                        <th scope="col" width="13%" class="text-center"><label>Fecha Ingreso</label></th>
                                        <th scope="col" width="13%" class="text-center"><label>Fecha Vencimiento</label></th>
                                        <th scope="col" width="40%" class="text-center"><label>Cliente</label></th>
                                        <th scope="col" width="10%" class="text-center"><label>Celular</label></th>
                                        <th scope="col" width="25%" class="text-center"><label>Equipo</label></th>
                                        <th scope="col" width="5%" class="text-center"></th>

                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($vencidas as $vencida)
                                    <tr style="font-size: 12px">
                                        @if($vencida != null)
                                            <td class="text-center" style="font-size: 15px; height: 60px"> <strong> {{ $vencida['id_orden']}}</strong></td>
                                            <td class="text-center"><strong> {{ $vencida['fecha_creacion_orden']}}</strong></td>
                                            <td class="text-center"><strong> {{ $vencida['fecha_estimada_orden']}}</strong></td>
                                            <td class="text-center"><strong>{{ $vencida['cliente_documento']}} - {{ $vencida['cliente_nombres']}}</strong></td>
                                            <td class="text-center"><strong> {{ $vencida['cliente_celular']}}</strong></td>
                                            <td class="text-center"><strong> {{ $vencida['equipo_marca']}} - {{ $vencida['equipo_referencia']}}</strong></td>

                                            <td>
                                                <a href="{{ url('editarorden', encrypt($vencida['id_orden']) ) }}">
                                                    <button style="border: none; outline:none; text-decoration: none; margin: -5px" type="button" title="Editar Orden" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >
                                                        <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-pencil-fill box-info pull-left"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div id="vigentes-table" style="display: none;">
                        <div style="text-align: center">
                            <label style=" color: green; font-size: 20px"> <strong>VIGENTES </strong></label>
                        </div>
                        <div class="table-responsive-xl">
                            <table class="table table-striped table-hover">
                                <thead  class="thead-light">
                                    <tr  class="table-success">

                                        <th scope="col" width="7%" class="text-center"><label> Orden N° </label>
                                        <th scope="col" width="13%" class="text-center"><label>Fecha Ingreso</label></th>
                                        <th scope="col" width="13%" class="text-center"><label>Fecha Vencimiento</label></th>
                                        <th scope="col" width="40%" class="text-center"><label>Cliente</label></th>
                                        <th scope="col" width="10%" class="text-center"><label>Celular</label></th>
                                        <th scope="col" width="25%" class="text-center"><label>Equipo</label></th>
                                        <th scope="col" width="5%" class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vigentes as $vigente)
                                    @if($vigente != null)
                                    <tr style="font-size: 12px ; height: 60px "  >
                                        <td class="text-center" style="font-size: 15px"> <strong> {{ $vigente['id_orden']}}</strong></td>
                                        <td class="text-center"><strong> {{ $vigente['fecha_creacion_orden']}}</strong></td>
                                        <td class="text-center"><strong> {{ $vigente['fecha_estimada_orden']}}</strong></td>
                                        <td class="text-center"><strong>{{ $vigente['cliente_documento']}} - {{ $vigente['cliente_nombres']}}</strong></td>
                                        <td class="text-center"><strong> {{ $vigente['cliente_celular']}}</strong></td>
                                        <td class="text-center"><strong> {{ $vigente['equipo_marca']}} - {{ $vigente['equipo_referencia']}}</strong></td>

                                        <td>
                                            <a href="{{ url('editarorden', encrypt($vigente['id_orden'])) }}">
                                                <button title="Editar" style="border: none; outline:none; text-decoration: none; margin: -5px" type="submits" class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >
                                                    <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-pencil-fill box-info pull-left"></i>
                                                </button>

                                            <a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="row" style="justify-content: center">
                        <div id="piechart_3d" style="border-top-left-radius: 0.5rem;width: 500px; height: 310px"></div>
                    </div>


                </section>
            </div>
        </div>



    </div>




    </div>
    </div>
@section('js')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

    ordenesVigentes = "<?= json_encode($tamañovigentes) ?>";
    ordenesVencidas = "<?= json_encode($tamañoVencidas) ?>";
    ordenesListas = "<?= json_encode($tamañoListas) ?>";
    //Parse int
    ordenesVigentes = parseInt(ordenesVigentes);
    ordenesVencidas = parseInt(ordenesVencidas);
    ordenesListas = parseInt(ordenesListas);

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    //alert(ordenesListas);
    function drawChart() {

        if(ordenesVencidas == 0 && ordenesVigentes == 0 && ordenesListas == 0 ){
            //No imprimimos nada
        }else{
            var data = google.visualization.arrayToDataTable([
        ['orden', 'historia de ordenes'],
        [ordenesVigentes+' Vigentes' , ordenesVigentes ],
        [ordenesVencidas+' Vencidas', ordenesVencidas],
        [ordenesListas+ ' Lista para entrega',  ordenesListas]
        ]);
        var options = {

        is3D: true,
        colors:['green','red' , '#F5B041'],
        chartArea:{left:20,top:50,width:'100%',height:'100%'},
        backgroundColor: '#FBFCFF' ,
        fontName : 'Verdana',
        fontSize : '13',
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        }

  }
</script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="{!! url('assets/js/toastr.min.js') !!}"></script>

    <script src="{!! url('js/inicio.js') !!}"></script>
    <script>
        function codeAddress() {
            toastr["success"]("<h4>{{ auth()->user()->name }}::{{ auth()->user()->rol }} </h4>",
                " <h2> BIENVENIDO </h2>")
        }
        window.onload = codeAddress;
    </script>



@endsection
@endsection
