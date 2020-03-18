<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Vaya! ¡Al fin harás algo mejor que una calculadora!  \\
include_once realpath('../../facade/CiudadFacade.php');

$idciudad = $_POST['idciudad'];
$ciudad_descripcion = $_POST['ciudad_descripcion'];
$Departamento_iddepartamento = $_POST['departamento_iddepartamento'];
$departamento= new Departamento();
$departamento->setIddepartamento($Departamento_iddepartamento);
CiudadFacade::insert($idciudad, $ciudad_descripcion, $departamento);
echo "true";

//That´s all folks!