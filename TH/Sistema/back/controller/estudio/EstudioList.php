<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../../facade/EstudioFacade.php');

$list=EstudioFacade::listAll();
$rta="";
foreach ($list as $obj => $Estudio) {	
	$rta.="{
 	    \"nivel_academico\":\"{$Estudio->getnivel_academico()}\",
	    \"nivel_vigilancia\":\"{$Estudio->getnivel_vigilancia()}\",
	    \"fecha_curso\":\"{$Estudio->getfecha_curso()}\",
	    \"id\":\"{$Estudio->getid()}\",
	    \"persona_id_id\":\"{$Estudio->getpersona_id()->getid()}\"
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