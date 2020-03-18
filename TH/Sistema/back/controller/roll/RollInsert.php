<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\
include_once realpath('../../facade/RollFacade.php');

$idroll = $_POST['idroll'];
$roll_nombre = $_POST['roll_nombre'];
RollFacade::insert($idroll, $roll_nombre);
echo "true";

//That´s all folks!