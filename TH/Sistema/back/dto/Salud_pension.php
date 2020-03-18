<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\


class Salud_pension {

  private $id;
  private $salud;
  private $pension;
  private $persona_id;

    /**
     * Constructor de Salud_pension
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
     * Devuelve el valor correspondiente a salud
     * @return salud
     */
  public function getSalud(){
      return $this->salud;
  }

    /**
     * Modifica el valor correspondiente a salud
     * @param salud
     */
  public function setSalud($salud){
      $this->salud = $salud;
  }
    /**
     * Devuelve el valor correspondiente a pension
     * @return pension
     */
  public function getPension(){
      return $this->pension;
  }

    /**
     * Modifica el valor correspondiente a pension
     * @param pension
     */
  public function setPension($pension){
      $this->pension = $pension;
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