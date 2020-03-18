<?php 
 include_once realpath('../mapper/RollMapper.php'); 
 
        class rollController{ 
 public function insert($roll){
$rollMapper = new RollMapper();
return $rollMapper->insert($roll);
}
public function update($roll){
$rollMapper = new RollMapper();
return $rollMapper->update($roll);
}

 }?>