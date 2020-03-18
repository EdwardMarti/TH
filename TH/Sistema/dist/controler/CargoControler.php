<?php 
 include_once realpath('../mapper/CargoMapper.php'); 
 
        class cargoController{ 
 public function insert($cargo){
$cargoMapper = new CargoMapper();
return $cargoMapper->insert($cargo);
}
public function update($cargo){
$cargoMapper = new CargoMapper();
return $cargoMapper->update($cargo);
}

 }?>