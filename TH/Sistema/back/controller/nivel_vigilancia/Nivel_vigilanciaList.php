<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Has escuchado hablar del grandioso señor Arciniegas?  \\
include_once realpath('../../facade/Nivel_vigilanciaFacade.php');

$list=Nivel_vigilanciaFacade::listAll();
$rta="";
foreach ($list as $obj => $Nivel_vigilancia) {	
	$rta.="{
 	    \"id\":\"{$Nivel_vigilancia->getid()}\",
	    \"nombre\":\"{$Nivel_vigilancia->getnombre()}\"
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