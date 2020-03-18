<?php 
 include_once realpath('../../controler/Varios_empresaControler.php'); 
 require_once realpath('../../entity/Varios_empresa.php'); 
 $array_varios_empresa = $_POST['varios_empresa']; 
 $varios_empresa = new Varios_empresa(); 
 $varios_empresa->set_Meta_Columnas($array_varios_empresa); 
 echo Varios_empresaControler::insert($varios_empresa);
 ?>