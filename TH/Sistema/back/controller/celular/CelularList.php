<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../../facade/CelularFacade.php');

$list=CelularFacade::listAll();
$rta="";
foreach ($list as $obj => $Celular) {	
	$rta.="{
 	    \"id\":\"{$Celular->getid()}\",
	    \"numero\":\"{$Celular->getnumero()}\"
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