<?php 
 class Puesto{ 
 public function __construct(){
 $this->NOMBRE = "puesto"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idpuesto' => ''); 
 } 
 public function getIdpuesto(){ 
 return $this->COLUMNAS['idpuesto']; 
 } 
public function getEmpresa_idempresa(){ 
 return $this->COLUMNAS['empresa_idempresa']; 
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
 public function setIdpuesto($idpuesto){ 
 if(is_null($idpuesto)) $idpuesto = 'null'; 
 $this->COLUMNAS['idpuesto'] = $idpuesto; 
 } 
public function setEmpresa_idempresa($empresa_idempresa){ 
 if(is_null($empresa_idempresa)) $empresa_idempresa = 'null'; 
 $this->COLUMNAS['empresa_idempresa'] = $empresa_idempresa; 
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
