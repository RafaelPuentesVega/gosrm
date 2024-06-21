@extends('plantilla')
@section('content')
@section('css')
<link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
<link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card "  >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>CLIENTES</strong></h3>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">


                            <div class="table-responsive-xl">
                                <table id="clients" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr  >
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CLIENTE</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Documento</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>NOMBRES</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CORREO</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CELULAR</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>TELEFONO</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $cliente)



                                            <tr style="font-size: 12px;height: 50px">


                                            <td class="text-center"><strong>{{ $cliente->cliente_tipo}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_documento}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_nombres}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_correo}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_celular}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_telefono}}</strong></td>
                                            <td>
                                                <a href="{{ url('clienteEdit', encrypt($cliente->cliente_id) ) }}">
                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de cliente" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente"  >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-lines-fill box-info pull-left"></i>
                                                </button>
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{!! url('js/cliente.js') !!}"></script>
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

      })
    </script>





    <script>
        $(document).ready(function() {
             $('#clients').DataTable({
                 responsive: true,
                 autoWidth: false,
                 lengthMenu:[[10,50,100,5,-1],[10,50,100,5,"Todos"]],
                 "language": idioma_espanol

             });
             $('.dataTables_filter input[type="search"]').
            attr('class','form-control').
            css({'width':'340px','display':'inline-block','position':'left'});
            $('.dataTables_length select').
            attr('class','form-control').
            css({'width':'54px','display':'inline-block','position':'relative'});
        } );

    </script>

@endsection
@endsection



