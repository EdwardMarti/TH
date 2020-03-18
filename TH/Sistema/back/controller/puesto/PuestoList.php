<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\
include_once realpath('../../facade/PuestoFacade.php');

$list=PuestoFacade::listAll();
$rta="";
foreach ($list as $obj => $Puesto) {	
	$rta.="{
 	    \"idpuesto\":\"{$Puesto->getidpuesto()}\",
	    \"nombre\":\"{$Puesto->getnombre()}\"
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