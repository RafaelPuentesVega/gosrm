function entregarOrden(event) {
  let idOrden = $("#idOrden").val();
  let checkSinIva = document.getElementById('checkSinIva');
  let enviarEmail = '';

  let sinIva = checkSinIva.checked ? 'SI' : 'NO';

  Swal.fire({
      title: 'Tipo de Pago',
      input: 'select',
      inputOptions: {
          'efectivo': 'Efectivo',
          'transferencia': 'Transferencia'
      },
      inputPlaceholder: 'Selecciona el tipo de pago',
      showCancelButton: true,
      inputValidator: (value) => {
          return new Promise((resolve) => {
              if (value) {
                  resolve()
              } else {
                  resolve('Debes seleccionar un tipo de pago')
              }
          })
      }
  }).then((result) => {
      if (result.isConfirmed) {
          let tipoPago = result.value;
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
                  enviarEmail = 'SI';
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                  showpreloader();
                  enviarEmail = 'NO';
              }

              if (result.isConfirmed || result.dismiss === Swal.DismissReason.cancel) {
                if(enviarEmail == 'SI'){
                  let timerInterval;
                  Swal.fire({
                      title: 'Enviado Correo!',
                      html: ' <b></b> Milisegundos',
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
                }

                  $.ajax({
                      url: '../entregarOrden',
                      data: {
                          sinIva: sinIva,
                          idOrden: idOrden,
                          enviarEmail: enviarEmail,
                          tipoPago: tipoPago
                      },
                      type: 'POST',
                      dataType: 'json',
                      success: function (json) {
                          if (json.mensaje === "ok") {
                              toastr["success"]("<h6>Se guardo correctamente</h6>", "GUARDADO")
                              window.open('../imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW/NO/' + idOrden, "Orden Salida", "toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left=390,top=50");

                              // setTimeout(function () {
                              //     window.location.reload();
                              // }, 800);
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
          });
      }
  });
}
