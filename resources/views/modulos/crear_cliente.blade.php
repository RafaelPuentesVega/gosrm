@extends('plantilla')
@section('content')
@section('css')
<link href="{!! url('bootstrap/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
<link href="{!! url('assets/js/toastr.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

    <div class="wrapper">

        <div class="main-panel">

            <div class="content">


                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-15">

                            {{-- <form action="" method="post">
                                @csrf --}}

                                <div class="card ">


                                    <div class="header">
                                        <h3 class="title text-center"><strong>CREAR CLIENTE</strong></h3>
                                    </div>
                                    {{-- <div class="content">

                                        <div class="row" required>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">CLIENTE</label>
                                                    <select class="js-example-basic-multiple js-states form-control" name="cliente_tipo" id="departamentoSelect" required>
                                                        <option value="">Seleccionar...</option>
                                                        <option value="Persona">Persona</option>
                                                        <option value="Empresa">Empresa</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Cedula / Nit</label>
                                                    <input type="text"  class="form-control" name="cliente_documento" placeholder="Numero Documento" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Nombres</label>
                                                    <input type="text" class="form-control" name="cliente_nombres" placeholder="Nombres"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >CORREO</label>
                                                    <input type="email" class="form-control" name="cliente_correo" placeholder="Correo Electronico" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DIRECCION</label>
                                                    <input type="text" class="form-control" name="cliente_direccion" placeholder="Dirección" required >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >CELULAR</label>
                                                    <input type="number" class="form-control" name="cliente_celular" placeholder="Celular" required maxlength="6" required>
                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">TELEFONO</label>
                                                    <input type="number" class="form-control" name="cliente_telefono" placeholder="Telefono" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">DEPARTAMENTO</label>
                                                    <select class="js-example-basic-multiple js-states form-control" name="departamento_id" id="departamentoSelect" required>
                                                        <option value="">Seleccionar...</option>
                                                        @foreach ($departamentos as $departamento)

                                                        <option value="{{ $departamento->departamento_id }}">{{$departamento->departamento_nombre}}</option>


                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">MUNICIPIO</label>

                                                    <select class="js-example-basic-multiple js-states form-control" name="municipio_id" id="municipioSelect" required>
                                                        <option value="">Seleccionar...</option>
                                                        @foreach ($municipios as $municipio)

                                                        <option value="{{ $municipio->municipio_id }}" @if ($municipio->$departamento === $municipio->municipio_id) selected='selected' @endif >

                                                            {{$municipio->municipio_nombre}}
                                                        </option>


                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DEPENDENCIA</label>
                                                    <input type="text" class="form-control" name="cliente_dependencia_empresa" placeholder="Dependencia" >
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>USUARIO</label>
                                                    <input type="text" class="form-control" name="cliente_usuario_empresa" placeholder="Usuaario Encargado" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>CELULAR USUARIO</label>
                                                    <input type="number" class="form-control" name="cliente_celular_usuario" placeholder="Celular Usuario">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" style="margin: 10px" class="btn btn-success btn-fill pull-right">CREAR</button>

                                        <a href="clientes">
                                            <button type="button" style="margin: 10px" class="btn btn-dark btn-fill pull-right">VOLVER</button>

                                        </a>


                                        <div class="clearfix"></div>


                                </div> --}}
                                    <div class="content">
                                        {{-- <form action="/plataforma/public/crear_orden_servicio" method="post">
                                        @csrf --}}

                                        <div class="row" required>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">TIPO CLIENTE</label>
                                                    <select class="js-example-basic js-states form-control"
                                                        name="cliente_tipo" onchange="change(this)" id="tipocliente"
                                                        required>
                                                        <option value=>Seleccionar...</option>
                                                        <option value="PERSONA">PERSONA</option>
                                                        <option value="EMPRESA">EMPRESA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Cedula / Nit</label>
                                                    <input type="number" id="cliente_documento" name="cliente_documento"
                                                        class="form-control" placeholder="Numero Documento"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombres</label>
                                                    <input type="text" class="form-control" name="cliente_nombres"
                                                        id="cliente_nombres" placeholder="Nombres" required
                                                        autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>CORREO</label>
                                                    <input type="email" class="form-control" name="cliente_correo"
                                                        id="cliente_correo" placeholder="Correo Electronico" required
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DIRECCION</label>
                                                    <input type="text" class="form-control" name="cliente_direccion"
                                                        id="cliente_direccion" placeholder="Dirección" required
                                                        autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>CELULAR</label>
                                                    <input type="phone" maxlength="10" class="form-control"
                                                        name="cliente_celular" id="cliente_celular" placeholder="Celular"
                                                        required autocomplete="off">
                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">TELEFONO</label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                        name="cliente_telefono" id="cliente_telefono" placeholder="Telefono"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">DEPARTAMENTO</label>
                                                    <select class="js-example-basic js-states form-control"
                                                        name="departamento_id" onclick="consultarMunicipio()"
                                                        id="departamentoSelect" autocomplete="off">
                                                        <option value="13">HUILA</option>
                                                        @foreach ($departamentos as $departamento)
                                                            <option value="{{ $departamento->departamento_id }}">
                                                                {{ $departamento->departamento_nombre }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>



                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">MUNICIPIO</label>
                                                    <div id="response-container">
                                                        <select class="js-example-basic js-states form-control"
                                                            name="municipio_id" id="municipioSelect" autocomplete="off">
                                                            <option value=""> Seleccionar..</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button  modal -->
                                        {{-- <button title="BUSCAR"
                                            style="border: none; outline:none; text-decoration: none; margin: 10px"
                                            type="button" class="btn btn-info btn-fill btn-round pull-right "
                                            data-toggle="modal" data-target="#md-agregarusuario">
                                            <i style="color: #ffffff; font-size: 17px" class="bi bi-search "></i>
                                            <span>Buscar Cliente</span>
                                        </button> --}}

                                        <div id="btn-update">
                                            <button title="GUARDAR"
                                                style="border: none; outline:none; text-decoration: none; margin: 10px"
                                                type="button" class="btn btn-success btn-fill  btn-round pull-right "
                                                id="btnGuardarCliente" onclick="guardarCliente()">
                                                <i style="color: #ffffff; font-size: 17px" class="bi bi-save pull-left"></i>
                                                <span style="margin-left: 5px"> Guardar Cliente</span>
                                            </button>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="row" id="empresas" hidden>
                                            <hr
                                                style=" border: none; border-bottom: 1px solid rgba(161, 156, 156, 0.473); font-size: 1%">

                                            <div class="col-md-12" id="ClienteEmpresa">


                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DEPENDENCIA</label>
                                                    <input type="text" class="form-control"
                                                        name="cliente_dependencia_empresa" id="cliente_dependencia_empresa"
                                                        placeholder="Dependencia" autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>USUARIO</label>
                                                    <input type="text" class="form-control" name="cliente_usuario_empresa"
                                                        id="cliente_usuario_empresa" placeholder="Usuario Encargado"
                                                        autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>CELULAR USUARIO</label>
                                                    <input type="text" class="form-control" maxlength="10"
                                                        name="cliente_celular_usuario" id="cliente_celular_usuario"
                                                        placeholder="Celular Usuario" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 12px">Agregar</label>
                                                    <div class="btn-save">
                                                        <button title="GUARDAR"
                                                            style="margin-left: 15%; margin: -5px; border: none; outline:none; text-decoration: none"
                                                            type="submits" class="btn btn-success btn-fill  btn-round "
                                                            id="btnGuardarEmpresa" onclick="guardarUsuarioEmpresa()">
                                                            <i style="color: #ffffff; font-size: 21px; margin: -5px"
                                                                class="bi bi-plus box-info pull-left"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('modulos.modal_buscar_cliente') --}}

@section('js')
    <script src="{!! url('js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{!! url('js/cliente_crear.js"></script>
    <script src="{!! url('assets/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@endsection
