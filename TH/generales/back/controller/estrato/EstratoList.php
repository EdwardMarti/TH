<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\
include_once realpath('../../facade/EstratoFacade.php');

$list=EstratoFacade::listAll();
$rta="";
foreach ($list as $obj => $Estrato) {	
	$rta.="{
 	    \"idestrato\":\"{$Estrato->getidestrato()}\",
	    \"estrato_nombre\":\"{$Estrato->getestrato_nombre()}\"
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