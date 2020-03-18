<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\
include_once realpath('../../facade/BancoFacade.php');

$list=BancoFacade::listAll();
$rta="";
foreach ($list as $obj => $Banco) {	
	$rta.="{
 	    \"idbanco\":\"{$Banco->getidbanco()}\",
	    \"banco_descripcion\":\"{$Banco->getbanco_descripcion()}\"
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