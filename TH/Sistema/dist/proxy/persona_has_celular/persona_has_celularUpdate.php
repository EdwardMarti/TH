<?php 
 include_once realpath('../../controler/Persona_has_celularControler.php'); 
 require_once realpath('../../entity/Persona_has_celular.php'); 
 $array_persona_has_celular = $_POST['persona_has_celular']; 
 $persona_has_celular = new Persona_has_celular(); 
 $persona_has_celular->set_Meta_Columnas($array_persona_has_celular); 
 echo Persona_has_celularControler::update($persona_has_celular);
 ?>