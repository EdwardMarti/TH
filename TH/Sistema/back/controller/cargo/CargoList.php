<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\
include_once realpath('../../facade/CargoFacade.php');

$list=CargoFacade::listAll();
$rta="";
foreach ($list as $obj => $Cargo) {	
	$rta.="{
 	    \"id\":\"{$Cargo->getid()}\",
	    \"fecha_ingreso\":\"{$Cargo->getfecha_ingreso()}\",
	    \"empresa_idempresa_idempresa\":\"{$Cargo->getempresa_idempresa()->getidempresa()}\",
	    \"area_empresa_idarea_emp_idarea_emp\":\"{$Cargo->getarea_empresa_idarea_emp()->getidarea_emp()}\",
	    \"cargo_empreso_idcargo_idcargo\":\"{$Cargo->getcargo_empreso_idcargo()->getidcargo()}\",
	    \"puesto_idpuesto_idpuesto\":\"{$Cargo->getpuesto_idpuesto()->getidpuesto()}\"
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