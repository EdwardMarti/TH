<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\
include_once realpath('../../facade/EpsFacade.php');

$ideps = $_POST['ideps'];
$eps_nombre = $_POST['eps_nombre'];
EpsFacade::insert($ideps, $eps_nombre);
echo "true";

//That´s all folks!