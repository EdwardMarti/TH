<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\
include_once realpath('../../facade/Persona_has_celularFacade.php');

$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
$Celular_id = $_POST['celular_id'];
$celular= new Celular();
$celular->setId($Celular_id);
Persona_has_celularFacade::insert($persona, $celular);
echo "true";

//That´s all folks!