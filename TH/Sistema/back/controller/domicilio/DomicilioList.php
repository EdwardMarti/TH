<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Vaya! ¡Al fin harás algo mejor que una calculadora!  \\
include_once realpath('../../facade/DomicilioFacade.php');

$list=DomicilioFacade::listAll();
$rta="";
foreach ($list as $obj => $Domicilio) {	
	$rta.="{
 	    \"id\":\"{$Domicilio->getid()}\",
	    \"direccion\":\"{$Domicilio->getdireccion()}\",
	    \"barrio\":\"{$Domicilio->getbarrio()}\",
	    \"persona_id_id\":\"{$Domicilio->getpersona_id()->getid()}\"
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