<?php 
 include_once realpath('../mapper/Persona_has_celularMapper.php'); 
 
        class persona_has_celularController{ 
 public function insert($persona_has_celular){
$persona_has_celularMapper = new Persona_has_celularMapper();
return $persona_has_celularMapper->insert($persona_has_celular);
}
public function update($persona_has_celular){
$persona_has_celularMapper = new Persona_has_celularMapper();
return $persona_has_celularMapper->update($persona_has_celular);
}

 }?>