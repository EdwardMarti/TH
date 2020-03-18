<?php 
 include_once realpath('../mapper/UsuarioMapper.php'); 
 
        class usuarioController{ 
 public function insert($usuario){
$usuarioMapper = new UsuarioMapper();
return $usuarioMapper->insert($usuario);
}
public function update($usuario){
$usuarioMapper = new UsuarioMapper();
return $usuarioMapper->update($usuario);
}

 }?>