<?php 
 include_once realpath('../../controler/EmpresaControler.php'); 
 require_once realpath('../../entity/Empresa.php'); 
 $array_empresa = $_POST['empresa']; 
 $empresa = new Empresa(); 
 $empresa->set_Meta_Columnas($array_empresa); 
 echo EmpresaControler::update($empresa);
 ?>