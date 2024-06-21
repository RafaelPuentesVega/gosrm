$(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })
  function vencidas(){
        var table = document.getElementById("vencidas-table").style.display;
        var table1 = document.getElementById("vigentes-table").style.display;

        if(table1 == "block"  ){
        document.getElementById("vigentes-table").style.display = "none";
        }
        if(table == "block"  ){
            document.getElementById("vencidas-table").style.display = "none";
            } else{
            document.getElementById("vencidas-table").style.display = "block";

        }
        }
        function vigentes(){
        var table = document.getElementById("vigentes-table").style.display;
        var table1 = document.getElementById("vencidas-table").style.display;

        if(table1 == "block" ){
        document.getElementById("vencidas-table").style.display = "none";

        }
        if(table == "block" ){
            document.getElementById("vigentes-table").style.display = "none";

            } else{
            document.getElementById("vigentes-table").style.display = "block";

        }
        }


            toastr.options = {
            "closeButton": false    ,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "linear",
            "hideEasing": "swing",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
            }
