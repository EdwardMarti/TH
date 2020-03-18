<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../../facade/Area_empresaFacade.php');

//$idarea_emp = $_POST['idarea_emp'];

//$nom_area = 'OPERACIONES';
//$Empresa_idempresa = '1';
$nom_area = $_POST['nom_area'];
$Empresa_idempresa = $_POST['empresa_idempresa'];
$empresa= new Empresa();
$empresa->setIdempresa($Empresa_idempresa);
Area_empresaFacade::insert($nom_area, $empresa);
echo "true";

//That´s all folks!