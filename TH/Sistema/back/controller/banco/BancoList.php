<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../../facade/BancoFacade.php');
$banco_id = $_GET['idarea_emp'];
//$banco = new Banco();
//$banco=$banco->setIdbanco($idbanco);
$list=BancoFacade::listAll_id($banco_id);
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