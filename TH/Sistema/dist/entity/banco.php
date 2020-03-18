<?php

class Banco {

    public function __construct() {
        $this->NOMBRE = "banco";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getIdbanco() {
        return $this->COLUMNAS['idbanco'];
    }

    public function getBanco_nombre() {
        return $this->COLUMNAS['banco_nombre'];
    }

    public function getNumero_cuenta() {
        return $this->COLUMNAS['numero_cuenta'];
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

    public function setIdbanco($idbanco) {
        if (is_null($idbanco))
            $idbanco = 'null';
        $this->COLUMNAS['idbanco'] = $idbanco;
    }

    public function setBanco_nombre($banco_nombre) {
        if (is_null($banco_nombre))
            $banco_nombre = 'null';
        $this->COLUMNAS['banco_nombre'] = $banco_nombre;
    }

    public function setNumero_cuenta($numero_cuenta) {
        if (is_null($numero_cuenta))
            $numero_cuenta = 'null';
        $this->COLUMNAS['numero_cuenta'] = $numero_cuenta;
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
