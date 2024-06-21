@extends('plantilla')
@section('content')
@section('css')
    <link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet" />
    <style>
        input,
        select,
        option {
            border-radius: 10rem !important;
            height: 4rem !important;
            padding: 1.5rem 1.5rem !important;
        }
    </style>
@endsection
<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>USUARIOS</strong>
                    </h3>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="content">

                                <div class="card-body">
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
                                                                    AGREGAR USUARIO
                                                                </p>
                                                            </div>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" aria-labelledby="headingOne">


                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="row">

                                                    <div class="col-md-7">
                                                        <label for="name"
                                                            class="">{{ __('NOMBRE COMPLETO') }}</label>
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}" required
                                                            autocomplete="off" autofocus
                                                            onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">

                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="phone" class="">{{ __('CELULAR') }}</label>
                                                        <input id="celular" type="number" minlength="10" maxlength="10"
                                                            class="form-control" name="celular"
                                                            value="{{ old('celular') }}" required autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="email" class="">{{ __('CARGO') }}</label>
                                                        <select class="js-example-basic js-states form-control"
                                                            value="{{ old('rol') }}" name="rol" id="rol"
                                                            required>
                                                            <option value="">Seleccionar...</option>
                                                            <option value="TECNICO">TECNICO</option>
                                                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email"
                                                            class="">{{ __('CORREO ELECTRONICO') }}</label>
                                                        <input style="text-transform: lowercase" autocomplete="none-email" id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required
                                                            autocomplete="off"
                                                            onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toLowerCase()">


                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label for="password"
                                                            class="">{{ __('Contraseña') }}</label>
                                                        <input id="password" type="password" minlength="8"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="off">
                                                        <p
                                                            style="margin: 0%; font-size: 11px; color: rgba(109, 108, 108, 0.747)">
                                                            Contraseña con minimo 8 caracteres</p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="password-confirm"
                                                            class="">{{ __('Confirmar contraseña') }}</label>
                                                        <input id="password-confirm" minlength="8" type="password"
                                                            class="form-control" name="password_confirmation" required
                                                            autocomplete="off">
                                                    </div>
                                                </div>



                                                <div class="row ">
                                                    <div class="text-right col-md-12 offset-md-4">
                                                        <button type="submit" id="btn-registerUser" class="btn btn-primary">
                                                            {{ __('REGISTRAR') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('name')
                        <div style="font-weight: bold" class=" text-center alert alert-danger" role="alert">
                            <strong>Ocurrio un error en el nombre</strong>
                         </div>
                        @enderror
                        @error('password')
                        <div style="font-weight: bold" class=" text-center alert alert-danger" role="alert">
                            <strong>Contraseñas no coinciden</strong>
                         </div>
                        @enderror

                        @error('email')
                        <div style="font-weight: bold" class=" text-center alert alert-danger" role="alert">
                                <strong>Correo ya registrado</strong>
                        </div>
                        @enderror
                        @if (session()->has('message'))

                        <div style="font-weight: bold" class=" text-center alert alert-{{ session('alert') }}" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <table id="funcionarios" class="table table-striped table-hover"
                            style="webkit-font-smoothing: antialiased;
                                   font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                            <thead class="thead-light">
                                <tr style="font-size: 50px;">

                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>NOMBRE</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>CORREO</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>TELEFONO</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>CARGO</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>REGISTRADO</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>ESTADO</strong>
                                    </th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                        <strong>ULTIMO LOGIN</strong></th>
                                    <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuario as $usuarios)
                                    <tr style="height: 50px">
                                        <td width="20%" class="text-center">{{ $usuarios->name  }}</td>
                                        <td width="20%" class="text-center">{{ $usuarios->email }}
                                        </td>
                                        <td width="7%" class="text-center">{{ $usuarios->telefono }}</td>
                                        <td width="10%" class="text-center">{{ $usuarios->rol }}</td>
                                        <td width="10%" class="text-center">{{ $usuarios->created_at }}</td>
                                        @if ($usuarios->state == 1)
                                            <td width="10%" class="text-center">ACTIVO</td>
                                        @else
                                            <td width="10%" class="text-center">INACTIVO</td>
                                        @endif

                                        <td width="10%" class="text-center">{{ $usuarios->last_login }}</td>

                                        <td width="5%">

                                            <button data-toggle="tooltip" onclick="consultarUsuario({{$usuarios->id}})"
                                                style="border: none; outline:none; text-decoration: none; margin: 0%"
                                                type="button" title="Editar Usuario"
                                                data-placement="left"
                                                class="btn btn-info btn-fill btn-round  pull-right "
                                                id="btneditarUsuario">
                                                <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                    class="bi bi-person-circle box-info pull-left"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -
        </div>
    </div>
</div>
</div>
</div>
</div>
@include('modulos.privacidad.mdEditarPrivacidad')
@section('js')
    <script src="{!! url('js/privacidad.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script>



    </script>
@endsection
@endsection
