<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\
include_once realpath('../../facade/BarrioFacade.php');

$idbarrio = $_POST['idbarrio'];
$barrioco_nombre = $_POST['barrioco_nombre'];
$Ciudad_idciudad = $_POST['ciudad_idciudad'];
$ciudad= new Ciudad();
$ciudad->setIdciudad($Ciudad_idciudad);
BarrioFacade::insert($idbarrio, $barrioco_nombre, $ciudad);
echo "true";

//That´s all folks!