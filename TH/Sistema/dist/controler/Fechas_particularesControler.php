<?php 
 include_once realpath('../mapper/Fechas_particularesMapper.php'); 
 
        class fechas_particularesController{ 
 public function insert($fechas_particulares){
$fechas_particularesMapper = new Fechas_particularesMapper();
return $fechas_particularesMapper->insert($fechas_particulares);
}
public function update($fechas_particulares){
$fechas_particularesMapper = new Fechas_particularesMapper();
return $fechas_particularesMapper->update($fechas_particulares);
}

 }?>