<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../../facade/EmpresaFacade.php');
$emp = $_GET['empresa'];

$list=EmpresaFacade::listAll_sucursal($emp);
$rta="";
foreach ($list as $obj => $Empresa) {	
	$rta.="{
 	    \"idempresa\":\"{$Empresa->getidempresa()}\",
	    \"nombre_empresa\":\"{$Empresa->getnombre_empresa()}\",
	    \"nit_empresa\":\"{$Empresa->getnit_empresa()}\",
	    \"direccion_empresa\":\"{$Empresa->getdireccion_empresa()}\"
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