<?php 
 include_once realpath('../mapper/PersonaMapper.php'); 
 
        class personaController{ 
 public function insert($persona){
$personaMapper = new PersonaMapper();
return $personaMapper->insert($persona);
}
public function update($persona){
$personaMapper = new PersonaMapper();
return $personaMapper->update($persona);
}

 }?>