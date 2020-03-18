<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\
include_once realpath('../../facade/DomicilioFacade.php');

$id = $_POST['id'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
DomicilioFacade::insert($id, $direccion, $barrio, $persona);
echo "true";

//That´s all folks!