@extends('plantilla')
@section('content')
@section('css')
<link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
{{-- <link rel="stylesheet" type="text/css" href="{!! url('fontawesome/css/fontawesome.min.css') !!}"/> --}}
<style>
            select,input {
            border-radius: 10rem !important;
            height: 4rem !important;
            padding: 1.5rem 1.5rem !important;
        }
</style>
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">


            <div class="container-fluid">
                <div class="card "  >
                    <div class="header" style="background-color: #06419f">
                        <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>PARAMETROS</strong></h3>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-15">

                        <form action="" method="post">
                            @csrf

                            <div style="box-shadow: 0 0 20px 4px #0000001f;border-radius: 15px" class="card ">


                                <div class="header">
                                <h3 class="title text-center"><strong>SERVICIOS</strong></h3>
                                </div>
                                <div class="content">

                                        <div class="row" >

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: bold" >SERVICIO</label>
                                                    <input type="text" id="parametro" class="form-control" name="nombre_servicio" placeholder="Servicio"  required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label style="font-weight: bold" >&nbsp;</label>

                                                    <button  type="submits" title="Guardar Servicio" data-toggle="tooltip" data-placement="left"  class="btn btn-success btn-fill  " id="btnGuardarServicio" >
                                                        Agregar
                                                    </button>


                                                    <div class="clearfix"></div>

                                                </div>
                                            </div>

                                        </div>


                                </div>
                                @if (session()->has('message'))

                                <div style="font-weight: bold" class=" text-center alert alert-{{ session('alert') }}" role="alert">
                                    {{ session('message') }}
                                </div>
                                @endif
                                <br>

                                <table style="box-shadow: 0 0 20px 4px #0000001f;" id="clients" class="table table-striped"
                                style="
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead  class="thead-light">
                                      <tr>

                                            <th scope="col" class="text-center" style="font-weight: bold; font-size: 16px; color:#16172C"><strong>#</strong></th>
                                            <th scope="col" class="text-center" style="font-weight: bold; font-size: 16px;color:#16172C"><strong>SERVICIO</strong></th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ( $servicios as  $servicio)



                                         <tr style="height: 55px">
                                            <td class="text-center">{{ $servicio->id_servicio}}</td>
                                            <td class="text-center">{{ $servicio->nombre_servicio}}</td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@section('js')

    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>





    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
             $('#clients').DataTable({
                 responsive: true,
                 autoWidth: false,
                 lengthMenu:[[100,50,10,5,-1],[100,50,10,5,"Todos"]],
                 "language": idioma_espanol
             });
             $('.dataTables_filter input[type="search"]').
            attr('class','form-control').
            css({'width':'340px','display':'inline-block','position':'left'});
            $('.dataTables_length select').
            attr('class','form-control').
            css({'width':'60px','display':'inline-block','position':'relative'});
        } );

    </script>

@endsection

@endsection
