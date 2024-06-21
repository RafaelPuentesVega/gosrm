<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Refill Mate</title>

    <!-- Custom fonts for this template-->
    <link href="{!! url('fontawesome/css/all.min.css" rel="stylesheet" type="text/css') !!}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! url('css/sb-admin-2.min.css" rel="stylesheet') !!}">

</head>

<body class="" style="background: linear-gradient(39deg, rgba(42,41,144,1) 6%, rgba(91,144,222,1) 50%, rgba(31,37,131,1) 94%);">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div id="login" class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img style="width: 500px ; height: 600px;" src="{!! url('assets/img/fondo-inicio-sesion.png') !!}" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><strong>Restablecer contraseña!</strong></h1>
                                    </div>
                                    <div class="text-center">
                                        <img style="width: 20%; margin: 3%" class="" src="{!! url('assets/img/iniciar-sesion.png') !!}" alt="">
                                    </div>
                                    <br>
                                    <form class="user" method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <input style="display: none"    type="email" value="{{$email ?? old('email')}}"  name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Ingresar correo" required >
                                        </div>
                                        <div class="form-group">
                                            <input    type="email" value="{{$email ?? old('email')}}"  name="email-none" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Ingresar correo" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="none-password" minlength="6" type="password" name="password" id="password" class="form-control form-control-user"
                                                 placeholder="Contraseña" required>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="none-password" minlength="6" type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-user"
                                                 placeholder="Comfirmar Contraseña" required>
                                        </div>
                                        @error('email')
                                        <div class="text-center">
                                            <span  style="color: brown ; text-align: center" class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                        @error('password')
                                        <div class="text-center">
                                            <span style="color: brown ; text-align: center" class="" role="alert"><strong>
                                                @if($message == 'validation.min.string')
                                                    La contraseña debe de ser minimo 8 caracteres
                                                @elseif($message == 'validation.confirmed')
                                                    Las Contraseñas no coinciden
                                                @else
                                                {{ $message }}
                                                @endif
                                                </strong>
                                            </span>
                                        </div>
                                        @enderror
                                        <br>
                                        <button type="submit" style="font-size: 14px" class="btn btn-primary btn-user btn-block">
                                            Restablecer Contraseña
                                        </button>
                                    </form>
                                    <br>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../../login">Iniciar Sesion</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{!! url('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! url('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! url('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{!! url('js/sb-admin-2.min.js') !!}"></script>

</body>

</html>
