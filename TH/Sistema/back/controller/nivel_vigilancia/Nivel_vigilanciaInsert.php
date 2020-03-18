<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\
include_once realpath('../../facade/Nivel_vigilanciaFacade.php');

//$id = $_POST['id'];
$nombre =strtoupper($_POST['nombre_1']); 
Nivel_vigilanciaFacade::insert( $nombre);
echo "true";

//That´s all folks!