@section('css')
<link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
<link href="{!! url('assets/css/light-bootstrap-dashboard.css?v=1.4.0') !!}" rel="stylesheet"/>

<link href="{!! url('assets/css/animate.min.css') !!}" rel="stylesheet"/>
<link href="{!! url('assets/css/pe-icon-7-stroke.css') !!}" rel='stylesheet' type='text/css'>


@endsection






 <aside class="sidebar" data-color="azure" data-image="{!! url('assets/img/sidebar-refill.jpg') !!}">



    <div class="sidebar-wrapper" >
        <div class="logo" >
            <a href="{{url('inicio')}}" class="simple-text" >
                <img src="{!! url('assets/img/logo-refill.png') !!}" style="    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.651))" width="140" height="60" >
            </a>
        </div>

        <ul class="nav">
            <li @if (Request::url() == route('home')) class="active" @endif >
                <a href="{{url('inicio')}}">
                    <i class="pe-7s-mail"></i>
                    <p>BANDEJA DE ENTRADA</p>
                </a>
            </li>
            <li  @if (Request::url() == route('orden')) class="active" @endif>
                <a href="{{ url('crear_orden_servicio') }}">
                    <i class="pe-7s-note2"></i>
                    <p>CREAR ORDEN</p>
                </a>
            </li>
            <li @if (Request::url() == route('clientes')) class="active" @endif>
                <a href="{{ url('clientes') }}">
                    <i class="pe-7s-users"></i>
                    <p>CLIENTES</p>
                </a>
            </li>
            <li @if (Request::url() == route('equipos')) class="active" @endif>
                <a href="{{ url('equipos') }}">
                    <i class="pe-7s-monitor"></i>
                    <p>EQUIPOS</p>
                </a>
            </li>
            <li @if (Request::url() == route('searchOrden')) class="active" @endif>
                <a href="{{ url('orden_salida') }}">
                    <i class="pe-7s-search"></i>
                    <p>Orden General</p>
                </a>
            </li>
            {{-- <li @if (Request::url() == route('privacidad')) class="active" @endif>
                <a href="{{ url('privacidad') }}">
                    <i class="pe-7s-lock"></i>
                    <p>PRIVACIDAD</p>
                </a>
            </li> --}}
            <li @if (Request::url() == route('privacidad')) class="active" @endif>
                <a href="{{ url('privacidad') }}">
                    <i class="pe-7s-add-user"></i>
                    <p>USUARIOS</p>
                </a>
            </li>


        </ul>
    </div>
</aside>

