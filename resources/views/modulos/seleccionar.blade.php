@extends('plantilla')
@section('contenido')


<section class="content">

    <center>
        <h1>Seleccionar el rol a ingresar</h1>

    </center>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box" style="background-color: rgba(94, 94, 212, 0.589); color : rgb(206, 206, 206);">
            <div class="inner">
                <h3>Secretaria</h3>
                <p>Iniciar sesion</p>

            </div>

            <div class="icon " >
                <i class="fa fa-id-card  "> </i>
            </div>
            <a href="ingresar" class="small-box-footer">
                ingresar <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>



    <div class="col-lg-3 col-xs-6">
        <div class="small-box" style="background-color: rgba(67, 67, 85, 0.685); color : rgb(206, 206, 206);">
            <div class="inner">
                <h3>Doctor</h3>
                <p>Iniciar sesion</p>

            </div>

            <div class="icon">
                <i class="fa fa-user-md"> </i>
            </div>
            <a href="ingresar" class="small-box-footer">
                ingresar <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box" style="background-color: rgba(148, 113, 36, 0.589); color : rgb(206, 206, 206);">
            <div class="inner">
                <h3>Paciente</h3>
                <p>Iniciar sesion</p>

            </div>

            <div class="icon">
                <i class="fa fa-users"> </i>
            </div>
            <a href="ingresar" class="small-box-footer">
                ingresar <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box" style="background-color: rgba(26, 117, 49, 0.589); color : rgb(206, 206, 206);">
            <div class="inner">
                <h3>Admin</h3>
                <p>Iniciar sesion</p>

            </div>

            <div class="icon">
                <i class="fa fa-male"> </i>
            </div>
            <a href="ingresar" class="small-box-footer">
                ingresar <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
        <br>


        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color: rgba(148, 113, 36, 0.589); color : rgb(206, 206, 206);">
                <div class="inner">
                    <h3>Paciente</h3>
                    <p>Iniciar sesion</p>

                </div>

                <div class="icon">
                    <i class="fa fa-users"> </i>
                </div>
                <a href="ingresar" class="small-box-footer">
                    ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>

        </div>


    </div>


</section>

@endsection
