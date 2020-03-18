<?php 
 class Celular{ 
 public function __construct(){
 $this->NOMBRE = "celular"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('id' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getNumero(){ 
 return $this->COLUMNAS['numero']; 
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
public function setNumero($numero){ 
 if(is_null($numero)) $numero = 'null'; 
 $this->COLUMNAS['numero'] = $numero; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
