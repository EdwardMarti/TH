<?php 
 class Nivel_vigilancia{ 
 public function __construct(){
 $this->NOMBRE = "nivel_vigilancia"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('id' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getNombre(){ 
 return $this->COLUMNAS['nombre']; 
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
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
