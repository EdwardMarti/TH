<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\
include_once realpath('../../facade/EstudioFacade.php');

$nivel_academico = $_POST['nivel_academico'];
$nivel_vigilancia = $_POST['nivel_vigilancia'];
$fecha_curso = $_POST['fecha_curso'];
$id = $_POST['id'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
EstudioFacade::insert($nivel_academico, $nivel_vigilancia, $fecha_curso, $id, $persona);
echo "true";

//That´s all folks!