<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\
include_once realpath('../../facade/Varios_empresaFacade.php');

$list=Varios_empresaFacade::listAll();
$rta="";
foreach ($list as $obj => $Varios_empresa) {	
	$rta.="{
 	    \"idvarios_empresa\":\"{$Varios_empresa->getidvarios_empresa()}\",
	    \"cnsc\":\"{$Varios_empresa->getcnsc()}\",
	    \"fecha_acre_super\":\"{$Varios_empresa->getfecha_acre_super()}\",
	    \"acta_consejo\":\"{$Varios_empresa->getacta_consejo()}\",
	    \"fecha_aceptacion\":\"{$Varios_empresa->getfecha_aceptacion()}\",
	    \"psicofisico\":\"{$Varios_empresa->getpsicofisico()}\",
	    \"fecha_examen_psicofisico\":\"{$Varios_empresa->getfecha_examen_psicofisico()}\",
	    \"carnet_supervigilancia_idcarne_idcarne\":\"{$Varios_empresa->getcarnet_supervigilancia_idcarne()->getidcarne()}\",
	    \"persona_id_id\":\"{$Varios_empresa->getpersona_id()->getid()}\"
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