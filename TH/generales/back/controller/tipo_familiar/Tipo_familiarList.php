<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\
include_once realpath('../../facade/Tipo_familiarFacade.php');

$list=Tipo_familiarFacade::listAll();
$rta="";
foreach ($list as $obj => $Tipo_familiar) {	
	$rta.="{
 	    \"idtipo_familiar\":\"{$Tipo_familiar->getidtipo_familiar()}\",
	    \"tipo_familiar_descripcion\":\"{$Tipo_familiar->gettipo_familiar_descripcion()}\"
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