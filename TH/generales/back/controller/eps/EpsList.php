<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\
include_once realpath('../../facade/EpsFacade.php');

$list=EpsFacade::listAll();
$rta="";
foreach ($list as $obj => $Eps) {	
	$rta.="{
 	    \"ideps\":\"{$Eps->getideps()}\",
	    \"eps_nombre\":\"{$Eps->geteps_nombre()}\"
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