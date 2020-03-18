<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\
include_once realpath('../../facade/UsuarioFacade.php');

$idusuario = $_POST['idusuario'];
$usuario_nombre = $_POST['usuario_nombre'];
$usuario_correo = $_POST['usuario_correo'];
$us_id_cargo = $_POST['us_id_cargo'];
$usuario_pass = $_POST['usuario_pass'];
$Roll_idroll = $_POST['roll_idroll'];
$roll= new Roll();
$roll->setIdroll($Roll_idroll);
$user_activation_code = $_POST['user_activation_code'];
$user_email_status = $_POST['user_email_status'];
UsuarioFacade::insert($idusuario, $usuario_nombre, $usuario_correo, $us_id_cargo, $usuario_pass, $roll, $user_activation_code, $user_email_status);
echo "true";

//That´s all folks!