<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Estadistas informan que una linea de código equivale a un sorbo de café  \\


class Fechas_particulares {

  private $estudio_seguridad;
  private $examen_medico;
  private $prueba_psicotecnica;
  private $id;
  private $persona_id;

    /**
     * Constructor de Fechas_particulares
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a estudio_seguridad
     * @return estudio_seguridad
     */
  public function getEstudio_seguridad(){
      return $this->estudio_seguridad;
  }

    /**
     * Modifica el valor correspondiente a estudio_seguridad
     * @param estudio_seguridad
     */
  public function setEstudio_seguridad($estudio_seguridad){
      $this->estudio_seguridad = $estudio_seguridad;
  }
    /**
     * Devuelve el valor correspondiente a examen_medico
     * @return examen_medico
     */
  public function getExamen_medico(){
      return $this->examen_medico;
  }

    /**
     * Modifica el valor correspondiente a examen_medico
     * @param examen_medico
     */
  public function setExamen_medico($examen_medico){
      $this->examen_medico = $examen_medico;
  }
    /**
     * Devuelve el valor correspondiente a prueba_psicotecnica
     * @return prueba_psicotecnica
     */
  public function getPrueba_psicotecnica(){
      return $this->prueba_psicotecnica;
  }

    /**
     * Modifica el valor correspondiente a prueba_psicotecnica
     * @param prueba_psicotecnica
     */
  public function setPrueba_psicotecnica($prueba_psicotecnica){
      $this->prueba_psicotecnica = $prueba_psicotecnica;
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