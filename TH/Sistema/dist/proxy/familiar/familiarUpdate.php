<?php 
 include_once realpath('../../controler/FamiliarControler.php'); 
 require_once realpath('../../entity/Familiar.php'); 
 $array_familiar = $_POST['familiar']; 
 $familiar = new Familiar(); 
 $familiar->set_Meta_Columnas($array_familiar); 
 echo FamiliarControler::update($familiar);
 ?>