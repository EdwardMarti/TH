<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\
include_once realpath('../../facade/Familiar_has_celularFacade.php');

$Familiar_id = $_POST['familiar_id'];
$familiar= new Familiar();
$familiar->setId($Familiar_id);
$Celular_id = $_POST['celular_id'];
$celular= new Celular();
$celular->setId($Celular_id);
Familiar_has_celularFacade::insert($familiar, $celular);
echo "true";

//That´s all folks!