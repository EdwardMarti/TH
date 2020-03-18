<?php 
 include_once realpath('../mapper/PuestoMapper.php'); 
 
        class puestoController{ 
 public function insert($puesto){
$puestoMapper = new PuestoMapper();
return $puestoMapper->insert($puesto);
}
public function update($puesto){
$puestoMapper = new PuestoMapper();
return $puestoMapper->update($puesto);
}

 }?>