<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\


class Estudio {

  private $nivel_academico;
  private $nivel_vigilancia;
  private $fecha_curso;
  private $nit_escuela;
  private $id;
  private $persona_id;

    /**
     * Constructor de Estudio
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a nivel_academico
     * @return nivel_academico
     */
  public function getNivel_academico(){
      return $this->nivel_academico;
  }

    /**
     * Modifica el valor correspondiente a nivel_academico
     * @param nivel_academico
     */
  public function setNivel_academico($nivel_academico){
      $this->nivel_academico = $nivel_academico;
  }
    /**
     * Devuelve el valor correspondiente a nivel_vigilancia
     * @return nivel_vigilancia
     */
  public function getNivel_vigilancia(){
      return $this->nivel_vigilancia;
  }
  function getNit_escuela() {
      return $this->nit_escuela;
  }

  function setNit_escuela($nit_escuela) {
      $this->nit_escuela = $nit_escuela;
  }

      /**
     * Modifica el valor correspondiente a nivel_vigilancia
     * @param nivel_vigilancia
     */
  public function setNivel_vigilancia($nivel_vigilancia){
      $this->nivel_vigilancia = $nivel_vigilancia;
  }
    /**
     * Devuelve el valor correspondiente a fecha_curso
     * @return fecha_curso
     */
  public function getFecha_curso(){
      return $this->fecha_curso;
  }

    /**
     * Modifica el valor correspondiente a fecha_curso
     * @param fecha_curso
     */
  public function setFecha_curso($fecha_curso){
      $this->fecha_curso = $fecha_curso;
  }
    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a persona_id
     * @return persona_id
     */
  public function getPersona_id(){
      return $this->persona_id;
  }

    /**
     * Modifica el valor correspondiente a persona_id
     * @param persona_id
     */
  public function setPersona_id($persona_id){
      $this->persona_id = $persona_id;
  }


}
//That´s all folks!