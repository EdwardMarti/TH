<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../../facade/CargoFacade.php');
include_once realpath('../../facade/PersonaFacade.php');



//$id = $_POST['id'];
//$id = $_POST['id'];
//
//
$fecha_ingreso = $_POST['fecha_ingreso'];


$Empresa_idempresa_p = $_POST['idEmpresa_p'];
$empresa_p= new Empresa_p();
$empresa_p->setIdEmpresa_p($Empresa_idempresa_p);

$Empresa_idempresa = $_POST['empresa_idempresa'];
$empresa= new Empresa();
$empresa->setIdempresa($Empresa_idempresa);

$Area_empresa_idarea_emp = $_POST['area_empresa_idarea_emp'];
$area_empresa= new Area_empresa();
$area_empresa->setIdarea_emp($Area_empresa_idarea_emp);

$Cargo_empreso_idcargo = $_POST['cargo_empreso_idcargo'];
$cargo_empreso= new Cargo_empreso();
$cargo_empreso->setIdcargo($Cargo_empreso_idcargo);

$Puesto_idpuesto = $_POST['puesto_idpuesto'];
$puesto= new Puesto();
$puesto->setIdpuesto($Puesto_idpuesto);

$Persona = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona);


//$fecha_Salida = $_POST['fecha_SalidaAct'];

//$Observacion = $_POST['observacion_tras'];
$Observacion = $_POST['imputobservacion_tras'];
//$Observacion ='juazasdasd as asdas';

$id = $_POST['idAct2'];


//$fecha_ingreso = '2019-07-01';
//
//$Empresa_idempresa_p = '1';
//$empresa_p= new Empresa_p();
//$empresa_p->setIdEmpresa_p($Empresa_idempresa_p);
//
//$Empresa_idempresa = '1';
//$empresa= new Empresa();
//$empresa->setIdempresa($Empresa_idempresa);
//
//$Area_empresa_idarea_emp = '2';
//$area_empresa= new Area_empresa();
//$area_empresa->setIdarea_emp($Area_empresa_idarea_emp);
//
//$Cargo_empreso_idcargo = '5';
//$cargo_empreso= new Cargo_empreso();
//$cargo_empreso->setIdcargo($Cargo_empreso_idcargo);
//
//$Puesto_idpuesto = '11';
//$puesto= new Puesto();
//$puesto->setIdpuesto($Puesto_idpuesto);
//
//$Persona = '1';
//$persona= new Persona();
//$persona->setId($Persona);

$rta=CargoFacade::insertNuevo($fecha_ingreso, $empresa, $area_empresa, $cargo_empreso, $puesto,$empresa_p,$persona);

//print_r($rpta);
//echo ''+$rpta;

if($rta>0){

$id = $Persona;
$Cargo_id = $rta;

    $rta2=PersonaFacade::updateCargo($id, $Cargo_id);
    if($rta2>0){
        return "true"; 
//        echo "true";
    }
      echo "true";
//    $rta2=PersonaFacade::updateCargo($id, $cedula, $cargo_id);
     // echo "true".$rta;
//    if($rta2){
//      
//    }
    
    
}


//That´s all folks!