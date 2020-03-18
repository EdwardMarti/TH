<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\
include_once realpath('../../facade/Carnet_supervigilanciaFacade.php');

$list=Carnet_supervigilanciaFacade::listAll();
$rta="";
foreach ($list as $obj => $Carnet_supervigilancia) {	
	$rta.="{
 	    \"idcarne\":\"{$Carnet_supervigilancia->getidcarne()}\",
	    \"carnet_nombre\":\"{$Carnet_supervigilancia->getcarnet_nombre()}\"
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