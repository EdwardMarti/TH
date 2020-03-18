<?php 
 include_once realpath('../../controler/Tipo_vigilanciaControler.php'); 
 require_once realpath('../../entity/Tipo_vigilancia.php'); 
 $array_tipo_vigilancia = $_POST['tipo_vigilancia']; 
 $tipo_vigilancia = new Tipo_vigilancia(); 
 $tipo_vigilancia->set_Meta_Columnas($array_tipo_vigilancia); 
 echo Tipo_vigilanciaControler::insert($tipo_vigilancia);
 ?>