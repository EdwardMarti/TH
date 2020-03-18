<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\
include_once realpath('../../facade/SexoFacade.php');

$idsexo = $_POST['idsexo'];
$sexo_descripcion = $_POST['sexo_descripcion'];
SexoFacade::insert($idsexo, $sexo_descripcion);
echo "true";

//That´s all folks!