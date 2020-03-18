<?php 
 include_once realpath('../mapper/Nivel_vigilanciaMapper.php'); 
 
        class nivel_vigilanciaController{ 
 public function insert($nivel_vigilancia){
$nivel_vigilanciaMapper = new Nivel_vigilanciaMapper();
return $nivel_vigilanciaMapper->insert($nivel_vigilancia);
}
public function update($nivel_vigilancia){
$nivel_vigilanciaMapper = new Nivel_vigilanciaMapper();
return $nivel_vigilanciaMapper->update($nivel_vigilancia);
}

 }?>