<?php 
 include_once realpath('../../controler/Familiar_has_celularControler.php'); 
 require_once realpath('../../entity/Familiar_has_celular.php'); 
 $array_familiar_has_celular = $_POST['familiar_has_celular']; 
 $familiar_has_celular = new Familiar_has_celular(); 
 $familiar_has_celular->set_Meta_Columnas($array_familiar_has_celular); 
 echo Familiar_has_celularControler::insert($familiar_has_celular);
 ?>