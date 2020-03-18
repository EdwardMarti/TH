<?php

class Estudio {

    public function __construct() {
        $this->NOMBRE = "estudio";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getNivel_academico() {
        return $this->COLUMNAS['nivel_academico'];
    }

    public function getNivel_vigilancia() {
        return $this->COLUMNAS['nivel_vigilancia'];
    }

    public function getFecha_curso() {
        return $this->COLUMNAS['fecha_curso'];
    }

    public function getNit_escuela() {
        return $this->COLUMNAS['nit_escuela'];
    }

    public function getId() {
        return $this->COLUMNAS['id'];
    }

    public function getPersona_id() {
        return $this->COLUMNAS['persona_id'];
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

    public function setNivel_academico($nivel_academico) {
        if (is_null($nivel_academico))
            $nivel_academico = 'null';
        $this->COLUMNAS['nivel_academico'] = $nivel_academico;
    }

    public function setNivel_vigilancia($nivel_vigilancia) {
        if (is_null($nivel_vigilancia))
            $nivel_vigilancia = 'null';
        $this->COLUMNAS['nivel_vigilancia'] = $nivel_vigilancia;
    }

    public function setFecha_curso($fecha_curso) {
        if (is_null($fecha_curso))
            $fecha_curso = 'null';
        $this->COLUMNAS['fecha_curso'] = $fecha_curso;
    }

    public function setNit_escuela($nit_escuela) {
        if (is_null($nit_escuela))
            $nit_escuela = 'null';
        $this->COLUMNAS['nit_escuela'] = $nit_escuela;
    }

    public function setId($id) {
        if (is_null($id))
            $id = 'null';
        $this->COLUMNAS['id'] = $id;
    }

    public function setPersona_id($persona_id) {
        if (is_null($persona_id))
            $persona_id = 'null';
        $this->COLUMNAS['persona_id'] = $persona_id;
    }

    public function set_Meta_Columnas($columnas) {
        $this->COLUMNAS = $columnas;
        foreach ($this->PK as $key => $value) {
            $this->PK[$key] = $this->COLUMNAS[$key];
        }
    }

}
