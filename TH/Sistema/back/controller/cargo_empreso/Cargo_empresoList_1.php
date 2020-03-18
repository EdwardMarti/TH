<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\ NO TOCA


//NO TOCAR USADO PARA CARGAR LAS TABLAS EN CARGOS CON RESPECTO A UNA EMPRESA

include_once realpath('../../facade/Cargo_empresoFacade.php');
$empresa = $_GET['empresa'];
//$empresa = '1';
//var_dump($empresa);
$list=Cargo_empresoFacade::listCargoXArea($empresa);
//$list=Cargo_empresoFacade::listAll();
//var_dump($list);
$rta="";
foreach ($list as $obj => $Cargo_empreso) {
    
   
	$rta.="{
 	    \"idcargo\":\"{$Cargo_empreso->getidcargo()}\",
	    \"nom_cargo\":\"{$Cargo_empreso->getnom_cargo()}\",
	    \"area_empresa_idarea_emp\":\"{$Cargo_empreso->getarea_empresa_idarea_emp()->getNom_area()}\"
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