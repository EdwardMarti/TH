<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\
include_once realpath('../../facade/PaisFacade.php');

$idpais = $_POST['idpais'];
$pais_descripcion = $_POST['pais_descripcion'];
PaisFacade::insert($idpais, $pais_descripcion);
echo "true";

//That´s all folks!