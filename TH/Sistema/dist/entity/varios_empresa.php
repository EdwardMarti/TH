<?php

class Varios_empresa {

    public function __construct() {
        $this->NOMBRE = "varios_empresa";
        $this->COLUMNAS = array();
        $this->PK = array('persona_id' => '');
    }

    public function getIdvarios_empresa() {
        return $this->COLUMNAS['idvarios_empresa'];
    }

    public function getCnsc() {
        return $this->COLUMNAS['cnsc'];
    }

    public function getFecha_acre_super() {
        return $this->COLUMNAS['fecha_acre_super'];
    }

    public function getActa_consejo() {
        return $this->COLUMNAS['acta_consejo'];
    }

    public function getFecha_aceptacion() {
        return $this->COLUMNAS['fecha_aceptacion'];
    }

    public function getPsicofisico() {
        return $this->COLUMNAS['psicofisico'];
    }

    public function getFecha_examen_psicofisico() {
        return $this->COLUMNAS['fecha_examen_psicofisico'];
    }

    public function getCarnet_supervigilancia_idcarne() {
        return $this->COLUMNAS['carnet_supervigilancia_idcarne'];
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

    public function setIdvarios_empresa($idvarios_empresa) {
        if (is_null($idvarios_empresa))
            $idvarios_empresa = 'null';
        $this->COLUMNAS['idvarios_empresa'] = $idvarios_empresa;
    }

    public function setCnsc($cnsc) {
        if (is_null($cnsc))
            $cnsc = 'null';
        $this->COLUMNAS['cnsc'] = $cnsc;
    }

    public function setFecha_acre_super($fecha_acre_super) {
        if (is_null($fecha_acre_super))
            $fecha_acre_super = 'null';
        $this->COLUMNAS['fecha_acre_super'] = $fecha_acre_super;
    }

    public function setActa_consejo($acta_consejo) {
        if (is_null($acta_consejo))
            $acta_consejo = 'null';
        $this->COLUMNAS['acta_consejo'] = $acta_consejo;
    }

    public function setFecha_aceptacion($fecha_aceptacion) {
        if (is_null($fecha_aceptacion))
            $fecha_aceptacion = 'null';
        $this->COLUMNAS['fecha_aceptacion'] = $fecha_aceptacion;
    }

    public function setPsicofisico($psicofisico) {
        if (is_null($psicofisico))
            $psicofisico = 'null';
        $this->COLUMNAS['psicofisico'] = $psicofisico;
    }

    public function setFecha_examen_psicofisico($fecha_examen_psicofisico) {
        if (is_null($fecha_examen_psicofisico))
            $fecha_examen_psicofisico = 'null';
        $this->COLUMNAS['fecha_examen_psicofisico'] = $fecha_examen_psicofisico;
    }

    public function setCarnet_supervigilancia_idcarne($carnet_supervigilancia_idcarne) {
        if (is_null($carnet_supervigilancia_idcarne))
            $carnet_supervigilancia_idcarne = 'null';
        $this->COLUMNAS['carnet_supervigilancia_idcarne'] = $carnet_supervigilancia_idcarne;
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
