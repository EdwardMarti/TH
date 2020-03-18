<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\
include_once realpath('../../facade/Carnet_supervigilanciaFacade.php');

$idcarne = $_POST['idcarne'];
$carnet_nombre = $_POST['carnet_nombre'];
Carnet_supervigilanciaFacade::insert($idcarne, $carnet_nombre);
echo "true";

//That´s all folks!