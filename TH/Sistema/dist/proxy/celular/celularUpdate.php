<?php 
 include_once realpath('../../controler/CelularControler.php'); 
 require_once realpath('../../entity/Celular.php'); 
 $array_celular = $_POST['celular']; 
 $celular = new Celular(); 
 $celular->set_Meta_Columnas($array_celular); 
 echo CelularControler::update($celular);
 ?>