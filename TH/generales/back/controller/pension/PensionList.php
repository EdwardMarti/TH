<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\
include_once realpath('../../facade/PensionFacade.php');

$list=PensionFacade::listAll();
$rta="";
foreach ($list as $obj => $Pension) {	
	$rta.="{
 	    \"idpension\":\"{$Pension->getidpension()}\",
	    \"pension_nombre\":\"{$Pension->getpension_nombre()}\"
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