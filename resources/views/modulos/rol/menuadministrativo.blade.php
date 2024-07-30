
 @section('css')
 <link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
 <link href="{!! url('assets/css/light-bootstrap-dashboard.css?v=1.4.0') !!}" rel="stylesheet"/>

 <link href="{!! url('assets/css/animate.min.css') !!}" rel="stylesheet"/>
 <link href="{!! url('assets/css/pe-icon-7-stroke.css') !!}" rel='stylesheet' type='text/css'>


 @endsection






 <aside class="sidebar"   data-image="{!! url('assets/img/sidebar-refill.jpg') !!}">


     <div class="sidebar-wrapper" style="background: linear-gradient(45deg, rgb(47, 99, 184) 0%, rgb(114, 86, 156) 50%, rgb(1, 58, 114) 100%);">
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
             <li @if (Request::url() == route('home-tecnico')) class="active" @endif >
                <a href="{{url('inicio-tecnico')}}">
                    <i class="pe-7s-tools"></i>
                    <p>ORDENES TECNICOS</p>
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
           <li @if (Request::url() == route('requerimientos')) class="active" @endif>

                 <a href="{{ url('requerimiento') }}">
                     <i class="pe-7s-note"></i>
                     <p>
                    @if($countRequerimiento <> 0)
                    <span style="float: right; font-size: 14px" class=" top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        {{$countRequerimiento}}
                    </span>
                    @endif
                     REQUERIMIENTO INTERNO</p>
                 </a>
             </li>
             <li @if (Request::url() == route('parametros')) class="active" @endif>
                 <a href="{{ url('parametros') }}">
                     <i class="pe-7s-config"></i>
                     <p>PARAMETROS</p>
                 </a>
             </li>
             <li @if (Request::url() == route('productos')) class="active" @endif>
                <a href="{{ url('productos') }}">
                    <i class="pe-7s-headphones"></i>
                    <p>PRODUCTOS</p>
                </a>
            </li>
            <li @if (Request::url() == route('remisiones')) class="active" @endif>
                <a href="{{ url('remisiones') }}">
                    <i class="pe-7s-cash"></i>
                    <p>REMISIONES</p>
                </a>
            </li>
            <li @if (Request::url() == route('caja')) class="active" @endif>
                <a href="{{ url('caja') }}">
                    <i class="pe-7s-calculator"></i>
                    <p>CAJA</p>
                </a>
            </li>
            <li @if (Request::url() == route('pedidos_proveedores')) class="active" @endif>
                <a href="{{ url('pedidos_proveedores') }}">
                    <i class="pe-7s-display2"></i>
                    <p>PEDIDOS</p>
                </a>
            </li>
            <li @if (Request::url() == route('correos')) class="active" @endif>
                <a href="{{ url('correos') }}">
                    <i class="pe-7s-mail-open-file"></i>
                    <p>PLANTILLAS CORREO</p>
                </a>
            </li>
             <li @if (Request::url() == route('informes')) class="active" @endif>
                <a href="{{ url('informes') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>INFORMES</p>
                </a>
            </li>
            <li @if (Request::url() == route('privacidad')) class="active" @endif>
                <a href="{{ url('privacidad') }}">
                    <i class="pe-7s-add-user"></i>
                    <p>USUARIOS</p>
                </a>
            </li>


         </ul>
     </div>
 </aside>

