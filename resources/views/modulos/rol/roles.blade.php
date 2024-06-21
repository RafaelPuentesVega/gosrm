
@if (Auth::user())
            @include('modulos.cabecera')
            @if(auth()->user()->rol == "TECNICO")
            @include('modulos.rol.menutecnico')
            @endif
            @if(auth()->user()->rol == "ADMINISTRATIVO")
            @include('modulos.rol.menuadministrativo')
            @endif
            @if(auth()->user()->rol == "COORDINADOR TECNICO")
            @include('modulos.rol.menucordinadortecnico')
            @endif
            @if(auth()->user()->rol == "GERENTE")
            @include('modulos.rol.menugerente')
            @endif
            @yield('content')
@else
    @yield('contenido')
@endif
