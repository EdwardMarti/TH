<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../../facade/CelularFacade.php');
$id = $_POST['idPersona'];
$list=CelularFacade::listXID($id);
$rta="";
$t ="";
foreach ($list as $obj => $Celular) {	
    $t .= $Celular->getnumero().";";	
}

$rta.="{
	 \"numero\":\"{$t}\"
	},";

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!