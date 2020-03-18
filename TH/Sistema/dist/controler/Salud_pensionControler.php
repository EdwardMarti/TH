<?php 
 include_once realpath('../mapper/Salud_pensionMapper.php'); 
 
        class salud_pensionController{ 
 public function insert($salud_pension){
$salud_pensionMapper = new Salud_pensionMapper();
return $salud_pensionMapper->insert($salud_pension);
}
public function update($salud_pension){
$salud_pensionMapper = new Salud_pensionMapper();
return $salud_pensionMapper->update($salud_pension);
}

 }?>