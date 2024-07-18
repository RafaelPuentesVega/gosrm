

function entregarOrden(event) {
    let idOrden = $("#idOrden").val();
    checkSinIva = document.getElementById('checkSinIva');
    enviarEmail = '';

    let sinIva = '';
    if(checkSinIva.checked){
        sinIva = 'SI';
    }else{
        sinIva = 'NO';
    }
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
      })

      swalWithBootstrapButtons.fire({
        title: 'Enviar Correo al cliente?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        reverseButtons: false

      }).then((result) => {
        if (result.isConfirmed) {
              showpreloader();
            let timerInterval
            Swal.fire({
              title: 'Enviado Correo!',
             html: ' <b></b>Milisegundos',
              timer: 2300,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })
            enviarEmail = 'SI';
            $.ajax({
                url: '../entregarOrden',
                data: {
                    sinIva: sinIva,
                    idOrden : idOrden,
                    enviarEmail : enviarEmail,
                },
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    if (json.mensaje === "ok") {
                        toastr["success"]("<h6>Se guardo correctamente</h6>", "GUARDADO")
                        window.open ('../imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW/NO/'+ idOrden,"Orden Salida","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );

                        setTimeout(function(){
                            window.location.reload();
                        }, 800);

                    }
                },
                error: function (xhr, status) {
                    alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
                },
                complete: function (xhr, status) {
                  hidepreloader();
                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel
        ) {
            showpreloader();
            enviarEmail = 'NO';
            $.ajax({
                url: '../entregarOrden',
                data: {
                    sinIva: sinIva,
                    idOrden : idOrden,
                    enviarEmail : enviarEmail,
                },
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    if (json.mensaje === "ok") {
                        toastr["success"]("<h6>Se guardo correctamente</h6>", "GUARDADO")
                        window.open ('../imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW/NO/'+ idOrden,"Orden Salida","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 390,top = 50" );

                        setTimeout(function(){
                            window.location.reload();
                        }, 800);


                    }
                },
                error: function (xhr, status) {
                    alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
                },
                complete: function (xhr, status) {
                  hidepreloader();
                }
            });

        }
      })



}
