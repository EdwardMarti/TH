<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/PersonaFacade.php');

//$empresa = $_POST["empresa"];//
$empresa = $_GET['empresa'];
//var_dump($id);
//$id = '0';

$list=PersonaFacade::listAll_tabla($empresa);
$rta="";
foreach ($list as $obj => $Persona) {	
	$rta.="{
 	    \"id\":\"{$Persona->getid()}\",
	    \"cedula\":\"{$Persona->getcedula()}\",
	   
	    \"nombres\":\"{$Persona->getnombres()}\",
	    \"apellidos\":\"{$Persona->getapellidos()}\",

            
	    \"nivel_vigilancia_id_id\":\"{$Persona->getnivel_vigilancia_id_p()->getid()}\",
                 \"cargo_id\":\"{$Persona->getcargo_id()->getid()}\",
	    \"tipo_vigilancia_id_id\":\"{$Persona->gettipo_vigilancia_id()->getid()}\"
	  
	},";
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	//$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	//$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!
	   
	
	  
//	    \"cargo_id_id\":\"{$Persona->getcargo_id()->getid()}\",