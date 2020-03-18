<?php 
 include_once realpath('../mapper/Area_empresaMapper.php'); 
 
        class area_empresaController{ 
 public function insert($area_empresa){
$area_empresaMapper = new Area_empresaMapper();
return $area_empresaMapper->insert($area_empresa);
}
public function update($area_empresa){
$area_empresaMapper = new Area_empresaMapper();
return $area_empresaMapper->update($area_empresa);
}

 }?>