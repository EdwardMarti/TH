<?php 
 class Familiar_has_celular{ 
 public function __construct(){
 $this->NOMBRE = "familiar_has_celular"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('familiar_id' => '','celular_id' => ''); 
 } 
 public function getFamiliar_id(){ 
 return $this->COLUMNAS['familiar_id']; 
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
 public function setFamiliar_id($familiar_id){ 
 if(is_null($familiar_id)) $familiar_id = 'null'; 
 $this->COLUMNAS['familiar_id'] = $familiar_id; 
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
