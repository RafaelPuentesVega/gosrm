<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Refill Mate </title>
    <link rel="shortcut icon" href="{!! url('assets/img/logo.ico') !!}" type="image/x-icon">
    <link href="{!! url('bootstrap/preloader.css') !!}" rel="stylesheet" />
    <!-- Custom fonts for this template-->
    <link href="{!! url('fontawesome/css/all.min.css" rel="stylesheet" type="text/css') !!}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! url('css/sb-admin-2.min.css" rel="stylesheet') !!}">

</head>

<body class="" style="background: linear-gradient(39deg, rgba(42,41,144,1) 6%, rgba(91,144,222,1) 50%, rgba(31,37,131,1) 94%);">

    @if(Request::get('resetPassword') == 'true')
        @include('auth.reset-password')
    @else
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div id="login" class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img style="width: 500px ; height: 600px;" src="{!! url('assets/img/inicio-sesion.jpg') !!}" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><strong>Bienvenido!</strong></h1>
                                    </div>
                                    <div class="text-center">
                                        <img style="width: 20%; margin: 3%" class="" src="{!! url('assets/img/iniciar-sesion.png') !!}" alt="">
                                    </div>
                                    <br>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input  type="email" value="@error('email') {{old('email')}} @enderror"  name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Ingresar correo" required>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="none-password" type="password" name="password" id="password" class="form-control form-control-user"
                                                 placeholder="Contraseña" required>
                                        </div>
                                        @error('email') <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Correo no registrado</strong> </h6> </li> </ul><br></div> @enderror
                                        @error('password') <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Contraseña incorrecta</strong> </h6> </li> </ul><br></div> @enderror
                                        @error('state') <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Usuario INACTIVO</strong> </h6> </li> </ul><br></div> @enderror
                                        <br>
                                        <button type="submit" id="btn-ingresar" style="font-size: 14px" class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                        </button>
                                    </form>
                                    <br>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login?resetPassword=true">Olvido su contraseña?</a>
                                    </div>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endif
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
            <p style="margin-top: 100%; margin-left: -10%; color: aliceblue">&nbsp;</p>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{!! url('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! url('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! url('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{!! url('js/sb-admin-2.min.js') !!}"></script>
    <script src="{!! url('js/preloader.js') !!}"></script>
    <script>
        $(document).on("click",  "#btn-ingresar", function(){
            var correo  = $('#email').val();
            var cont  = $('#password').val();

            var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


            if ( !expr.test(correo) ){                                                            //COMPRUEBA MAIL
                return true;
            }
            if ((correo == "") || (cont == "")  ) {  //COMPRUEBA CAMPOS VACIOS
                return true;
            }
            showpreloader();
        });
        $(document).on("click",  "#btn-sendEmail", function(){
            if ( $('#email').val() == ""  ) {  //COMPRUEBA CAMPOS VACIOS
                return true;
            }
            showpreloader();
        });
    </script>

</body>

</html>
