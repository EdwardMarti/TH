<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\
include_once realpath('../../facade/Empresa_pFacade.php');

$idEmpresa_p = $_POST['idEmpresa_p'];
$Empresa_p_nombre = $_POST['Empresa_p_nombre'];
$nit_empresa_p = $_POST['nit_empresa_p'];
$Empresa_p_direccion = $_POST['Empresa_p_direccion'];
$Empresa_p_tel = $_POST['Empresa_p_tel'];
Empresa_pFacade::update($idEmpresa_p, $Empresa_p_nombre, $nit_empresa_p, $Empresa_p_direccion, $Empresa_p_tel);
echo "true";

//That´s all folks!