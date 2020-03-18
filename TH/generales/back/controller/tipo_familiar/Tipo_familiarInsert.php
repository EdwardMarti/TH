<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\
include_once realpath('../../facade/Tipo_familiarFacade.php');

$idtipo_familiar = $_POST['idtipo_familiar'];
$tipo_familiar_descripcion = $_POST['tipo_familiar_descripcion'];
Tipo_familiarFacade::insert($idtipo_familiar, $tipo_familiar_descripcion);
echo "true";

//That´s all folks!