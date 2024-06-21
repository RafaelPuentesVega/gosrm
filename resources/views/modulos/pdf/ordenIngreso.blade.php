
<html>

<head>
    <title>Orden de ingreso</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
{{-- <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet"> --}}

    <style>
        table,
        tr,
        td,
        th {
            word-wrap: break-word;
        }

        table {
            /* border-collapse: collapse; */
            table-layout: fixed;
            /* font-style: courier, arial;
            font-family: 'Inconsolata', monospace; */
        }
        .fuente {

            font-family: 'Verdana', sans-serif; */

        }

    </style>
</head>

<body
    @empty($bodyValidate)
    style="width: 47%; margin-left: 55%;"
    @endempty
    >
    <div class="fuente">

    <table width="100%" style="border-collapse: collapse; font-size: 10px; text-align: center">

        <tr>
            <th style="text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid " >
                <img src="assets/img/logo-orden.png" style="height: 50px; width: 160px "> </th>

            <th  style="border: rgba(3, 3, 3, 0) 1.5px solid">&nbsp;</th>
            <th style="vertical-align: bottom; font-size: 12px;text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid " >ORDEN DE INGRESO </th>

            {{-- <th   style=" font-family: Georgia, 'Times New Roman', Times, serif;font-size: 9px; text-align: justify; border: rgba(3, 3, 3, 0) 1.5px solid  " >Recarga de cartuchos para impresora de inyección y láser. Venta de tóners, tintas, accesorios, mantenimiento y todo lo relacionado en computadores. Instalación de redes, cámaras y Ventas de equipos.</th> --}}

        </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">REFILL MATE - Nit: 901773764-3 </th>
                <th  style="color: red ;font-weight: normal;font-family:'Times New Roman', Times, serif ;font-size: 17px;text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid"><i> {{$orden}} </i></th>
    
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">Calle 11 No. 3 - 82 Centro - Neiva Huila </th>
                <th  style="font-weight: normal; font-size: 11px; text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid;  width: 40%"><i> <strong>Fecha Recibido:</strong> {{$fecha_ingreso}}</i></th>

            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">Cel. 3023493313 - Tel. 608 8577386</th>

            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">soporte@refillmate.com.co</th> 
            </tr>
        {{-- <tr>
        <th colspan="2"  style="font-size: 18px;text-align: center ; border: rgba(0, 0, 0, 0) 1.7px solid">{{$fecha_ingreso}}</th>
        <th    style=" font-size: 23px; text-align: center; border: rgba(0, 0, 0, 0) 1.7px solid">{{$orden}}</th>
        </tr> --}}

    </table>
    
    <div>
        <br>
        <div style="background-color: #D0D3D4; text-align: center; border-top-left-radius: 5px ; border-top-right-radius: 5px;border: rgb(68, 66, 66) 1.1px solid; font-size: 12px ; border-bottom-color: rgba(0, 0, 0, 0) 1.1px solid">
            <strong> Datos Cliente </strong>
        </div>
        <table width="100%" style="border-bottom-right-radius: 5px ; border-bottom-left-radius: 5px;font-size: 11px;  border: rgb(68, 66, 66) 1.1px solid">
            <tr >
                <th width="33%" style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Documento: &nbsp;</strong>{{ $documento }}
                </th>
                <th  colspan="3"  style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid"><strong>
                        Nombre:&nbsp;</strong>{{ $nombre }}
                </th>

            </tr>
            <tr>


                <th  style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Celular: &nbsp;</strong>{{$celular}}
                </th>
                <th  colspan="3"   style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Direcci&oacute;n:&nbsp;</strong>{{$direccion}}                 
                </th>

            </tr>
            <tr>
                <th  style="height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Telefono:&nbsp; </strong>{{$telefono}}
                </th>
                 <th style=" font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Ciudad:&nbsp;</strong>{{$municipio}}
                </th> 
                <th colspan="2" style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Correo:&nbsp; </strong> <span style="text-transform: lowercase; font-size: 10px">{{ $correo }}</span> 
                </th>
            </tr>
            @isset($usuario)
            <tr>
                <th style="font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Dependencia:&nbsp;</strong> {{$dependencia}}
                </th>
                <th width="28%" style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Cel. Usu.:&nbsp; </strong> {{$celular_usuario}}
                </th>
                <th colspan="2" style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                    <strong>Usuario:&nbsp; </strong>{{$usuario}}
                </th>

            </tr>
            @endisset
        </table>
        <br>

        <div style="background-color: #D0D3D4; text-align: center; border-top-left-radius: 5px ; border-top-right-radius: 5px;border: rgb(68, 66, 66) 1.1px solid; font-size: 12px ; border-bottom-color: rgba(0, 0, 0, 0) 1.1px solid">
            <strong> Datos Equipo </strong>
        </div>
        <table width="100%" style="border-bottom-right-radius: 5px ; border-bottom-left-radius: 5px;font-size: 11px;  border: rgb(68, 66, 66) 1.1px solid">
            <tr>
                <th width="33%"
                    style="   height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                    <strong>Equipo: </strong>
                    {{$equipo}}
                </th>
                <th width="33%"
                    style="height: 1px;font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                    <strong> Marca: </strong>
                    {{$marca}}
                </th>
                <th width="33%"
                    style="height: 1px;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                    <strong>Referencia: </strong>
                    {{$referencia}}
                </th>

            </tr>

            <tr>
                <th width="25%"
                    style="height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                    <strong>Serial : </strong>
                    {{$serial}}
                </th>
                <th colspan="2" width="25%"
                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid"><strong>
                        Verificacion Func. : </strong> {{$verficoFuncionamiento}}
                </th>

            </tr>
        </table>
        <br>
        <div style="background-color: #D0D3D4; text-align: center; border-top-left-radius: 5px ; border-top-right-radius: 5px;border: rgb(68, 66, 66) 1.1px solid; font-size: 12px ; border-bottom-color: rgba(0, 0, 0, 0) 1.1px solid">
            <strong> Accesorios </strong>
        </div>
        <table width="100%" style="border-bottom-right-radius: 5px ; border-bottom-left-radius: 5px;font-size: 11px;  border: rgb(68, 66, 66) 1.1px solid">
            @if ($adaptador != null)
                <tr>
                    <th width="100%"
                        style="   height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                        <strong>Adaptador :</strong>
                        {{$adaptador}}
                    </th>
                </tr>
            @endif
            <tr>
                <th width="100%"
                    style="   height: 20px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                    {{$accesorios}}
                </th>
            </tr>
        </table>
        <br>
        <div style="background-color: #D0D3D4; text-align: center; border-top-left-radius: 5px ; border-top-right-radius: 5px;border: rgb(68, 66, 66) 1.1px solid; font-size: 12px ; border-bottom-color: rgba(0, 0, 0, 0) 1.1px solid">
            <strong> Caracteristicas Equipo </strong>
        </div>
        <table width="100%" style="border-bottom-right-radius: 5px ; border-bottom-left-radius: 5px;font-size: 11px;  border: rgb(68, 66, 66) 1.1px solid">
            <tr>
                <th width="100%" style="height: 35px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                    {{$caracteristicas}}
                </th>
            </tr>
        </table>
        <br>
        <div style="background-color: #D0D3D4; text-align: center; border-top-left-radius: 5px ; border-top-right-radius: 5px;border: rgb(68, 66, 66) 1.1px solid; font-size: 12px ; border-bottom-color: rgba(0, 0, 0, 0) 1.1px solid">
            <strong> Daño Equipo </strong>
        </div>
        <table width="100%" style="border-bottom-right-radius: 5px ; border-bottom-left-radius: 5px;font-size: 11px;  border: rgb(68, 66, 66) 1.1px solid">
            <tr>
                <th width="100%" style="height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                    {{$dano}}
                </th>
            </tr>

        </table>
        <br>
        <br>
        <table width="100%" style="font-size: 9px">
            <tr>
                <th>
                    __________________________________
                </th>
                <th>
                    __________________________________
                </th>
            </tr>
            <tr>
                <th>
                    Nombre Recibe
                </th>
                <th>
                   Firma Cliente 
                </th>
            </tr>
        </table>
        <br>
        <table width="100%" style="font-size: 9px">
            <tr>
                <th width="100%" colspan="2"
                    style="border-radius: 5px; height: 30px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid !important">
                    <i>INFORMACION IMPORTANTE: Estimado cliente, pasados (30) treinta días de estar el equipo en nuestras instalaciones, si no
                    es reclamado a tiempo, nuestra empresa no se hace responsable por este.
                    – Todo servicio o revisión tiene un valor mínimo de $15.000
                    – Con la firma de este documento el cliente acepta las condiciones de entrega y recibido del
                    equipo.</i> </th>
            </tr>
        </table>


        {{-- <p style="font-size: 12px; font-weight: bold; margin: 0% ">Firma Cliente: ______________________________
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Tecnico : <em> <u>&nbsp;&nbsp;{{$tecnico}}&nbsp;&nbsp;&nbsp;</u> </em></p> --}}


    </div>
</div>



</body>
</html>
