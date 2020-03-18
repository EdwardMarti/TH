<?php 
 include_once realpath('../mapper/EmpresaMapper.php'); 
 
        class empresaController{ 
 public function insert($empresa){
$empresaMapper = new EmpresaMapper();
return $empresaMapper->insert($empresa);
}
public function update($empresa){
$empresaMapper = new EmpresaMapper();
return $empresaMapper->update($empresa);
}

 }?>