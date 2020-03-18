<?php 
 include_once realpath('../../controler/BancoControler.php'); 
 require_once realpath('../../entity/Banco.php'); 
 $array_banco = $_POST['banco']; 
 $banco = new Banco(); 
 $banco->set_Meta_Columnas($array_banco); 
 echo BancoControler::update($banco);
 ?>