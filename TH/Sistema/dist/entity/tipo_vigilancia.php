<?php 
 class Tipo_vigilancia{ 
 public function __construct(){
 $this->NOMBRE = "tipo_vigilancia"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('id' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getTipo_vigilancia(){ 
 return $this->COLUMNAS['tipo_vigilancia']; 
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
public function setTipo_vigilancia($tipo_vigilancia){ 
 if(is_null($tipo_vigilancia)) $tipo_vigilancia = 'null'; 
 $this->COLUMNAS['tipo_vigilancia'] = $tipo_vigilancia; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
