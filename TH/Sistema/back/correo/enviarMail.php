<?php

//require "lib/class.phpmailer.php";
//require "lib/class.smtp.php";
include("class.phpmailer.php");
include("class.smtp.php");

/**
 * 
 */
class enviarMail {

    private $mail;
    public $direc;


    function __construct() {
        $this->mail = new PHPMailer;

        //indico a la clase que use SMTP
        $this->mail->IsSMTP();

        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$this->mail->SMTPDebug = 2;
        //Debo de hacer autenticaci�n SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";

        //indico el servidor de Gmail para SMTP
        $this->mail->Host = "smtp.gmail.com";

        //indico el puerto que usa Gmail
        $this->mail->Port = 465;

        //Cargamos datos del correo emisor y receptor
//        $this->cargarDatos();
    }

    private function cargarDatos() {

  
        $this->mail->Username = "nocontestar.solicitudservicio@gmail.com";

        $this->mail->Password = "soporte201";
     
        $this->mail->FromName = "Solicitud Soporte Pescadero";

        $this->mail->Subject = "Peticion de Servicio";
        
//         $this->mail->AddAddress("poncho22069@hotmail.com");

         $this->mail->AddAddress($this->direc);
    }
    

      function enviarMensajeMilena($Usuario, $observacion) {
          
//       $this->direc = "edward22069@gmail.com";
        $this->direc = "compras@pescadero.com.co";

         //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();
          
        $this->mail->MsgHTML("E Area de   : ".$Usuario."<br> Presenta el Siguiente Problema :<br>".$observacion."" );


        $this->mail->Send();
        
    }
    
     function enviarMensajeProveedorMilena( $Usuario, $observacion) {
         
        $this->mail->ClearAddresses();

        $this->direc = $orden;
          //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();

        $this->mail->MsgHTML("Se ha Registrado como Proveedor de Tejar de Pescadero SAS \n Su Usuario es : ".$orden." y la Clave : ".$observacion."\n .Recuerde que usted es responsable de su Usuario y Clave.  En caso de Problemas comunicarse al Correo: compras@pescadero.com.co"  );

        $this->mail->Send();
    }
    
    
     function enviarMensajePeticion( $observacion ) {
         
        $orden ="edward22069@gmail.com";
//        $observacion="prueba exitosa";
         
        $this->mail->ClearAddresses();

        $this->direc = $orden;
          //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();

        $this->mail->MsgHTML($observacion."" );

        $this->mail->Send();
        
       
    }
     function enviarMensajePeticionUsuario($correo, $observacion ) {
         
//        $orden ="edward22069@gmail.com";
//        $observacion="prueba exitosa";
//         
        $this->mail->ClearAddresses();

        $this->direc = $correo;
          //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();

        $this->mail->MsgHTML($observacion );

        $this->mail->Send();
    }
    
    
    
    //////////////////////*********************************************************////////////////////////////
    
    //********************************************* correos de cuentas ******************************************/
          function enviarMensajeMonitoreo($Usuario, $mensaje) {
          
//       $this->direc = "edward22069@gmail.com";
        $this->direc = "compras@pescadero.com.co";

         //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();
          
        $this->mail->MsgHTML($mensaje );


        $this->mail->Send();
        
    }

}

?>


