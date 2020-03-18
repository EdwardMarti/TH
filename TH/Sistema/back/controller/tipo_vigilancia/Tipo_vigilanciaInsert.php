<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../../facade/Tipo_vigilanciaFacade.php');

//$id = $_POST['id'];
$tipo_vigilancia = strtoupper($_POST['nombre_1']);
Tipo_vigilanciaFacade::insert($tipo_vigilancia);
echo "true";

//That´s all folks!