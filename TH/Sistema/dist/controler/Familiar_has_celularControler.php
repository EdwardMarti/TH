<?php 
 include_once realpath('../mapper/Familiar_has_celularMapper.php'); 
 
        class familiar_has_celularController{ 
 public function insert($familiar_has_celular){
$familiar_has_celularMapper = new Familiar_has_celularMapper();
return $familiar_has_celularMapper->insert($familiar_has_celular);
}
public function update($familiar_has_celular){
$familiar_has_celularMapper = new Familiar_has_celularMapper();
return $familiar_has_celularMapper->update($familiar_has_celular);
}

 }?>