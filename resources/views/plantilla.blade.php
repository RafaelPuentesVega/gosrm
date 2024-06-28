<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Refill Mate - Orden de servicio</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link href="{!! url('css/style-global.css?version=1.0') !!}" rel="stylesheet" />
        <link href="{!! url('fontawesome/css/all.css') !!}" rel="stylesheet"/>
        <link rel="shortcut icon" href="{!! url('assets/img/logo.ico') !!}" type="image/x-icon">
        <link href="{!! url('css/sb-admin-2.css?version=1.0') !!}" rel="stylesheet" />
        <link href="{!! url('assets/css/bootstrap.min.css?v=1') !!}" rel="stylesheet" />
        <link href="{!! url('bootstrap/preloader.css?v=1') !!}" rel="stylesheet" />
        <link href="{!! url('assets/css/light-bootstrap-dashboard.css?v=1.4.0') !!}" rel="stylesheet"/>
        <link href="{!! url('assets/css/animate.min.css') !!}" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link href="{!! url('assets/css/pe-icon-7-stroke.css') !!}" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="{!! url('assets/css/bootstrap-extended.min.css?v=1') !!}">
        @yield('css')
    </head>
    <body class="hold-transition skin-blue sidebar-mini login-page">

        <div class="wrapper">
        </div>

    @include('modulos.rol.roles')


    <div id="preloaderId" class="" style="
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(20, 23, 26, 0.503);
    z-index: 9999;
    display:none;
    text-align: center;
    padding: 20%">

        <div class="lds-ring" style="margin-bottom: -100%">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <p style="margin-top: 100%; margin-left: -10%; color: aliceblue">Procesando...</p>
        </div>
    </div>
    @include('modulos.privacidad.mdCambiarPassword')
            <script src="{!! url('bower_components/jquery/dist/jquery.min.js') !!}"></script>
            <script src="{!! url('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
            <script> $.widget.bridge('uibutton', $.ui.button);</script>
            <script src="{!! url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
            <script src="{!! url('bower_components/fastclick/lib/fastclick.js') !!}"></script>
            <script src="{!! url('dist/js/adminlte.min.js') !!}"></script>
            @yield('js')
           <script src="{!! url('assets/js/light-bootstrap-dashboard.js?v=1.4.0') !!}"></script>
            <script src="{!! url('assets/js/demo.js') !!}"></script>
            <script src="{!! url('js/preloader.js?v=1.3') !!}"></script>
            <script src="{!! url('js/global.js') !!}"></script>
            <script src="{!! url('assets/js/bootstrap.min.js" type="text/javascript') !!}"></script>
            <script src="{!! url('sweetalert2/sweetalert2.js" type="text/javascript') !!}"></script>
            @if (!!!Auth::guest())
            <script src="{!! url('js/sesionInactividad.js') !!}"></script>
            @endif
            <script>  $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });</script>

    </body>
</html>
