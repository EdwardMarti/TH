<?php

include_once realpath('../../facade/Cargo_empresoFacade.php');
$area = $_GET['area'];

$list=Cargo_empresoFacade::listCargoXArea($area);
//var_dump($list);
$rta="";
foreach ($list as $obj => $Cargo_empreso) {
    
    //var_dump($Cargo_empreso->getarea_empresa_idarea_emp());
    
    
	$rta.="{
 	    \"idcargo\":\"{$Cargo_empreso->getidcargo()}\",
	    \"nom_cargo\":\"{$Cargo_empreso->getnom_cargo()}\",
	    \"area_empresa_idarea_emp\":\"{$Cargo_empreso->getArea_empresa_idarea_emp()->getIdarea_emp()}\"
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