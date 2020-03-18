 <button type="button" class="btn btn-primary" onclick="registrar()">Salvar Cambios</button>
        <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
 <script>
     function registrar(){
      
         
        var url = "../back/controller/empresa/EmpresaInsert.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#areaform").serialize(), 
          
         
           success: function(data) 
         
           {
               if(data=='true'){
                 aceptar();
               }
                          
           }
       });
   
};

     function aceptar(){
     $('#myModal2').modal('hide');
       swal({
                        title: "Registro",
                        text: "Registro Exitoso!",
                        type: "success",
                       // showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                               sucursal_emp_Listar_2(mySelect);
                           // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};

 function aceptar(){
     $('#myModal2').modal('hide');
       swal({
                        title: "Registro",
                        text: "Registro Exitoso!",
                        type: "success",
                       // showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                               sucursal_emp_Listar_2(mySelect);
                           // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};
</script>
             <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

