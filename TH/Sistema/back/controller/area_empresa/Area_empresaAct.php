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
$nom_area = $_POST['nom_area'];
$nom_area=strtoupper($nom_area); /// pasa a Mayusculas
$rta=Area_empresaFacade::update($idarea_emp,$nom_area);
//print_r($rta);
//var_dump("asd".$rta);
if($rta){
    echo 'true';
}else{
    echo 'false';
}

//var_dump("arr".$rta);
//echo $rta;
//echo "true";

//That´s all folks!