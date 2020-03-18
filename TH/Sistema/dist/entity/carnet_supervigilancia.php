<?php 
 class Carnet_supervigilancia{ 
 public function __construct(){
 $this->NOMBRE = "carnet_supervigilancia"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idcarne' => ''); 
 } 
 public function getIdcarne(){ 
 return $this->COLUMNAS['idcarne']; 
 } 
public function getCarnet_nombre(){ 
 return $this->COLUMNAS['carnet_nombre']; 
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
 public function setIdcarne($idcarne){ 
 if(is_null($idcarne)) $idcarne = 'null'; 
 $this->COLUMNAS['idcarne'] = $idcarne; 
 } 
public function setCarnet_nombre($carnet_nombre){ 
 if(is_null($carnet_nombre)) $carnet_nombre = 'null'; 
 $this->COLUMNAS['carnet_nombre'] = $carnet_nombre; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
