<?php 
 include_once realpath('../../controler/Nivel_vigilanciaControler.php'); 
 require_once realpath('../../entity/Nivel_vigilancia.php'); 
 $array_nivel_vigilancia = $_POST['nivel_vigilancia']; 
 $nivel_vigilancia = new Nivel_vigilancia(); 
 $nivel_vigilancia->set_Meta_Columnas($array_nivel_vigilancia); 
 echo Nivel_vigilanciaControler::insert($nivel_vigilancia);
 ?>