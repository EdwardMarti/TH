<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/Area_empresaFacade.php');
//$empresa = '1';
$empresa = $_GET['empresa'];

$list=Area_empresaFacade::listAreaXEmpresa_1($empresa);
$rta="";
$cont=1;
foreach ($list as $obj => $Area_empresa) {	
	$rta.="{
 	   
 	    \"idarea_emp\":\"{$Area_empresa->getidarea_emp()}\",
	    \"nom_area\":\"{$Area_empresa->getnom_area()}\",
	    \"empresa_idempresa_idempresa\":\"{$Area_empresa->getempresa_idempresa()->getNombre_empresa()}\"
	},";
            $cont=$cont+1;
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