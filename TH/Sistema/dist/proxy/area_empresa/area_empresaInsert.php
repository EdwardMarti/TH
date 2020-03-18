<?php 
 include_once realpath('../../controler/Area_empresaControler.php'); 
 require_once realpath('../../entity/Area_empresa.php'); 
 $array_area_empresa = $_POST['area_empresa']; 
 $area_empresa = new Area_empresa(); 
 $area_empresa->set_Meta_Columnas($array_area_empresa); 
 echo Area_empresaControler::insert($area_empresa);
 ?>