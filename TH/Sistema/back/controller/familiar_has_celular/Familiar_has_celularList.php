<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\
include_once realpath('../../facade/Familiar_has_celularFacade.php');

$list=Familiar_has_celularFacade::listAll();
$rta="";
foreach ($list as $obj => $Familiar_has_celular) {	
	$rta.="{
 	    \"familiar_id_id\":\"{$Familiar_has_celular->getfamiliar_id()->getid()}\",
	    \"celular_id_id\":\"{$Familiar_has_celular->getcelular_id()->getid()}\"
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