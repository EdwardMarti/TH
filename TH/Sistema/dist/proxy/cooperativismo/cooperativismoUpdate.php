<?php 
 include_once realpath('../../controler/CooperativismoControler.php'); 
 require_once realpath('../../entity/Cooperativismo.php'); 
 $array_cooperativismo = $_POST['cooperativismo']; 
 $cooperativismo = new Cooperativismo(); 
 $cooperativismo->set_Meta_Columnas($array_cooperativismo); 
 echo CooperativismoControler::update($cooperativismo);
 ?>