<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\
include_once realpath('../../facade/DepartamentoFacade.php');

$iddepartamento = $_POST['iddepartamento'];
$departamento_descripcion = $_POST['departamento_descripcion'];
$Pais_idpais = $_POST['pais_idpais'];
$pais= new Pais();
$pais->setIdpais($Pais_idpais);
DepartamentoFacade::insert($iddepartamento, $departamento_descripcion, $pais);
echo "true";

//That´s all folks!