<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../../facade/Tipo_vigilanciaFacade.php');

 $id = $_POST['id_1'];
$tipo_vigilancia = strtoupper($_POST['tipo_vigilancia_1']);
Tipo_vigilanciaFacade::update($id,$tipo_vigilancia);
echo "true";

//That´s all folks!