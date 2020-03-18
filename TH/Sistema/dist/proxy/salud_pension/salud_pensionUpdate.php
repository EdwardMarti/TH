<?php 
 include_once realpath('../../controler/Salud_pensionControler.php'); 
 require_once realpath('../../entity/Salud_pension.php'); 
 $array_salud_pension = $_POST['salud_pension']; 
 $salud_pension = new Salud_pension(); 
 $salud_pension->set_Meta_Columnas($array_salud_pension); 
 echo Salud_pensionControler::update($salud_pension);
 ?>