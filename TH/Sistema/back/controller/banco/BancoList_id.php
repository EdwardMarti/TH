<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../../facade/BancoFacade.php');
$empresa = $_GET['idarea_emp'];
$list=BancoFacade::listAll_id($Banco);
$rta="";
foreach ($list as $obj => $Banco) {	
	$rta.="{
 	    \"idbanco\":\"{$Banco->getidbanco()}\",
	    \"banco_nombre\":\"{$Banco->getbanco_nombre()}\",
	    \"numero_cuenta\":\"{$Banco->getnumero_cuenta()}\",
	    \"persona_id_id\":\"{$Banco->getpersona_id()->getid()}\"
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