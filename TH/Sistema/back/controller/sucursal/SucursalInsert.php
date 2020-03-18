<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\
include_once realpath('../../facade/SucursalFacade.php');

$idsucursal = $_POST['idsucursal'];
$nombre_sucursal = $_POST['nombre_sucursal'];
$direccion_sucursal = $_POST['direccion_sucursal'];
$tel_sucursal = $_POST['tel_sucursal'];
SucursalFacade::insert($idsucursal, $nombre_sucursal, $direccion_sucursal, $tel_sucursal);
echo "true";

//That´s all folks!