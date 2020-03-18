<?php 
 include_once realpath('../../controler/UsuarioControler.php'); 
 require_once realpath('../../entity/Usuario.php'); 
 $array_usuario = $_POST['usuario']; 
 $usuario = new Usuario(); 
 $usuario->set_Meta_Columnas($array_usuario); 
 echo UsuarioControler::update($usuario);
 ?>