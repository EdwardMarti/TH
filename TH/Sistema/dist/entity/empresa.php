<?php 
 class Empresa{ 
 public function __construct(){
 $this->NOMBRE = "empresa"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idempresa' => ''); 
 } 
 public function getIdempresa(){ 
 return $this->COLUMNAS['idempresa']; 
 } 
public function getNombre_empresa(){ 
 return $this->COLUMNAS['nombre_empresa']; 
 } 
public function getNit_empresa(){ 
 return $this->COLUMNAS['nit_empresa']; 
 } 
public function getDireccion_empresa(){ 
 return $this->COLUMNAS['direccion_empresa']; 
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
 public function setIdempresa($idempresa){ 
 if(is_null($idempresa)) $idempresa = 'null'; 
 $this->COLUMNAS['idempresa'] = $idempresa; 
 } 
public function setNombre_empresa($nombre_empresa){ 
 if(is_null($nombre_empresa)) $nombre_empresa = 'null'; 
 $this->COLUMNAS['nombre_empresa'] = $nombre_empresa; 
 } 
public function setNit_empresa($nit_empresa){ 
 if(is_null($nit_empresa)) $nit_empresa = 'null'; 
 $this->COLUMNAS['nit_empresa'] = $nit_empresa; 
 } 
public function setDireccion_empresa($direccion_empresa){ 
 if(is_null($direccion_empresa)) $direccion_empresa = 'null'; 
 $this->COLUMNAS['direccion_empresa'] = $direccion_empresa; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
