<?php 
 include_once realpath('../mapper/Varios_empresaMapper.php'); 
 
        class varios_empresaController{ 
 public function insert($varios_empresa){
$varios_empresaMapper = new Varios_empresaMapper();
return $varios_empresaMapper->insert($varios_empresa);
}
public function update($varios_empresa){
$varios_empresaMapper = new Varios_empresaMapper();
return $varios_empresaMapper->update($varios_empresa);
}

 }?>