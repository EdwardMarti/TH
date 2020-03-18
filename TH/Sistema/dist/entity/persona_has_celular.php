<?php 
 class Persona_has_celular{ 
 public function __construct(){
 $this->NOMBRE = "persona_has_celular"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('persona_id' => '','celular_id' => ''); 
 } 
 public function getPersona_id(){ 
 return $this->COLUMNAS['persona_id']; 
 } 
public function getCelular_id(){ 
 return $this->COLUMNAS['celular_id']; 
 } 
 
 public function getNombreClase(){ 
 return $this->NOMBRE; 
 } 
public function getColumnas(){
 return $this->COLUMNAS;
} 
public function getPK(){
 return $this->PK; 
} 
 public function setPersona_id($persona_id){ 
 if(is_null($persona_id)) $persona_id = 'null'; 
 $this->COLUMNAS['persona_id'] = $persona_id; 
 } 
public function setCelular_id($celular_id){ 
 if(is_null($celular_id)) $celular_id = 'null'; 
 $this->COLUMNAS['celular_id'] = $celular_id; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
