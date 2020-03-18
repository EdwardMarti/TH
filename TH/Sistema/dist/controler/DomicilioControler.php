<?php 
 include_once realpath('../mapper/DomicilioMapper.php'); 
 
        class domicilioController{ 
 public function insert($domicilio){
$domicilioMapper = new DomicilioMapper();
return $domicilioMapper->insert($domicilio);
}
public function update($domicilio){
$domicilioMapper = new DomicilioMapper();
return $domicilioMapper->update($domicilio);
}

 }?>