<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\
include_once realpath('../../facade/BancoFacade.php');

$idbanco = $_POST['idbanco'];
$banco_descripcion = $_POST['banco_descripcion'];
BancoFacade::insert($idbanco, $banco_descripcion);
echo "true";

//That´s all folks!