<?php

class Persona {

    public function __construct() {
        $this->NOMBRE = "persona";
        $this->COLUMNAS = array();
        $this->PK = array('id' => '');
    }

    public function getId() {
        return $this->COLUMNAS['id'];
    }

    public function getCedula() {
        return $this->COLUMNAS['cedula'];
    }

    public function getNacionalidad() {
        return $this->COLUMNAS['nacionalidad'];
    }

    public function getCedula_lugar_expedicion() {
        return $this->COLUMNAS['cedula_lugar_expedicion'];
    }

    public function getNombres() {
        return $this->COLUMNAS['nombres'];
    }

    public function getApellidos() {
        return $this->COLUMNAS['apellidos'];
    }

    public function getFechaNacimiento() {
        return $this->COLUMNAS['fechaNacimiento'];
    }

    public function getLugar_nacimiento() {
        return $this->COLUMNAS['lugar_nacimiento'];
    }

    public function getSexo() {
        return $this->COLUMNAS['sexo'];
    }

    public function getGrupo_sanguineo() {
        return $this->COLUMNAS['grupo_sanguineo'];
    }

    public function getEstado_civil() {
        return $this->COLUMNAS['estado_civil'];
    }

    public function getCorreo() {
        return $this->COLUMNAS['correo'];
    }

    public function getEstado() {
        return $this->COLUMNAS['estado'];
    }

    public function getCargo_id() {
        return $this->COLUMNAS['cargo_id'];
    }

    public function getNivel_vigilancia_id() {
        return $this->COLUMNAS['nivel_vigilancia_id_p'];
    }

    public function getTipo_vigilancia_id() {
        return $this->COLUMNAS['tipo_vigilancia_id'];
    }

    public function getLibreta() {
        return $this->COLUMNAS['libreta'];
    }

    public function getNombreClase() {
        return $this->NOMBRE;
    }

    public function getColumnas() {
        $aux = array();
        foreach ($this->COLUMNAS as $key => $value) {
            if (!empty($value)) {
                $aux[$key] = $value;
            }
        }
        return $aux;
    }

    public function getPK() {
        return $this->PK;
    }

    public function setId($id) {
        if (is_null($id))
            $id = 'null';
        $this->COLUMNAS['id'] = $id;
    }

    public function setCedula($cedula) {
        if (is_null($cedula))
            $cedula = 'null';
        $this->COLUMNAS['cedula'] = $cedula;
    }

    public function setNacionalidad($nacionalidad) {
        if (is_null($nacionalidad))
            $nacionalidad = 'null';
        $this->COLUMNAS['nacionalidad'] = $nacionalidad;
    }

    public function setCedula_lugar_expedicion($cedula_lugar_expedicion) {
        if (is_null($cedula_lugar_expedicion))
            $cedula_lugar_expedicion = 'null';
        $this->COLUMNAS['cedula_lugar_expedicion'] = $cedula_lugar_expedicion;
    }

    public function setNombres($nombres) {
        if (is_null($nombres))
            $nombres = 'null';
        $this->COLUMNAS['nombres'] = $nombres;
    }

    public function setApellidos($apellidos) {
        if (is_null($apellidos))
            $apellidos = 'null';
        $this->COLUMNAS['apellidos'] = $apellidos;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        if (is_null($fechaNacimiento))
            $fechaNacimiento = 'null';
        $this->COLUMNAS['fechaNacimiento'] = $fechaNacimiento;
    }

    public function setLugar_nacimiento($lugar_nacimiento) {
        if (is_null($lugar_nacimiento))
            $lugar_nacimiento = 'null';
        $this->COLUMNAS['lugar_nacimiento'] = $lugar_nacimiento;
    }

    public function setSexo($sexo) {
        if (is_null($sexo))
            $sexo = 'null';
        $this->COLUMNAS['sexo'] = $sexo;
    }

    public function setGrupo_sanguineo($grupo_sanguineo) {
        if (is_null($grupo_sanguineo))
            $grupo_sanguineo = 'null';
        $this->COLUMNAS['grupo_sanguineo'] = $grupo_sanguineo;
    }

    public function setEstado_civil($estado_civil) {
        if (is_null($estado_civil))
            $estado_civil = 'null';
        $this->COLUMNAS['estado_civil'] = $estado_civil;
    }

    public function setCorreo($correo) {
        if (is_null($correo))
            $correo = 'null';
        $this->COLUMNAS['correo'] = $correo;
    }

    public function setEstado($estado) {
        if (is_null($estado))
            $estado = 'null';
        $this->COLUMNAS['estado'] = $estado;
    }

    public function setCargo_id($cargo_id) {
        if (is_null($cargo_id))
            $cargo_id = 'null';
        $this->COLUMNAS['cargo_id'] = $cargo_id;
    }

    public function setNivel_vigilancia_id($nivel_vigilancia_id) {
        if (is_null($nivel_vigilancia_id))
            $nivel_vigilancia_id = 'null';
        $this->COLUMNAS['nivel_vigilancia_id_p'] = $nivel_vigilancia_id;
    }

    public function setTipo_vigilancia_id($tipo_vigilancia_id) {
        if (is_null($tipo_vigilancia_id))
            $tipo_vigilancia_id = 'null';
        $this->COLUMNAS['tipo_vigilancia_id'] = $tipo_vigilancia_id;
    }

    public function setLibreta($libreta) {
        if (is_null($libreta))
            $libreta = 'null';
        $this->COLUMNAS['libreta'] = $libreta;
    }

    public function set_Meta_Columnas($columnas) {
        $this->COLUMNAS = $columnas;
        foreach ($this->PK as $key => $value) {
            $this->PK[$key] = $this->COLUMNAS[$key];
        }
    }

}
