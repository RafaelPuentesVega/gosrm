<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{!! url('fontawesome/css/all.css') !!}" rel="stylesheet" />

<style type="text/css">
    /* FONTS */
    @media screen {
        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 400;
          src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: normal;
          font-weight: 700;
          src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 400;
          src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
        }

        @font-face {
          font-family: 'Lato';
          font-style: italic;
          font-weight: 700;
          src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
        }
    }

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #000000; margin: 0 !important; padding: 0 !important;">



<table style="" border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td style="background-color: #dededefc" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td align="center" valign="top" style="padding: 30px 10px 30px 10px;">

                            <img src="{!! url('assets/img/logo-refill.png') !!}"
                            width="40" height="40" style="filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.384)) ;margin: -20px ;display: block; width: 155px; height: 75px " border="0">

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td  align="center" style="padding: 0px 10px 0px 10px;background-color: #dededefc">

            <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 10px 10px 0px 0px; color: #111111; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                        ¡Registro de Entrada Exitosa: {{$datos["equipo"]}}
                        </h2>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="background-color: #dededefc; padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
              <tr>
                <td colspan="2" bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0;">
                    Hola {{$datos["nombre"]}},

                    Agradecemos sinceramente su confianza al elegirnos para el cuidado de su equipo. Estamos trabajando diligentemente en su orden de ingreso.
                    <br>
                    Le estaremos informando el estado de su equipo muy pronto. Mientras tanto, por favor, esté atento/a a su línea teléfonica para futuras actualizaciones.
                </p>
                </td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="left" colspan="2">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
                            <tr>
                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                    Orden de servicio
                                </td>
                                <td width="25%" align="left" bgcolor="#eeeeee" style="color: red ;font-weight: normal;font-family:'Times New Roman', Times, serif ;font-size: 18px;line-height: 24px; padding: 10px;">
                                   <i> {{$datos["orden"]}} </i>
                                </td>
                            </tr>
                            <tr>
                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                    Equipo
                                </td>
                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                    {{$datos["equipo"]}}
                                </td>
                            </tr>
                            <tr>
                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    Marca
                                </td>
                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    {{$datos["marca"]}}
                                </td>
                            </tr>
                            <tr>
                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    Referencia
                                </td>
                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    {{$datos["referencia"]}}
                                </td>
                            </tr>
                            <tr>
                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    Serial
                                </td>
                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                    {{$datos["serial"]}}
                                </td>
                            </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
                <tr >
                    <td width="15%" align="center" style="background-color:#25D366; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 15px ">
                        <a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=573023493313">
                            <img width="75px" height="75px" style=" width: 75px; height: 75px" src="{!! url('assets/img/whatsaap-icon.png') !!}" alt="">

                        </a>

                    </td>
                    <td width="85%" align="left" style="background-color:#25D366; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 19px; line-height: 24px; padding: 15px ">
                            <p style="margin: 0;">

                                <i style="color: rgba(81, 81, 81, 0.545)" class="fa-solid fa-arrow-pointer"></i>
                                <span class="pull-left" style="align-content: center; color: rgba(255, 255, 255, 0.899);"> ¿Tienes dudas? Realizas las consultas y solicitudes a trav&eacute;s de la linea de
                                    <a style="text-decoration: none; color: rgba(255, 255, 255, 0.852) ;" href="https://api.whatsapp.com/send?phone=573023493313"><strong >WhatsApp +57 3023493313</strong></a></span></p>
                    </td>
                </tr>
                <tr >
                    <td colspan="2" width="100%" align="left" style=" border-bottom-left-radius: 10px ; border-bottom-right-radius: 10px;background-color: white; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 15px;">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="background-color: #dededefc; padding: 30px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <!-- HEADLINE -->
                <tr align="center" style="background-color: rgb(76, 45, 139); padding: 1px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400">

                          <td colspan="2" width="25%" align="center" style=" color: white; border-radius: 10px 10px 0px 0px ;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                        <strong>S&iacute;guenos en nuestras redes sociales</strong>
                          </td>
                </tr>
                <tr align="center" style="background-color: rgb(255, 255, 255); padding: 1px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400">
                    <td colspan="" width="25%" align="center" style=" color: blue; border-radius: 0px 0px 0px 10px ;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                        <a  href="https://www.facebook.com/profile.php?id=61553628595892&locale=es_LA"> <i style="color: blue;font-size: 23px" class="fab fa-facebook-f"></i>  </a>
                                        
                    </td>
                    <td colspan="" width="25%" align="center" style=" color: orangered; border-radius: 0px 0px 10px 0px ;font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                        {{-- <i style="font-size: 20px" class="fab fa-facebook-f"></i>        --}}
                        <a href=""><i style="color: orangered; font-size: 28px" class="fab fa-instagram"></i>  </a>
                               
                    </td>
                </tr>
            </table>
            <br>

        </td>
    </tr>
    <tr>
        <td  align="center" style="background-color: #dededefc; padding: 0px 10px 0px 10px;">

            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >

              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                </td>
              </tr>
              <!-- UNSUBSCRIBE -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;"><i class="fas fa-phone"></i>&nbsp; Celular: (+57) 3023493313</p>
                </td>
              </tr>
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;"><i class="fa fa-envelope"></i>&nbsp; Correo: ventas@refillmate.com.co - refillmatesas@gmail.com</p>
                </td>
              </tr>
              <!-- ADDRESS -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >

                    <a style="text-decoration: none; color:#666666 ;" href="https://maps.app.goo.gl/rxKNgcYJcm3pqtTKA">
                    <p style="margin: 0;">
                    <i style="font-size:16px; color: rgb(142, 97, 97);" class="fas fa-map-marked-alt"></i>
                    &nbsp;Calle 11 # 3 -82 Centro, Neiva - Huila.</p>
                    </a>
                </td>
              </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
