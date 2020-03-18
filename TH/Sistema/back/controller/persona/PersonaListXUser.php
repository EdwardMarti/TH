<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/PersonaFacade.php');
$id = '1';
//$id = $_GET["empresa"];
$list=PersonaFacade::listXuser($id);
$rta="";
foreach ($list as $obj => $Persona) {	
	$rta.="{
 	    \"id\":\"{$Persona->getid()}\",
	    \"cedula\":\"{$Persona->getcedula()}\",
	    
	    \"nombres\":\"{$Persona->getnombres()}\",
	    \"apellidos\":\"{$Persona->getapellidos()}\",
	 
	    \"sexo\":\"{$Persona->getsexo()}\",
	   
	    \"correo\":\"{$Persona->getcorreo()}\"
	    
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