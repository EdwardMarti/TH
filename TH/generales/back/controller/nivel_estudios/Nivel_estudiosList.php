<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\
include_once realpath('../../facade/Nivel_estudiosFacade.php');

$list=Nivel_estudiosFacade::listAll();
$rta="";
foreach ($list as $obj => $Nivel_estudios) {	
	$rta.="{
 	    \"idnivel_estudios\":\"{$Nivel_estudios->getidnivel_estudios()}\",
	    \"nivel_estudios_nombre\":\"{$Nivel_estudios->getnivel_estudios_nombre()}\"
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