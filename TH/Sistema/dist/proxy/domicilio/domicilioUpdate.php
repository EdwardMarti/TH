<?php 
 include_once realpath('../../controler/DomicilioControler.php'); 
 require_once realpath('../../entity/Domicilio.php'); 
 $array_domicilio = $_POST['domicilio']; 
 $domicilio = new Domicilio(); 
 $domicilio->set_Meta_Columnas($array_domicilio); 
 echo DomicilioControler::update($domicilio);
 ?>