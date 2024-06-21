<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div id="login" class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block"><img style="width: 500px ; height: 600px;" src="{!! url('assets/img/reset-password-fondo.jpg') !!}" alt=""></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                <p class="mb-4">Ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña!</p>
                                </div>
                                <div class="text-center">
                                    <img style="width: 20%; margin: 3%" class="" src="{!! url('assets/img/reset-password-email.png') !!}" alt="">
                                </div>
                                <form class="user" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input  type="email"  value="@error('email') {{old('email')}} @enderror"  name="email" class="form-control form-control-user"
                                            id="email" aria-describedby="emailHelp"
                                            placeholder="Ingresar correo" required>
                                    </div>
                                    @error('email')
                                    <div class="text-center">
                                        <p style="color: rgba(255, 0, 0, 0.597)" class="" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    </div>
                                    @enderror
                                    @if (session('status'))
                                    <div class=" text-center alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <br>
                                    <button type="submit" id="btn-sendEmail" style="font-size: 14px" class="btn btn-primary btn-user btn-block">
                                        Enviar Correo.
                                    </button>
                                </form>
                                <br>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="login">Ingresar Nuevamente.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
