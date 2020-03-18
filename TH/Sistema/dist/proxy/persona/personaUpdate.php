<?php 
 include_once realpath('../../controler/PersonaControler.php'); 
 require_once realpath('../../entity/Persona.php'); 
 $array_persona = $_POST['persona']; 
 $persona = new Persona(); 
 $persona->set_Meta_Columnas($array_persona); 
 echo PersonaControler::update($persona);
 ?>