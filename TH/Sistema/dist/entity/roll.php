<?php 
 class Roll{ 
 public function __construct(){
 $this->NOMBRE = "roll"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idroll' => ''); 
 } 
 public function getIdroll(){ 
 return $this->COLUMNAS['idroll']; 
 } 
public function getRoll_nombre(){ 
 return $this->COLUMNAS['roll_nombre']; 
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
 public function setIdroll($idroll){ 
 if(is_null($idroll)) $idroll = 'null'; 
 $this->COLUMNAS['idroll'] = $idroll; 
 } 
public function setRoll_nombre($roll_nombre){ 
 if(is_null($roll_nombre)) $roll_nombre = 'null'; 
 $this->COLUMNAS['roll_nombre'] = $roll_nombre; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
