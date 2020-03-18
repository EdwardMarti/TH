<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\
include_once realpath('../../facade/UsuarioFacade.php');

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];


//var_dump($cargo. ''.$contrasena);
     $usuario = new $Usuarios();
      $usuario->setCargo_empreso_idcargo($cargo);
      $usuario->setUsuario_pass($contrasena); 

$list=UsuarioFacade::loginUsers($usuario);
//var_dump($list);
if($list!=null){
  foreach ($list as $obj => $usuario) {	

 $user=$usuario->getidusuario();     
 $nomb=$usuario->getUsuario_nombre();     
 $corre=$usuario->getUsuario_correo();     
      

}

  
 
    session_start();   
 $_SESSION['id_usuario'] = $user;

   $_SESSION['nombre'] = $nomb; 
 
  $_SESSION['correo'] = $corre; 


    echo '<script language="javascript">'
   . 'window.location="../../../front/index.php"</script>';

    
}else{
    if($cargo>1){
        echo '<script language="javascript">'
   . 'window.location="../../../front/login.html"</script>';

    }else{
       echo '<script language="javascript">'
   . 'window.location="../../../front/login_Adm.html"</script>';
 
    }
  
    
}
//foreach ($list as $obj => $Usuario) {	
//	$rta.="<tr>\n";
//	$rta.="<td>".$Usuario->getidusuario()."</td>\n";
//	$rta.="<td>".$Usuario->getusuario_nombre()."</td>\n";
//	$rta.="<td>".$Usuario->getusuario_correo()."</td>\n";
//	$rta.="<td>".$Usuario->getus_id_cargo()."</td>\n";
//	$rta.="<td>".$Usuario->getusuario_pass()."</td>\n";
//	$rta.="<td>".$Usuario->getroll_idroll()->getidroll()."</td>\n";
//	$rta.="<td>".$Usuario->getuser_activation_code()."</td>\n";
//	$rta.="<td>".$Usuario->getuser_email_status()."</td>\n";
//	$rta.="</tr>\n";
//}



    
//              echo'<script type="text/javascript">
//                alert("                                 ¡ERROR! Usuario o Contraseña Invalidos , \\nFavor revisar el Correo Con el Cual Se Registro para Verificar la Contaseña o\\n                             comunicarse con el departamento de compras ");
////                window.location="./login.php"
//                </script>';

    
    
//              echo'<script type="text/javascript">
//                alert(" ¡ok ");
//               
//                </script>';
    
//That´s all folks!