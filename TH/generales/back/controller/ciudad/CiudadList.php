<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../../facade/CiudadFacade.php');
$depa = $_GET['depa']; 
$list=CiudadFacade::listXDepartamento($depa);
$rta="";
foreach ($list as $obj => $Ciudad) {	
	$rta.="{
 	    \"idciudad\":\"{$Ciudad->getidciudad()}\",
	    \"ciudad_descripcion\":\"{$Ciudad->getciudad_descripcion()}\",
	    \"departamento_iddepartamento_iddepartamento\":\"{$Ciudad->getdepartamento_iddepartamento()->getiddepartamento()}\"
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