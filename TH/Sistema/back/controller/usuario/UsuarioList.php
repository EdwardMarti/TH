<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\
include_once realpath('../../facade/UsuarioFacade.php');

$list=UsuarioFacade::listAll();
$rta="";
foreach ($list as $obj => $Usuario) {	
	$rta.="{
 	    \"idusuario\":\"{$Usuario->getidusuario()}\",
	    \"usuario_nombre\":\"{$Usuario->getusuario_nombre()}\",
	    \"usuario_correo\":\"{$Usuario->getusuario_correo()}\",
	    \"usuario_pass\":\"{$Usuario->getusuario_pass()}\",
	    \"cargo_empreso_idcargo_idcargo\":\"{$Usuario->getcargo_empreso_idcargo()->getidcargo()}\",
	    \"user_activation_code\":\"{$Usuario->getuser_activation_code()}\",
	    \"user_email_status\":\"{$Usuario->getuser_email_status()}\",
	    \"roll_idroll_idroll\":\"{$Usuario->getroll_idroll()->getidroll()}\"
	},";
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!