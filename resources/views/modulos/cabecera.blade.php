<nav  style="margin-bottom: -500px ;height: 60px; box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button style="background-color: gray" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Topbar Navbar -->
    <ul style="list-style:none;" class="navbar-nav ml-auto">
        <li  class="orden-blanco nav-item dropdown no-arrow" >
            <a class="nav-link dropdown-toggle"  id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgba(67, 67, 67, 0.514)" class="">
                    <i class="fa-solid fa-print " ></i>
                    Orden en blanco</span>
            </a>
            <!-- Dropdown - User Information -->
            <div style="font-size: 14px; .a hover{text-decoration:none}" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item"  onclick="ordenblanco('entrada')">
                    <i class="fa-regular fa-file-lines fa-sm fa-fw mr-3 text-gray-400"></i>
                    Orden de Ingreso
                </a>
                <a class="dropdown-item"  onclick="ordenblanco('salida')">
                    <i class="fa-solid fa-file-lines fa-sm fa-fw mr-2 text-gray-400"></i>
                    Orden de Salida
                </a>

            </div>
        </li>
        {{-- <div  class="topbar-divider d-none d-sm-block"></div> --}}


        <li  class="nav-item dropdown no-arrow mx-1">
            {{-- Notificaciones --}}
            {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a> --}}
            <!-- Dropdown - Alerts -->
            <div style="border: none" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 style="margin-top: -1px; font-size: 12px; text-align: center" class="dropdown-header">
                    Notificaciones
                </h6>
                <a style="height: 80px" class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span style="font-family: 'Times New Roman', Times, serif" class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i style="font-size: 15px" class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
            </div>
        </li>


        <div  class="topbar-divider d-none d-sm-block"></div>
        <li  class="nav-cargo nav-item dropdown no-arrow" >
            <a style="font-size: 13px ; font-style: italic" class="nav-link dropdown-toggle"  id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgba(0, 0, 0, 0.397)" class="">
                     {{auth()->user()->rol }}</span>
                </a>

        </li>
        <div  class="topbar-divider d-none d-sm-block"></div>


        <!-- Nav Item - User Information -->
        <li  class="nav-item dropdown no-arrow" >
            <a class="nav-link dropdown-toggle"  id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgba(0, 0, 0, 0.514)" class="">
                     {{auth()->user()->name }}</span>
                <img style="width: 35px; height: 35px;" class="img-profile rounded-circle"
                    src="{!! url('assets/img/myAvatar.png') !!}">
                </a>
            <!-- Dropdown - User Information -->
            <div style="font-size: 14px; .a hover{text-decoration:none}" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div style="display: none" class="responsive-cel">
                    <span style="" class="dropdown-item">
                        <i class="fa-solid fa-print " ></i>
                        Orden en blanco</span>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  onclick="ordenblanco('entrada')">
                                <i class="fa-regular fa-file-lines fa-sm fa-fw mr-3 text-gray-400"></i>
                                Orden de Ingreso
                            </a>
                            <a class="dropdown-item"  onclick="ordenblanco('salida')">
                                <i class="fa-solid fa-file-lines fa-sm fa-fw mr-2 text-gray-400"></i>
                                Orden de Salida
                            </a>
                            <div class="dropdown-divider"></div>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#changePasswordModal" onclick="">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Privacidad
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <form method="POST" id="logout-form" action="{{route('logout')}}">
                    @csrf

                </form>
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesion
                </a>
            </div>
        </li>


    </ul>

</nav>
{{-- @include('modulos.modal.cambiarClaveModal') --}}

