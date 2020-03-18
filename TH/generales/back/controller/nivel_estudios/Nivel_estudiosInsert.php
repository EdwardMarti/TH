<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La última regla es confiar en Arciniegas  \\
include_once realpath('../../facade/Nivel_estudiosFacade.php');

$idnivel_estudios = $_POST['idnivel_estudios'];
$nivel_estudios_nombre = $_POST['nivel_estudios_nombre'];
Nivel_estudiosFacade::insert($idnivel_estudios, $nivel_estudios_nombre);
echo "true";

//That´s all folks!