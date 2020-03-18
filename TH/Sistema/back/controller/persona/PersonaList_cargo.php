<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/PersonaFacade.php');
$emp = $_GET['empresa'];
//$emp = '1';
$list=PersonaFacade::select_actCargo($emp);
//var_dump($list);
$rta="";
foreach ($list as $obj => $Persona) {	
	$rta.="{
 	    \"id\":\"{$Persona->getid()}\",
	    \"cedula\":\"{$Persona->getcedula()}\",
	    \"nacionalidad\":\"{$Persona->getnacionalidad()}\"
	   
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