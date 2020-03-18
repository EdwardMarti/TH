<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\


class Domicilio {

  private $id;
  private $direccion;
  private $barrio;
  private $persona_id;

    /**
     * Constructor de Domicilio
    */
     public function __construct(){}

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
     * Devuelve el valor correspondiente a direccion
     * @return direccion
     */
  public function getDireccion(){
      return $this->direccion;
  }

    /**
     * Modifica el valor correspondiente a direccion
     * @param direccion
     */
  public function setDireccion($direccion){
      $this->direccion = $direccion;
  }
    /**
     * Devuelve el valor correspondiente a barrio
     * @return barrio
     */
  public function getBarrio(){
      return $this->barrio;
  }

    /**
     * Modifica el valor correspondiente a barrio
     * @param barrio
     */
  public function setBarrio($barrio){
      $this->barrio = $barrio;
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