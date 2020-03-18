<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Soy la sonrisa burlona y vengativa de Jack  \\
include_once realpath('../../facade/DepartamentoFacade.php');

$list=DepartamentoFacade::listAll();
$rta="";
$s = array();
foreach ($list as $obj => $Departamento) {	
	$rta.="{
 	    \"iddepartamento\":\"{$Departamento->getiddepartamento()}\",
	    \"departamento_descripcion\":\"{$Departamento->getdepartamento_descripcion()}\",
	    \"pais_idpais_idpais\":\"{$Departamento->getpais_idpais()->getidpais()}\"
	},";
	$ss = array(
		'iddepartamento'=>$Departamento->getiddepartamento(),
		'departamento_descripcion'=>$Departamento->getdepartamento_descripcion()
	);
	array_push($s,$ss);
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
//echo json_encode($s);

echo "[{$msg},{$rta}]";
//That´s all folks!