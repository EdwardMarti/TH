<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\
include_once realpath('../../facade/Estado_civilFacade.php');

$list=Estado_civilFacade::listAll();
$rta="";
foreach ($list as $obj => $Estado_civil) {	
	$rta.="{
 	    \"idestado_civil\":\"{$Estado_civil->getidestado_civil()}\",
	    \"estado_civil_descripcion\":\"{$Estado_civil->getestado_civil_descripcion()}\"
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