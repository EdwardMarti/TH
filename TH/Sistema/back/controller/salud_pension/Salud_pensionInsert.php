<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo tengo un sueño. El sueño de que mis hijos vivan en un mundo con un único lenguaje de programación.  \\
include_once realpath('../../facade/Salud_pensionFacade.php');

$id = $_POST['id'];
$salud = $_POST['salud'];
$pension = $_POST['pension'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
Salud_pensionFacade::insert($id, $salud, $pension, $persona);
echo "true";

//That´s all folks!