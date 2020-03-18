<?php 
 include_once realpath('../../controler/CargoControler.php'); 
 require_once realpath('../../entity/Cargo.php'); 
 $array_cargo = $_POST['cargo']; 
 $cargo = new Cargo(); 
 $cargo->set_Meta_Columnas($array_cargo); 
 echo CargoControler::insert($cargo);
 ?>