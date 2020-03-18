<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../../facade/PersonaFacade.php');


$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nacionalidad = $_POST['nacionalidad'];
$cedula_lugar_expedicion = $_POST['cedula_lugar_expedicion'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$sexo = $_POST['sexo'];
$grupo_sanguineo = $_POST['grupo_sanguineo'];
$estado_civil = $_POST['estado_civil'];
$correo = $_POST['correo'];
$estado = $_POST['estado'];
$Cargo_id = $_POST['cargo_id'];
$cargo= new Cargo();
$cargo->setId($Cargo_id);
$Nivel_vigilancia_id_p = $_POST['nivel_vigilancia_id_p'];
$nivel_vigilancia= new Nivel_vigilancia();
$nivel_vigilancia->setId($Nivel_vigilancia_id_p);
$Tipo_vigilancia_id = $_POST['tipo_vigilancia_id'];
$tipo_vigilancia= new Tipo_vigilancia();
$tipo_vigilancia->setId($Tipo_vigilancia_id);
PersonaFacade::insert($id, $cedula, $nacionalidad, $cedula_lugar_expedicion, $nombres, $apellidos, $fechaNacimiento, $lugar_nacimiento, $sexo, $grupo_sanguineo, $estado_civil, $correo, $estado, $cargo, $nivel_vigilancia, $tipo_vigilancia);
echo "true";

//That´s all folks!