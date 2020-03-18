<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\
include_once realpath('../../facade/RollFacade.php');

$list=RollFacade::listAll();
$rta="";
foreach ($list as $obj => $Roll) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Roll->getidroll()."</td>\n";
	$rta.="<td>".$Roll->getroll_nombre()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!