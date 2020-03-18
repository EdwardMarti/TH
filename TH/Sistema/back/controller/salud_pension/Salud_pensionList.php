<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../../facade/Salud_pensionFacade.php');

$list=Salud_pensionFacade::listAll();
$rta="";
foreach ($list as $obj => $Salud_pension) {	
	$rta.="{
 	    \"id\":\"{$Salud_pension->getid()}\",
	    \"salud\":\"{$Salud_pension->getsalud()}\",
	    \"pension\":\"{$Salud_pension->getpension()}\",
	    \"persona_id_id\":\"{$Salud_pension->getpersona_id()->getid()}\"
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