<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Se buscan memeros profesionales. Contacto: El benévolo señor Arciniegas  \\
include_once realpath('../../facade/CooperativismoFacade.php');

$list=CooperativismoFacade::listAll();
$rta="";
foreach ($list as $obj => $Cooperativismo) {	
	$rta.="{
 	    \"idcooperativismo\":\"{$Cooperativismo->getidcooperativismo()}\",
	    \"coop_nombre\":\"{$Cooperativismo->getcoop_nombre()}\",
	    \"coop_fecha\":\"{$Cooperativismo->getcoop_fecha()}\",
	    \"coop_nit\":\"{$Cooperativismo->getcoop_nit()}\",
	    \"persona_id_id\":\"{$Cooperativismo->getpersona_id()->getid()}\"
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