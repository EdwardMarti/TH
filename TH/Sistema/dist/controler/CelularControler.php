<?php 
 include_once realpath('../mapper/CelularMapper.php'); 
 
        class celularController{ 
 public function insert($celular){
$celularMapper = new CelularMapper();
return $celularMapper->insert($celular);
}
public function update($celular){
$celularMapper = new CelularMapper();
return $celularMapper->update($celular);
}

 }?>