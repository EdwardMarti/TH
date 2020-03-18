<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\
include_once realpath('../../facade/EmpresaFacade.php');

include_once realpath('../../facade/EmpresaFacade.php');

//$idempresa = $_POST['idempresa'];
//$nombre_empresa = 'sadsad';
//$nit_empresa = '21131313213';
//$direccion_empresa = 'av 3 25 65 brr san mateo';
//$Empresa_p_idEmpresa_p = '1';
$nombre_empresa = $_POST['nombre_ciudad_r'];
$nit_empresa = $_POST['nit_empresa_r'];
$direccion_empresa = $_POST['direccion_empresa_r'];
$Empresa_p_idEmpresa_p = $_POST['Empresa_p_idEmpresa_p_r'];
EmpresaFacade::insert( $nombre_empresa, $nit_empresa,$direccion_empresa, $Empresa_p_idEmpresa_p);
echo "true";

//That´s all folks!