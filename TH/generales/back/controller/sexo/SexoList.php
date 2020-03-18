<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../../facade/SexoFacade.php');

$list=SexoFacade::listAll();
$rta="";
foreach ($list as $obj => $Sexo) {	
	$rta.="{
 	    \"idsexo\":\"{$Sexo->getidsexo()}\",
	    \"sexo_descripcion\":\"{$Sexo->getsexo_descripcion()}\"
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