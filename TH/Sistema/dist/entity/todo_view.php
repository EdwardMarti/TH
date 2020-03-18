<?php 
 class Todo_view{ 
 public function __construct(){
 $this->NOMBRE = "todo_view"; 
 $this->COLUMNAS = array(); 
 $this->PK = array('' => ''); 
 } 
 public function getId(){ 
 return $this->COLUMNAS['id']; 
 } 
public function getCedula(){ 
 return $this->COLUMNAS['cedula']; 
 } 
public function getNacionalidad(){ 
 return $this->COLUMNAS['nacionalidad']; 
 } 
public function getCedula_lugar_expedicion(){ 
 return $this->COLUMNAS['cedula_lugar_expedicion']; 
 } 
public function getNombres(){ 
 return $this->COLUMNAS['nombres']; 
 } 
public function getApellidos(){ 
 return $this->COLUMNAS['apellidos']; 
 } 
public function getFechaNacimiento(){ 
 return $this->COLUMNAS['fechaNacimiento']; 
 } 
public function getLugar_nacimiento(){ 
 return $this->COLUMNAS['lugar_nacimiento']; 
 } 
public function getSexo(){ 
 return $this->COLUMNAS['sexo']; 
 } 
public function getGrupo_sanguineo(){ 
 return $this->COLUMNAS['grupo_sanguineo']; 
 } 
public function getEstado_civil(){ 
 return $this->COLUMNAS['estado_civil']; 
 } 
public function getCorreo(){ 
 return $this->COLUMNAS['correo']; 
 } 
public function getCargo_id(){ 
 return $this->COLUMNAS['cargo_id']; 
 } 
public function getNivel_vigilancia_id(){ 
 return $this->COLUMNAS['nivel_vigilancia_id']; 
 } 
public function getTipo_vigilancia_id(){ 
 return $this->COLUMNAS['tipo_vigilancia_id']; 
 } 
public function getLibreta(){ 
 return $this->COLUMNAS['libreta']; 
 } 
public function getDireccion(){ 
 return $this->COLUMNAS['direccion']; 
 } 
public function getBarrio(){ 
 return $this->COLUMNAS['barrio']; 
 } 
public function getEstudio_seguridad(){ 
 return $this->COLUMNAS['estudio_seguridad']; 
 } 
public function getExamen_medico(){ 
 return $this->COLUMNAS['examen_medico']; 
 } 
public function getPrueba_psicotecnica(){ 
 return $this->COLUMNAS['prueba_psicotecnica']; 
 } 
public function getNivel_academico(){ 
 return $this->COLUMNAS['nivel_academico']; 
 } 
public function getNivel_vigilancia(){ 
 return $this->COLUMNAS['nivel_vigilancia']; 
 } 
public function getFecha_curso(){ 
 return $this->COLUMNAS['fecha_curso']; 
 } 
public function getNit_escuela(){ 
 return $this->COLUMNAS['nit_escuela']; 
 } 
public function getSalud(){ 
 return $this->COLUMNAS['salud']; 
 } 
public function getPension(){ 
 return $this->COLUMNAS['pension']; 
 } 
public function getBanco_nombre(){ 
 return $this->COLUMNAS['banco_nombre']; 
 } 
public function getNumero_cuenta(){ 
 return $this->COLUMNAS['numero_cuenta']; 
 } 
public function getCoop_nombre(){ 
 return $this->COLUMNAS['coop_nombre']; 
 } 
public function getCoop_fecha(){ 
 return $this->COLUMNAS['coop_fecha']; 
 } 
public function getCoop_nit(){ 
 return $this->COLUMNAS['coop_nit']; 
 } 
public function getCnsc(){ 
 return $this->COLUMNAS['cnsc']; 
 } 
public function getFecha_acre_super(){ 
 return $this->COLUMNAS['fecha_acre_super']; 
 } 
public function getActa_consejo(){ 
 return $this->COLUMNAS['acta_consejo']; 
 } 
public function getFecha_aceptacion(){ 
 return $this->COLUMNAS['fecha_aceptacion']; 
 } 
public function getPsicofisico(){ 
 return $this->COLUMNAS['psicofisico']; 
 } 
public function getFecha_examen_psicofisico(){ 
 return $this->COLUMNAS['fecha_examen_psicofisico']; 
 } 
public function getCarnet_supervigilancia_idcarne(){ 
 return $this->COLUMNAS['carnet_supervigilancia_idcarne']; 
 } 
public function getPersona_id(){ 
 return $this->COLUMNAS['persona_id']; 
 } 
public function getId_cargo(){ 
 return $this->COLUMNAS['id_cargo']; 
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
public function setCedula($cedula){ 
 if(is_null($cedula)) $cedula = 'null'; 
 $this->COLUMNAS['cedula'] = $cedula; 
 } 
public function setNacionalidad($nacionalidad){ 
 if(is_null($nacionalidad)) $nacionalidad = 'null'; 
 $this->COLUMNAS['nacionalidad'] = $nacionalidad; 
 } 
public function setCedula_lugar_expedicion($cedula_lugar_expedicion){ 
 if(is_null($cedula_lugar_expedicion)) $cedula_lugar_expedicion = 'null'; 
 $this->COLUMNAS['cedula_lugar_expedicion'] = $cedula_lugar_expedicion; 
 } 
public function setNombres($nombres){ 
 if(is_null($nombres)) $nombres = 'null'; 
 $this->COLUMNAS['nombres'] = $nombres; 
 } 
public function setApellidos($apellidos){ 
 if(is_null($apellidos)) $apellidos = 'null'; 
 $this->COLUMNAS['apellidos'] = $apellidos; 
 } 
public function setFechaNacimiento($fechaNacimiento){ 
 if(is_null($fechaNacimiento)) $fechaNacimiento = 'null'; 
 $this->COLUMNAS['fechaNacimiento'] = $fechaNacimiento; 
 } 
public function setLugar_nacimiento($lugar_nacimiento){ 
 if(is_null($lugar_nacimiento)) $lugar_nacimiento = 'null'; 
 $this->COLUMNAS['lugar_nacimiento'] = $lugar_nacimiento; 
 } 
public function setSexo($sexo){ 
 if(is_null($sexo)) $sexo = 'null'; 
 $this->COLUMNAS['sexo'] = $sexo; 
 } 
public function setGrupo_sanguineo($grupo_sanguineo){ 
 if(is_null($grupo_sanguineo)) $grupo_sanguineo = 'null'; 
 $this->COLUMNAS['grupo_sanguineo'] = $grupo_sanguineo; 
 } 
public function setEstado_civil($estado_civil){ 
 if(is_null($estado_civil)) $estado_civil = 'null'; 
 $this->COLUMNAS['estado_civil'] = $estado_civil; 
 } 
public function setCorreo($correo){ 
 if(is_null($correo)) $correo = 'null'; 
 $this->COLUMNAS['correo'] = $correo; 
 } 
public function setCargo_id($cargo_id){ 
 if(is_null($cargo_id)) $cargo_id = 'null'; 
 $this->COLUMNAS['cargo_id'] = $cargo_id; 
 } 
public function setNivel_vigilancia_id($nivel_vigilancia_id){ 
 if(is_null($nivel_vigilancia_id)) $nivel_vigilancia_id = 'null'; 
 $this->COLUMNAS['nivel_vigilancia_id'] = $nivel_vigilancia_id; 
 } 
public function setTipo_vigilancia_id($tipo_vigilancia_id){ 
 if(is_null($tipo_vigilancia_id)) $tipo_vigilancia_id = 'null'; 
 $this->COLUMNAS['tipo_vigilancia_id'] = $tipo_vigilancia_id; 
 } 
public function setLibreta($libreta){ 
 if(is_null($libreta)) $libreta = 'null'; 
 $this->COLUMNAS['libreta'] = $libreta; 
 } 
public function setDireccion($direccion){ 
 if(is_null($direccion)) $direccion = 'null'; 
 $this->COLUMNAS['direccion'] = $direccion; 
 } 
public function setBarrio($barrio){ 
 if(is_null($barrio)) $barrio = 'null'; 
 $this->COLUMNAS['barrio'] = $barrio; 
 } 
public function setEstudio_seguridad($estudio_seguridad){ 
 if(is_null($estudio_seguridad)) $estudio_seguridad = 'null'; 
 $this->COLUMNAS['estudio_seguridad'] = $estudio_seguridad; 
 } 
public function setExamen_medico($examen_medico){ 
 if(is_null($examen_medico)) $examen_medico = 'null'; 
 $this->COLUMNAS['examen_medico'] = $examen_medico; 
 } 
public function setPrueba_psicotecnica($prueba_psicotecnica){ 
 if(is_null($prueba_psicotecnica)) $prueba_psicotecnica = 'null'; 
 $this->COLUMNAS['prueba_psicotecnica'] = $prueba_psicotecnica; 
 } 
public function setNivel_academico($nivel_academico){ 
 if(is_null($nivel_academico)) $nivel_academico = 'null'; 
 $this->COLUMNAS['nivel_academico'] = $nivel_academico; 
 } 
public function setNivel_vigilancia($nivel_vigilancia){ 
 if(is_null($nivel_vigilancia)) $nivel_vigilancia = 'null'; 
 $this->COLUMNAS['nivel_vigilancia'] = $nivel_vigilancia; 
 } 
public function setFecha_curso($fecha_curso){ 
 if(is_null($fecha_curso)) $fecha_curso = 'null'; 
 $this->COLUMNAS['fecha_curso'] = $fecha_curso; 
 } 
public function setNit_escuela($nit_escuela){ 
 if(is_null($nit_escuela)) $nit_escuela = 'null'; 
 $this->COLUMNAS['nit_escuela'] = $nit_escuela; 
 } 
public function setSalud($salud){ 
 if(is_null($salud)) $salud = 'null'; 
 $this->COLUMNAS['salud'] = $salud; 
 } 
public function setPension($pension){ 
 if(is_null($pension)) $pension = 'null'; 
 $this->COLUMNAS['pension'] = $pension; 
 } 
public function setBanco_nombre($banco_nombre){ 
 if(is_null($banco_nombre)) $banco_nombre = 'null'; 
 $this->COLUMNAS['banco_nombre'] = $banco_nombre; 
 } 
public function setNumero_cuenta($numero_cuenta){ 
 if(is_null($numero_cuenta)) $numero_cuenta = 'null'; 
 $this->COLUMNAS['numero_cuenta'] = $numero_cuenta; 
 } 
public function setCoop_nombre($coop_nombre){ 
 if(is_null($coop_nombre)) $coop_nombre = 'null'; 
 $this->COLUMNAS['coop_nombre'] = $coop_nombre; 
 } 
public function setCoop_fecha($coop_fecha){ 
 if(is_null($coop_fecha)) $coop_fecha = 'null'; 
 $this->COLUMNAS['coop_fecha'] = $coop_fecha; 
 } 
public function setCoop_nit($coop_nit){ 
 if(is_null($coop_nit)) $coop_nit = 'null'; 
 $this->COLUMNAS['coop_nit'] = $coop_nit; 
 } 
public function setCnsc($cnsc){ 
 if(is_null($cnsc)) $cnsc = 'null'; 
 $this->COLUMNAS['cnsc'] = $cnsc; 
 } 
public function setFecha_acre_super($fecha_acre_super){ 
 if(is_null($fecha_acre_super)) $fecha_acre_super = 'null'; 
 $this->COLUMNAS['fecha_acre_super'] = $fecha_acre_super; 
 } 
public function setActa_consejo($acta_consejo){ 
 if(is_null($acta_consejo)) $acta_consejo = 'null'; 
 $this->COLUMNAS['acta_consejo'] = $acta_consejo; 
 } 
public function setFecha_aceptacion($fecha_aceptacion){ 
 if(is_null($fecha_aceptacion)) $fecha_aceptacion = 'null'; 
 $this->COLUMNAS['fecha_aceptacion'] = $fecha_aceptacion; 
 } 
public function setPsicofisico($psicofisico){ 
 if(is_null($psicofisico)) $psicofisico = 'null'; 
 $this->COLUMNAS['psicofisico'] = $psicofisico; 
 } 
public function setFecha_examen_psicofisico($fecha_examen_psicofisico){ 
 if(is_null($fecha_examen_psicofisico)) $fecha_examen_psicofisico = 'null'; 
 $this->COLUMNAS['fecha_examen_psicofisico'] = $fecha_examen_psicofisico; 
 } 
public function setCarnet_supervigilancia_idcarne($carnet_supervigilancia_idcarne){ 
 if(is_null($carnet_supervigilancia_idcarne)) $carnet_supervigilancia_idcarne = 'null'; 
 $this->COLUMNAS['carnet_supervigilancia_idcarne'] = $carnet_supervigilancia_idcarne; 
 } 
public function setPersona_id($persona_id){ 
 if(is_null($persona_id)) $persona_id = 'null'; 
 $this->COLUMNAS['persona_id'] = $persona_id; 
 } 
public function setId_cargo($id_cargo){ 
 if(is_null($id_cargo)) $id_cargo = 'null'; 
 $this->COLUMNAS['id_cargo'] = $id_cargo; 
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
 
 public function set_Meta_Columnas($columnas){ 
 $this->COLUMNAS = $columnas;
 foreach ($this->PK as $key => $value) {
 $this->PK[$key] = $this->COLUMNAS[$key];
}
}
}
