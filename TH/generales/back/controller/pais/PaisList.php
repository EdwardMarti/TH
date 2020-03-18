<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\
include_once realpath('../../facade/PaisFacade.php');

$list=PaisFacade::listAll();
$rta="";
foreach ($list as $obj => $Pais) {	
	$rta.="{
 	    \"idpais\":\"{$Pais->getidpais()}\",
	    \"pais_descripcion\":\"{$Pais->getpais_descripcion()}\"
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