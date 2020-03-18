<?php 
 class Cargo_empreso{ 
 public function __construct(){
 $this->NOMBRE = "cargo_empreso"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idcargo' => ''); 
 } 
 public function getIdcargo(){ 
 return $this->COLUMNAS['idcargo']; 
 } 
public function getNom_cargo(){ 
 return $this->COLUMNAS['nom_cargo']; 
 } 
public function getArea_empresa_idarea_emp(){ 
 return $this->COLUMNAS['area_empresa_idarea_emp']; 
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
 public function setIdcargo($idcargo){ 
 if(is_null($idcargo)) $idcargo = 'null'; 
 $this->COLUMNAS['idcargo'] = $idcargo; 
 } 
public function setNom_cargo($nom_cargo){ 
 if(is_null($nom_cargo)) $nom_cargo = 'null'; 
 $this->COLUMNAS['nom_cargo'] = $nom_cargo; 
 } 
public function setArea_empresa_idarea_emp($area_empresa_idarea_emp){ 
 if(is_null($area_empresa_idarea_emp)) $area_empresa_idarea_emp = 'null'; 
 $this->COLUMNAS['area_empresa_idarea_emp'] = $area_empresa_idarea_emp; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
