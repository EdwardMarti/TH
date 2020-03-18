<?php

class Fechas_particulares {

    public function __construct() {
        $this->NOMBRE = "fechas_particulares";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getEstudio_seguridad() {
        return $this->COLUMNAS['estudio_seguridad'];
    }

    public function getExamen_medico() {
        return $this->COLUMNAS['examen_medico'];
    }

    public function getPrueba_psicotecnica() {
        return $this->COLUMNAS['prueba_psicotecnica'];
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

    public function setEstudio_seguridad($estudio_seguridad) {
        if (is_null($estudio_seguridad))
            $estudio_seguridad = 'null';
        $this->COLUMNAS['estudio_seguridad'] = $estudio_seguridad;
    }

    public function setExamen_medico($examen_medico) {
        if (is_null($examen_medico))
            $examen_medico = 'null';
        $this->COLUMNAS['examen_medico'] = $examen_medico;
    }

    public function setPrueba_psicotecnica($prueba_psicotecnica) {
        if (is_null($prueba_psicotecnica))
            $prueba_psicotecnica = 'null';
        $this->COLUMNAS['prueba_psicotecnica'] = $prueba_psicotecnica;
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
