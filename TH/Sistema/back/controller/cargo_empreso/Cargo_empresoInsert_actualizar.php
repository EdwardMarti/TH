<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El gran hermano te vigila  \\
include_once realpath('../../facade/Cargo_empresoFacade.php');


//$idcargo = $_POST['idcargo'];
//$nom_cargo = 'SUPERVISOR';
//$area_empresa_idarea_emp = '2';
$idcargo = $_POST['idcargo'];
$nom_cargo = $_POST['nom_cargo'];
//$area_empresa_idarea_emp = $_POST['area_empresa_idarea_emp'];
//$area= new Area_empresa();
//$area->setIdarea_emp($area_empresa_idarea_emp);

Cargo_empresoFacade::update($idcargo,$nom_cargo);
echo "true";

//That´s all folks!