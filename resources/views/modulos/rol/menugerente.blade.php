<aside class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">



    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                MENU GERENTE
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
                <a href="{{ url('buscar_orden_servicio') }}">
                    <i class="pe-7s-search"></i>
                    <p>BUSCAR ORDEN</p>
                </a>
            </li>

            <li @if (Request::url() == route('parametros')) class="active" @endif>
                <a href="{{ url('parametros') }}">
                    <i class="pe-7s-tools"></i>
                    <p>SERVICIOS</p>
                </a>
            </li>
            <li @if (Request::url() == route('requerimientos')) class="active" @endif>
                <a href="{{ url('requerimiento') }}">
                    <i class="pe-7s-note"></i>
                    <p>REQUERIMIENTO INTERNO</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-news-paper"></i>
                    <p>INFORMES</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-add-user"></i>
                    <p>EMPLEADOS</p>
                </a>
            </li>
            <li @if (Request::url() == route('privacidad')) class="active" @endif>
                <a href="">
                    <i class="pe-7s-lock"></i>
                    <p>PRIVACIDAD</p>
                </a>
            </li>

        </ul>
    </div>
</aside>

