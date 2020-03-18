<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../../facade/Persona_has_celularFacade.php');

$list=Persona_has_celularFacade::listAll();
$rta="";
foreach ($list as $obj => $Persona_has_celular) {	
	$rta.="{
 	    \"persona_id_id\":\"{$Persona_has_celular->getpersona_id()->getid()}\",
	    \"celular_id_id\":\"{$Persona_has_celular->getcelular_id()->getid()}\"
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