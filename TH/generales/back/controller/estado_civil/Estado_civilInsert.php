<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Anarchy! Apoyando la vagancia desde 2017  \\
include_once realpath('../../facade/Estado_civilFacade.php');

$idestado_civil = $_POST['idestado_civil'];
$estado_civil_descripcion = $_POST['estado_civil_descripcion'];
Estado_civilFacade::insert($idestado_civil, $estado_civil_descripcion);
echo "true";

//That´s all folks!