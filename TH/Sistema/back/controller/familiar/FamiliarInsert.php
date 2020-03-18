<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../../facade/FamiliarFacade.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$parentesco = $_POST['parentesco'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
FamiliarFacade::insert($id, $nombre, $apellido, $parentesco, $persona);
echo "true";

//That´s all folks!