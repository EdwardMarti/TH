<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\
include_once realpath('../../facade/Varios_empresaFacade.php');

$idvarios_empresa = $_POST['idvarios_empresa'];
$cnsc = $_POST['cnsc'];
$fecha_acre_super = $_POST['fecha_acre_super'];
$acta_consejo = $_POST['acta_consejo'];
$fecha_aceptacion = $_POST['fecha_aceptacion'];
$psicofisico = $_POST['psicofisico'];
$fecha_examen_psicofisico = $_POST['fecha_examen_psicofisico'];
$Carnet_supervigilancia_idcarne = $_POST['carnet_supervigilancia_idcarne'];
$carnet_supervigilancia= new Carnet_supervigilancia();
$carnet_supervigilancia->setIdcarne($Carnet_supervigilancia_idcarne);
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
Varios_empresaFacade::insert($idvarios_empresa, $cnsc, $fecha_acre_super, $acta_consejo, $fecha_aceptacion, $psicofisico, $fecha_examen_psicofisico, $carnet_supervigilancia, $persona);
echo "true";

//That´s all folks!