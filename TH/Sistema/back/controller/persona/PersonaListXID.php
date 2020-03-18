<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/PersonaFacade.php');
$id = $_POST["idPersona"];
$list=PersonaFacade::listXID($id);
$rta="";
foreach ($list as $obj => $Persona) {	
	$rta.="{
 	    \"id\":\"{$Persona->getid()}\",
	    \"cedula\":\"{$Persona->getcedula()}\",
	    \"nacionalidad\":\"{$Persona->getnacionalidad()}\",
	    \"cedula_lugar_expedicion\":\"{$Persona->getcedula_lugar_expedicion()}\",
	    \"nombres\":\"{$Persona->getnombres()}\",
	    \"apellidos\":\"{$Persona->getapellidos()}\",
	    \"fechaNacimiento\":\"{$Persona->getfechaNacimiento()}\",
	    \"lugar_nacimiento\":\"{$Persona->getlugar_nacimiento()}\",
	    \"sexo\":\"{$Persona->getsexo()}\",
	    \"grupo_sanguineo\":\"{$Persona->getgrupo_sanguineo()}\",
	    \"estado_civil\":\"{$Persona->getestado_civil()}\",
	    \"correo\":\"{$Persona->getcorreo()}\",
	    \"estado\":\"{$Persona->getestado()}\",
	    \"cargo_id_id\":\"{$Persona->getcargo_id()->getid()}\",
	    \"nivel_vigilancia_id_id\":\"{$Persona->getnivel_vigilancia_id_p()->getid()}\",
	    \"tipo_vigilancia_id_id\":\"{$Persona->gettipo_vigilancia_id()->getid()}\"
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