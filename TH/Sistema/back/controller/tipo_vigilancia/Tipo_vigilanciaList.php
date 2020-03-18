<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../../facade/Tipo_vigilanciaFacade.php');

$list=Tipo_vigilanciaFacade::listAll();
$rta="";
foreach ($list as $obj => $Tipo_vigilancia) {	
	$rta.="{
 	    \"id\":\"{$Tipo_vigilancia->getid()}\",
	    \"tipo_vigilancia\":\"{$Tipo_vigilancia->gettipo_vigilancia()}\"
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