<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\
include_once realpath('../../facade/BancoFacade.php');

$idbanco = $_POST['idbanco'];
$banco_nombre = $_POST['banco_nombre'];
$numero_cuenta = $_POST['numero_cuenta'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
BancoFacade::insert($idbanco, $banco_nombre, $numero_cuenta, $persona);
echo "true";

//That´s all folks!