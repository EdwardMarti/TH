<?php 
 include_once realpath('../../controler/Fechas_particularesControler.php'); 
 require_once realpath('../../entity/Fechas_particulares.php'); 
 $array_fechas_particulares = $_POST['fechas_particulares']; 
 $fechas_particulares = new Fechas_particulares(); 
 $fechas_particulares->set_Meta_Columnas($array_fechas_particulares); 
 echo Fechas_particularesControler::insert($fechas_particulares);
 ?>