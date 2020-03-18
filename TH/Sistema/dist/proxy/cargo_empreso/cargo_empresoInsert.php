<?php 
 include_once realpath('../../controler/Cargo_empresoControler.php'); 
 require_once realpath('../../entity/Cargo_empreso.php'); 
 $array_cargo_empreso = $_POST['cargo_empreso']; 
 $cargo_empreso = new Cargo_empreso(); 
 $cargo_empreso->set_Meta_Columnas($array_cargo_empreso); 
 echo Cargo_empresoControler::insert($cargo_empreso);
 ?>