<?php 
 include_once realpath('../../controler/EstudioControler.php'); 
 require_once realpath('../../entity/Estudio.php'); 
 $array_estudio = $_POST['estudio']; 
 $estudio = new Estudio(); 
 $estudio->set_Meta_Columnas($array_estudio); 
 echo EstudioControler::update($estudio);
 ?>