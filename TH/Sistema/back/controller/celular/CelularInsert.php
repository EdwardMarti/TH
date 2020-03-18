<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../../facade/CelularFacade.php');

$id = $_POST['id'];
$numero = $_POST['numero'];
CelularFacade::insert($id, $numero);
echo "true";

//That´s all folks!