<?php 
 include_once realpath('../../controler/RollControler.php'); 
 require_once realpath('../../entity/Roll.php'); 
 $array_roll = $_POST['roll']; 
 $roll = new Roll(); 
 $roll->set_Meta_Columnas($array_roll); 
 echo RollControler::update($roll);
 ?>