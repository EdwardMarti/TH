<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../../facade/Area_empresaFacade.php');

//$idarea_emp = '2';
//$nom_area = 'ADMINITRATsdfIVOsasd';
$idarea_emp = $_POST['idarea_emp'];
$nom_area = '0';
$nom_area=strtoupper($nom_area); /// pasa a Mayusculas
$rta=Area_empresaFacade::update_Eliminar($idarea_emp,$nom_area);
//print_r($rta);
//var_dump("asd".$rta);
if($rta='1'){
    echo 'true';
}else{
    echo 'false';
}

//var_dump("arr".$rta);
//echo $rta;
//echo "true";

//That´s all folks!