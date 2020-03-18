<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\
include_once realpath('../../facade/Grupo_sanguineoFacade.php');

$idgrupo_sanguineo = $_POST['idgrupo_sanguineo'];
$grupo_sanguineo_nombre = $_POST['grupo_sanguineo_nombre'];
Grupo_sanguineoFacade::insert($idgrupo_sanguineo, $grupo_sanguineo_nombre);
echo "true";

//That´s all folks!