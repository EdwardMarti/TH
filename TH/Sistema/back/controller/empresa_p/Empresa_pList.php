<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\



include_once realpath('../../facade/Empresa_pFacade.php');

$list=Empresa_pFacade::listAll();
$rta="";
foreach ($list as $obj => $Empresa_p) {	
	$rta.="{
 	    \"idEmpresa_p\":\"{$Empresa_p->getidEmpresa_p()}\",
	    \"Empresa_p_nombre\":\"{$Empresa_p->getEmpresa_p_nombre()}\",
	    \"nit_empresa_p\":\"{$Empresa_p->getnit_empresa_p()}\",
	    \"Empresa_p_direccion\":\"{$Empresa_p->getEmpresa_p_direccion()}\",
	    \"Empresa_p_tel\":\"{$Empresa_p->getEmpresa_p_tel()}\"
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

