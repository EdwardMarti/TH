<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\
include_once realpath('../../facade/ArlFacade.php');

$idarl = $_POST['idarl'];
$arl_nombre = $_POST['arl_nombre'];
ArlFacade::insert($idarl, $arl_nombre);
echo "true";

//That´s all folks!