<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../../facade/BarrioFacade.php');
$ciudad = $_GET['ciudad'];
$list=BarrioFacade::listXCiudad($ciudad);
$rta="";
foreach ($list as $obj => $Barrio) {	
	$rta.="{
 	    \"idbarrio\":\"{$Barrio->getidbarrio()}\",
	    \"barrioco_nombre\":\"{$Barrio->getbarrioco_nombre()}\",
	    \"ciudad_idciudad_idciudad\":\"{$Barrio->getciudad_idciudad()->getidciudad()}\"
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