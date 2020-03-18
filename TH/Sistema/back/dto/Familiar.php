<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\


class Familiar {

  private $id;
  private $nombre;
  private $apellido;
  private $parentesco;
  private $persona_id;
  public $numero;

    /**
     * Constructor de Familiar
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
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
    /**
     * Devuelve el valor correspondiente a apellido
     * @return apellido
     */
  public function getApellido(){
      return $this->apellido;
  }

    /**
     * Modifica el valor correspondiente a apellido
     * @param apellido
     */
  public function setApellido($apellido){
      $this->apellido = $apellido;
  }
    /**
     * Devuelve el valor correspondiente a parentesco
     * @return parentesco
     */
  public function getParentesco(){
      return $this->parentesco;
  }

    /**
     * Modifica el valor correspondiente a parentesco
     * @param parentesco
     */
  public function setParentesco($parentesco){
      $this->parentesco = $parentesco;
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