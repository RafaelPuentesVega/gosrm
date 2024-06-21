@extends('plantilla')
@section('content')

<div class="main-panel" >
    <section class="content-header">
        <h1>Gestor de consultorios</h1>
    </section>
    <section class="content" >

        <div class="box">

            <br>
                <form method="POST">
                    @csrf
                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" name="consultorio" placeholder="Ingrese un nuevo consultorio"
                        required ="">
                    </div>
                    <button class="btn btn-primary" type="submit" >Agregar Consultorio</button>
                </form>

                <br>

                 <div class="box-body">

                    @foreach ($consultorios as $consultorioEnvio)


                                <div class="row">

                                    <form method="post" action="{{ url('consultorio/.$consultorios->id')}}">
                                        @csrf
                                        @method('put')

                                            <div class="col-md-5">
                                                <input type="text"  class="form-control" name="consultorioE" value="
                                                {{$consultorioEnvio->consultorio}} ">

                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-success" type="submit"> Guardar</button>
                                            </div>

                                    </form>

                                    <div class="col-md-1">
                                        <form method="POST" action="">
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>

                                    </div>

                                </div>
                                <br>


                    @endforeach

                </div>


        </div>

    </section>
</div>

@endsection
