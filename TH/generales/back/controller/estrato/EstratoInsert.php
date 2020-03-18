<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No dejes el código del futuro en manos humanas  \\
include_once realpath('../../facade/EstratoFacade.php');

$idestrato = $_POST['idestrato'];
$estrato_nombre = $_POST['estrato_nombre'];
EstratoFacade::insert($idestrato, $estrato_nombre);
echo "true";

//That´s all folks!