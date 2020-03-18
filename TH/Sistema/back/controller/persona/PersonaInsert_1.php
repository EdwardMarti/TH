<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../../facade/PersonaFacade.php');
include_once realpath('../../facade/UsuarioFacade.php');
include_once realpath('../../correo/enviarMail.php');


//$cedula = '611733289';
//
//$nacionalidad = '1';
//$nombres = 'PONCHI';
//$apellidos = 'MART';
//$correo ='skdiegomxtr@gmail.com';
$estado ='1';

$cedulaU = $_POST['cedula'];
$nacionalidad = $_POST['nacionalidad'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$Cargo_id = $_POST['cargo_empreso_idcargo'];
$Roll_idroll = $_POST['roll_idroll'];

//$Cargo_id ='1';

$cargo= new Cargo();
$cargo->setId($Cargo_id);
//$Roll_idroll ='1';


//$reta=true;

$reta=PersonaFacade::insert_1( $cedulaU, $nacionalidad, $nombres, $apellidos,$correo,$estado );
//var_dump('persona'.$reta);

if($reta){
//    
    if($Roll_idroll='1'){ //entra a registrar usuario
        

$user_password =  md5($cedulaU);
//$user_password = rand(100000,999999);
//$user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
$user_encrypted_password = password_hash($cedulaU,PASSWORD_DEFAULT);
//$user_encrypted_password = password_hash($_POST['cedula']);
$user_activation_code = md5(rand());
//
//
///*********************/
$cedula=$cedulaU;
$usuario_nombre = $nombres.' '.$apellidos;
$usuario_correo =$correo;
$Cargo_empreso_idcargo =$Cargo_id;
//$Cargo_empreso_idcargo = $_POST['cargo_empreso_idcargo'];
$cargo_empreso= new Cargo_empreso();
$cargo_empreso->setIdcargo($Cargo_empreso_idcargo);
$usuario_pass = $user_password;

$roll= new Roll();
$roll->setIdroll($Roll_idroll);
$user_activation_code =$user_activation_code;
$user_email_status = 'NO VERIFICADO';

$rta= UsuarioFacade::insert_1($cedula,  $usuario_nombre, $usuario_correo, $usuario_pass, $cargo_empreso, $user_activation_code, $user_email_status, $roll);

//$rta=true;

//        var_dump($rta);
if($rta){
    
  	$base_url = "http://localhost/unik/cvs_web/front/";  //change this baseurl value as per your file path
  	$base_url_sistema = "http://localhost/unik/cvs_web/";  //change this baseurl value as per your file path
			//$base_url = "http://localhost/tutorial/email-address-verification-script-using-php/";  //change this baseurl value as per your file path
			$mail_body_user = "
			<p>Hola ".$usuario_nombre.",</p>
			<p>Usted ha sido registrado en el sistema . Su contraseña es :".$cedula.", Esta contraseña funcionará solo después de la verificación del correo electrónico, reaalizada por el administrador.</p>
                            <p>El link del sistema es el siguiente ".$base_url_sistema.",</p>
                                
			<p>Saludos cordiales ,<br />Asesor de Sistemas</p>";  
                        
			$mail_body_admin = "
			<p>Hola Coordinador de Monitoreo,</p>
			<p>la Cuenta del usuario  ".$usuario_nombre.", solo funcionará solo después de la verificación del correo electrónico - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
			<p>Saludos cordiales ,<br />Asesor de Sistemas</p>
			";  
    
    
    
//    
//        var_dump($mail_body_user);
$mail = new enviarMail();
$mail->enviarMensajePeticion( $mail_body_admin); //me envia
//$mail->enviarMensajeMilena( $mail_body_admin); // Monitoreo
$mail->enviarMensajePeticionUsuario($usuario_correo, $mail_body_user); // a quien genera
}

echo "true";
    }
    

echo "true";
}else{
    echo "Cedula ya Registrada";
}



//That´s all folks!