<?php 
 class Area_empresa{ 
 public function __construct(){
 $this->NOMBRE = "area_empresa"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idarea_emp' => ''); 
 } 
 public function getIdarea_emp(){ 
 return $this->COLUMNAS['idarea_emp']; 
 } 
public function getNom_area(){ 
 return $this->COLUMNAS['nom_area']; 
 } 
public function getEmpresa_idempresa(){ 
 return $this->COLUMNAS['empresa_idempresa']; 
 } 
public function getEstado(){ 
 return $this->COLUMNAS['estado']; 
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
 public function setIdarea_emp($idarea_emp){ 
 if(is_null($idarea_emp)) $idarea_emp = 'null'; 
 $this->COLUMNAS['idarea_emp'] = $idarea_emp; 
 } 
public function setNom_area($nom_area){ 
 if(is_null($nom_area)) $nom_area = 'null'; 
 $this->COLUMNAS['nom_area'] = $nom_area; 
 } 
public function setEmpresa_idempresa($empresa_idempresa){ 
 if(is_null($empresa_idempresa)) $empresa_idempresa = 'null'; 
 $this->COLUMNAS['empresa_idempresa'] = $empresa_idempresa; 
 } 
public function setEstado($estado){ 
 if(is_null($estado)) $estado = 'null'; 
 $this->COLUMNAS['estado'] = $estado; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
