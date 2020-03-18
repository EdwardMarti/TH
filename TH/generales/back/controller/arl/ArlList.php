<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\
include_once realpath('../../facade/ArlFacade.php');

$list=ArlFacade::listAll();
$rta="";
foreach ($list as $obj => $Arl) {	
	$rta.="{
 	    \"idarl\":\"{$Arl->getidarl()}\",
	    \"arl_nombre\":\"{$Arl->getarl_nombre()}\"
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