<?php 
 class Familiar{ 
 public function __construct(){
 $this->NOMBRE = "familiar"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('id' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getNombre(){ 
 return $this->COLUMNAS['nombre']; 
 } 
public function getApellido(){ 
 return $this->COLUMNAS['apellido']; 
 } 
public function getParentesco(){ 
 return $this->COLUMNAS['parentesco']; 
 } 
public function getPersona_id(){ 
 return $this->COLUMNAS['persona_id']; 
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
 public function setId($id){ 
 if(is_null($id)) $id = 'null'; 
 $this->COLUMNAS['id'] = $id; 
 } 
public function setNombre($nombre){ 
 if(is_null($nombre)) $nombre = 'null'; 
 $this->COLUMNAS['nombre'] = $nombre; 
 } 
public function setApellido($apellido){ 
 if(is_null($apellido)) $apellido = 'null'; 
 $this->COLUMNAS['apellido'] = $apellido; 
 } 
public function setParentesco($parentesco){ 
 if(is_null($parentesco)) $parentesco = 'null'; 
 $this->COLUMNAS['parentesco'] = $parentesco; 
 } 
public function setPersona_id($persona_id){ 
 if(is_null($persona_id)) $persona_id = 'null'; 
 $this->COLUMNAS['persona_id'] = $persona_id; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
