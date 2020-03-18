<?php 
 class Cargo{ 
 public function __construct(){
 $this->NOMBRE = "cargo"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('id' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getFecha_ingreso(){ 
 return $this->COLUMNAS['fecha_ingreso']; 
 } 
public function getEmpresa_idempresa(){ 
 return $this->COLUMNAS['empresa_idempresa']; 
 } 
public function getArea_empresa_idarea_emp(){ 
 return $this->COLUMNAS['area_empresa_idarea_emp']; 
 } 
public function getCargo_empreso_idcargo(){ 
 return $this->COLUMNAS['cargo_empreso_idcargo']; 
 } 
public function getPuesto_idpuesto(){ 
 return $this->COLUMNAS['puesto_idpuesto']; 
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
public function setFecha_ingreso($fecha_ingreso){ 
 if(is_null($fecha_ingreso)) $fecha_ingreso = 'null'; 
 $this->COLUMNAS['fecha_ingreso'] = $fecha_ingreso; 
 } 
public function setEmpresa_idempresa($empresa_idempresa){ 
 if(is_null($empresa_idempresa)) $empresa_idempresa = 'null'; 
 $this->COLUMNAS['empresa_idempresa'] = $empresa_idempresa; 
 } 
public function setArea_empresa_idarea_emp($area_empresa_idarea_emp){ 
 if(is_null($area_empresa_idarea_emp)) $area_empresa_idarea_emp = 'null'; 
 $this->COLUMNAS['area_empresa_idarea_emp'] = $area_empresa_idarea_emp; 
 } 
public function setCargo_empreso_idcargo($cargo_empreso_idcargo){ 
 if(is_null($cargo_empreso_idcargo)) $cargo_empreso_idcargo = 'null'; 
 $this->COLUMNAS['cargo_empreso_idcargo'] = $cargo_empreso_idcargo; 
 } 
public function setPuesto_idpuesto($puesto_idpuesto){ 
 if(is_null($puesto_idpuesto)) $puesto_idpuesto = 'null'; 
 $this->COLUMNAS['puesto_idpuesto'] = $puesto_idpuesto; 
 } 
 
public function setEmpresa_p_idEmpresa_p($empresa_p_idEmpresa_p){ 
 if(is_null($empresa_p_idEmpresa_p)) $empresa_p_idEmpresa_p = 'null'; 
 $this->COLUMNAS['Empresa_p_idEmpresa_p'] = $empresa_p_idEmpresa_p; 
 } 
 
public function setPersona_id($persona_id){ 
 if(is_null($persona_id)) $persona_id = 'null'; 
 $this->COLUMNAS['persona_id'] = $persona_id; 
 } 
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
