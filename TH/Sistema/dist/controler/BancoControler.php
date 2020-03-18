<?php 
 include_once realpath('../mapper/BancoMapper.php'); 
 
        class bancoController{ 
 public function insert($banco){
$bancoMapper = new BancoMapper();
return $bancoMapper->insert($banco);
}
public function update($banco){
$bancoMapper = new BancoMapper();
return $bancoMapper->update($banco);
}

 }?>