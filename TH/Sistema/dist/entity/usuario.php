<?php 
 class Usuario{ 
 public function __construct(){
 $this->NOMBRE = "usuario"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('idusuario' => ''); 
 } 
 public function getIdusuario(){ 
 return $this->COLUMNAS['idusuario']; 
 } 
public function getCedula(){ 
 return $this->COLUMNAS['cedula']; 
 } 
public function getUsuario_nombre(){ 
 return $this->COLUMNAS['usuario_nombre']; 
 } 
public function getUsuario_correo(){ 
 return $this->COLUMNAS['usuario_correo']; 
 } 
public function getUsuario_pass(){ 
 return $this->COLUMNAS['usuario_pass']; 
 } 
public function getCargo_empreso_idcargo(){ 
 return $this->COLUMNAS['cargo_empreso_idcargo']; 
 } 
public function getUser_activation_code(){ 
 return $this->COLUMNAS['user_activation_code']; 
 } 
public function getUser_email_status(){ 
 return $this->COLUMNAS['user_email_status']; 
 } 
public function getRoll_idroll(){ 
 return $this->COLUMNAS['roll_idroll']; 
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
 public function setIdusuario($idusuario){ 
 if(is_null($idusuario)) $idusuario = 'null'; 
 $this->COLUMNAS['idusuario'] = $idusuario; 
 } 
public function setCedula($cedula){ 
 if(is_null($cedula)) $cedula = 'null'; 
 $this->COLUMNAS['cedula'] = $cedula; 
 } 
public function setUsuario_nombre($usuario_nombre){ 
 if(is_null($usuario_nombre)) $usuario_nombre = 'null'; 
 $this->COLUMNAS['usuario_nombre'] = $usuario_nombre; 
 } 
public function setUsuario_correo($usuario_correo){ 
 if(is_null($usuario_correo)) $usuario_correo = 'null'; 
 $this->COLUMNAS['usuario_correo'] = $usuario_correo; 
 } 
public function setUsuario_pass($usuario_pass){ 
 if(is_null($usuario_pass)) $usuario_pass = 'null'; 
 $this->COLUMNAS['usuario_pass'] = $usuario_pass; 
 } 
public function setCargo_empreso_idcargo($cargo_empreso_idcargo){ 
 if(is_null($cargo_empreso_idcargo)) $cargo_empreso_idcargo = 'null'; 
 $this->COLUMNAS['cargo_empreso_idcargo'] = $cargo_empreso_idcargo; 
 } 
public function setUser_activation_code($user_activation_code){ 
 if(is_null($user_activation_code)) $user_activation_code = 'null'; 
 $this->COLUMNAS['user_activation_code'] = $user_activation_code; 
 } 
public function setUser_email_status($user_email_status){ 
 if(is_null($user_email_status)) $user_email_status = 'null'; 
 $this->COLUMNAS['user_email_status'] = $user_email_status; 
 } 
public function setRoll_idroll($roll_idroll){ 
 if(is_null($roll_idroll)) $roll_idroll = 'null'; 
 $this->COLUMNAS['roll_idroll'] = $roll_idroll; 
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
