<?php 
 include_once realpath('../../controler/Carnet_supervigilanciaControler.php'); 
 require_once realpath('../../entity/Carnet_supervigilancia.php'); 
 $array_carnet_supervigilancia = $_POST['carnet_supervigilancia']; 
 $carnet_supervigilancia = new Carnet_supervigilancia(); 
 $carnet_supervigilancia->set_Meta_Columnas($array_carnet_supervigilancia); 
 echo Carnet_supervigilanciaControler::insert($carnet_supervigilancia);
 ?>