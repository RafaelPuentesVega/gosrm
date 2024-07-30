<html>

<head>
    <title>Remisión</title>
    <style>
                 
        table,
        tr,
        td,
        th {
            word-wrap: break-word;
        }

        table {
            table-layout: fixed;
            /* font-style: courier, arial;
            font-family: 'Inconsolata', monospace; */
        }
        .fuente {

            font-family: 'Verdana', sans-serif; */

        }
        .footer {
            position: fixed;
            margin-left: 55%;
            bottom: 3%;
            width: 47%;
            background-color: white;
            border-top: 1px solid black;
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
                <th style="vertical-align: bottom; font-size: 12px;text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid " >REMISIÓN </th>
    
                {{-- <th   style=" font-family: Georgia, 'Times New Roman', Times, serif;font-size: 9px; text-align: justify; border: rgba(3, 3, 3, 0) 1.5px solid  " >Recarga de cartuchos para impresora de inyección y láser. Venta de tóners, tintas, accesorios, mantenimiento y todo lo relacionado en computadores. Instalación de redes, cámaras y Ventas de equipos.</th> --}}
    
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">REFILL MATE TECHNOLOGY SAS- Nit: 901773764-3</th>
                <th  style="color: red ;font-weight: normal;font-family:'Times New Roman', Times, serif ;font-size: 17px;text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid"><i> {{$remision}} </i></th>
    
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">Calle 11 No. 3 - 82 Centro - Neiva Huila </th>
                <th  style="font-weight: normal; font-size: 11px; text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid"><i> <strong>Fecha:</strong> {{$fecha}}</i></th>

            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">Cel. 3023493313 - Tel. 608 8577386</th>

            </tr>
            <tr>
                <th colspan="2" style="text-align: left;border: rgba(3, 3, 3, 0) 1.5px solid">notificaciones@refillmate.com.co</th> 
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
                        <strong>Documento:&nbsp;</strong>{{ $documento }}
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
            </table>
            <br>
             <table class="" width="100%"
                style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 11px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 12px; border: rgba(0, 0, 0, 0) 2.5px solid">
                <tr style=" font-size: 11px ; background-color: #D0D3D4">
                    @if (sizeOf($productos) != 0)



                        <th width="10%"
                            style=" border: rgba(0, 0, 0, 0) 1.7px solid; border-top-left-radius: 0.2rem; height: 1px; font-weight:normal; text-align: left">
                            &nbsp;<strong>Cant. </strong>
                        </th>
                        <th width="60%"
                            style="  border: rgba(0, 0, 0, 0) 1.7px solid;font-weight:normal;text-align: left ">
                            &nbsp; <strong>
                                Descripcion</strong> </th>
                        <th width="15%"
                            style=" border: rgba(0, 0, 0, 0) 1.7px solid;font-size: 11px ;font-weight:normal;  text-align: left">
                            &nbsp;<strong>$ Unitario</strong>
                        </th>
                        <th width="15%"
                            style="border: rgba(0, 0, 0, 0) 1.7px solid; border-top-right-radius: 0.2rem;font-size: 11px ;font-weight:normal;  text-align: left">
                            &nbsp;<strong>$ Total</strong>
                        </th>

                </tr>
                @foreach ($productos as $producto)
                    <tr style=" font-size: 10px ">
                        <th width=""
                            style="font-size: 10px ;font-weight:normal; text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp; {{ $producto->cantidad }}
                        </th>
                        <th width=""
                            style="font-size: 10px ;font-weight:normal; text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;{{ $producto->nombre }} ({{ $producto->marca }})
                        </th>
                        <th width=""
                            style="font-size: 10px ;font-weight:normal; text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                {{ number_format($producto->precio_unitario, 0, ',', '.') }}
                        </th>
                        <th width=""
                            style="font-size: 10px ;font-weight:normal; text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                {{ number_format($producto->subtotal, 0, ',', '.') }}
                        </th>
                    </tr>
                @endforeach
                @endif
                <tr style=" font-size: 12px ">
                    <th width=""
                        style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                    </th>
                    <th width=""
                        style="font-weight:normal;text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                    </th>
                    <th width=""
                        style="background-color: #D0D3D4; font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong>Total</strong>
                    </th>
                    <th width=""
                        style="background-color: #D0D3D4;font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2.5px solid">
                        <strong> $ {{ number_format($totalRemision, 0, ',', '.') }}</strong>
                    </th>

                </tr>

            </table>  
            <br>
            <br>
            {{-- <p style="font-size: 12px; font-weight: bold; margin: 0% ">TECNICO - {{$tecnico}}</p> --}}
            <table  class="footer" width="100%" style="font-size: 10px">
                <tr>
                    <th width="100%"colspan="2"
                        style="border-radius: 5px; height: 30px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid !important">
                        <i><b>NOTA: </b> Estimado cliente, 
                            este documento no constituye una factura electrónica. Si requiere una factura formal, por favor, no dude en pedirla. Estamos aquí para ayudarle en lo que necesite</i>
                    </th>
                </tr>
            </table>

        </div>
    </div>



</body>

</html>
