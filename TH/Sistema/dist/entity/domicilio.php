<?php

class Domicilio {

    public function __construct() {
        $this->NOMBRE = "domicilio";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getId() {
        return $this->COLUMNAS['id'];
    }

    public function getDireccion() {
        return $this->COLUMNAS['direccion'];
    }

    public function getBarrio() {
        return $this->COLUMNAS['barrio'];
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

    public function setDireccion($direccion) {
        if (is_null($direccion))
            $direccion = 'null';
        $this->COLUMNAS['direccion'] = $direccion;
    }

    public function setBarrio($barrio) {
        if (is_null($barrio))
            $barrio = 'null';
        $this->COLUMNAS['barrio'] = $barrio;
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
