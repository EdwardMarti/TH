<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../../facade/Fechas_particularesFacade.php');

$list=Fechas_particularesFacade::listAll();
$rta="";
foreach ($list as $obj => $Fechas_particulares) {	
	$rta.="{
 	    \"estudio_seguridad\":\"{$Fechas_particulares->getestudio_seguridad()}\",
	    \"examen_medico\":\"{$Fechas_particulares->getexamen_medico()}\",
	    \"prueba_psicotecnica\":\"{$Fechas_particulares->getprueba_psicotecnica()}\",
	    \"id\":\"{$Fechas_particulares->getid()}\",
	    \"persona_id_id\":\"{$Fechas_particulares->getpersona_id()->getid()}\"
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