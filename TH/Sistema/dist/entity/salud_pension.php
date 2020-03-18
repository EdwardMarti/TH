<?php

class Salud_pension {

    public function __construct() {
        $this->NOMBRE = "salud_pension";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getId() {
        return $this->COLUMNAS['id'];
    }

    public function getSalud() {
        return $this->COLUMNAS['salud'];
    }

    public function getPension() {
        return $this->COLUMNAS['pension'];
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

    public function setId($id) {
        if (is_null($id))
            $id = 'null';
        $this->COLUMNAS['id'] = $id;
    }

    public function setSalud($salud) {
        if (is_null($salud))
            $salud = 'null';
        $this->COLUMNAS['salud'] = $salud;
    }

    public function setPension($pension) {
        if (is_null($pension))
            $pension = 'null';
        $this->COLUMNAS['pension'] = $pension;
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
