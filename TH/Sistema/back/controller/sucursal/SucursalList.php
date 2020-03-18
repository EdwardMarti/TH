<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Documentaqué?  \\
include_once realpath('../../facade/SucursalFacade.php');

$list=SucursalFacade::listAll();
$rta="";
foreach ($list as $obj => $Sucursal) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Sucursal->getidsucursal()."</td>\n";
	$rta.="<td>".$Sucursal->getnombre_sucursal()."</td>\n";
	$rta.="<td>".$Sucursal->getdireccion_sucursal()."</td>\n";
	$rta.="<td>".$Sucursal->gettel_sucursal()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!