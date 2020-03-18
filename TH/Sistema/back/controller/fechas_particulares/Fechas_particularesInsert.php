<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\
include_once realpath('../../facade/Fechas_particularesFacade.php');

$estudio_seguridad = $_POST['estudio_seguridad'];
$examen_medico = $_POST['examen_medico'];
$prueba_psicotecnica = $_POST['prueba_psicotecnica'];
$id = $_POST['id'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
Fechas_particularesFacade::insert($estudio_seguridad, $examen_medico, $prueba_psicotecnica, $id, $persona);
echo "true";

//That´s all folks!