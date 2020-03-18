<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\
include_once realpath('../../facade/UsuarioFacade.php');

$idusuario = $_POST['idusuario'];
//$idusuario = '2';
//$usuario_nombre = $_POST['usuario_nombre'];
//$usuario_correo = $_POST['usuario_correo'];

$usuario_pass = $_POST['contra_vieja'];
$usuario_pass_nueva = $_POST['usuario_pass'];
//$usuario_pass = '9';
//$usuario_pass_nueva = '8';


//$usuario_pass=$usuario_pass;
//$usuario_pass_nueva=$usuario_pass_nueva;
$usuario_pass=md5($usuario_pass);
$usuario_pass_nueva=md5($usuario_pass_nueva);

//echo $usuario_pass;
//echo '          ';
//echo $usuario_pass_nueva;

$rta=UsuarioFacade::update_pass($idusuario,  $usuario_pass, $usuario_pass_nueva);
//echo'asdasdas .......'.$rta;
if($rta>0){
    echo "true";
}else{
    echo "error";
}
//echo "true";

//That´s all folks!