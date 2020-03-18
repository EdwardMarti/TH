<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../../facade/Grupo_sanguineoFacade.php');

$list=Grupo_sanguineoFacade::listAll();
$rta="";
foreach ($list as $obj => $Grupo_sanguineo) {	
	$rta.="{
 	    \"idgrupo_sanguineo\":\"{$Grupo_sanguineo->getidgrupo_sanguineo()}\",
	    \"grupo_sanguineo_nombre\":\"{$Grupo_sanguineo->getgrupo_sanguineo_nombre()}\"
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