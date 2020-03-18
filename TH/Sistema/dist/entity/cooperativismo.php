<?php

class Cooperativismo {

    public function __construct() {
        $this->NOMBRE = "cooperativismo";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getIdcooperativismo() {
        return $this->COLUMNAS['idcooperativismo'];
    }

    public function getCoop_nombre() {
        return $this->COLUMNAS['coop_nombre'];
    }

    public function getCoop_fecha() {
        return $this->COLUMNAS['coop_fecha'];
    }

    public function getCoop_nit() {
        return $this->COLUMNAS['coop_nit'];
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

    public function setIdcooperativismo($idcooperativismo) {
        if (is_null($idcooperativismo))
            $idcooperativismo = 'null';
        $this->COLUMNAS['idcooperativismo'] = $idcooperativismo;
    }

    public function setCoop_nombre($coop_nombre) {
        if (is_null($coop_nombre))
            $coop_nombre = 'null';
        $this->COLUMNAS['coop_nombre'] = $coop_nombre;
    }

    public function setCoop_fecha($coop_fecha) {
        if (is_null($coop_fecha))
            $coop_fecha = 'null';
        $this->COLUMNAS['coop_fecha'] = $coop_fecha;
    }

    public function setCoop_nit($coop_nit) {
        if (is_null($coop_nit))
            $coop_nit = 'null';
        $this->COLUMNAS['coop_nit'] = $coop_nit;
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
