<?php 
 include_once realpath('../mapper/Tipo_vigilanciaMapper.php'); 
 
        class tipo_vigilanciaController{ 
 public function insert($tipo_vigilancia){
$tipo_vigilanciaMapper = new Tipo_vigilanciaMapper();
return $tipo_vigilanciaMapper->insert($tipo_vigilancia);
}
public function update($tipo_vigilancia){
$tipo_vigilanciaMapper = new Tipo_vigilanciaMapper();
return $tipo_vigilanciaMapper->update($tipo_vigilancia);
}

 }?>