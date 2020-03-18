<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../../facade/PensionFacade.php');

$idpension = $_POST['idpension'];
$pension_nombre = $_POST['pension_nombre'];
PensionFacade::insert($idpension, $pension_nombre);
echo "true";

//That´s all folks!