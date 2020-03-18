<?php 
 include_once realpath('../../controler/PuestoControler.php'); 
 require_once realpath('../../entity/Puesto.php'); 
 $array_puesto = $_POST['puesto']; 
 $puesto = new Puesto(); 
 $puesto->set_Meta_Columnas($array_puesto); 
 echo PuestoControler::update($puesto);
 ?>