<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../../facade/CargoFacade.php');

$id = $_POST['idAct'];
$fecha_ingreso = $_POST['fecha_SalidaAct'];
$Observacion = $_POST['observacion'];
$Stado ='1';

CargoFacade::update_fecha($id, $fecha_ingreso, $Observacion,$Stado);
echo "true";

//That´s all folks!