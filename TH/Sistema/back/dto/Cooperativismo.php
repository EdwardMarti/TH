<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


class Cooperativismo {

  private $idcooperativismo;
  private $coop_nombre;
  private $coop_fecha;
  private $coop_nit;
  private $persona_id;

    /**
     * Constructor de Cooperativismo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idcooperativismo
     * @return idcooperativismo
     */
  public function getIdcooperativismo(){
      return $this->idcooperativismo;
  }

    /**
     * Modifica el valor correspondiente a idcooperativismo
     * @param idcooperativismo
     */
  public function setIdcooperativismo($idcooperativismo){
      $this->idcooperativismo = $idcooperativismo;
  }
    /**
     * Devuelve el valor correspondiente a coop_nombre
     * @return coop_nombre
     */
  public function getCoop_nombre(){
      return $this->coop_nombre;
  }

    /**
     * Modifica el valor correspondiente a coop_nombre
     * @param coop_nombre
     */
  public function setCoop_nombre($coop_nombre){
      $this->coop_nombre = $coop_nombre;
  }
    /**
     * Devuelve el valor correspondiente a coop_fecha
     * @return coop_fecha
     */
  public function getCoop_fecha(){
      return $this->coop_fecha;
  }

    /**
     * Modifica el valor correspondiente a coop_fecha
     * @param coop_fecha
     */
  public function setCoop_fecha($coop_fecha){
      $this->coop_fecha = $coop_fecha;
  }
    /**
     * Devuelve el valor correspondiente a coop_nit
     * @return coop_nit
     */
  public function getCoop_nit(){
      return $this->coop_nit;
  }

    /**
     * Modifica el valor correspondiente a coop_nit
     * @param coop_nit
     */
  public function setCoop_nit($coop_nit){
      $this->coop_nit = $coop_nit;
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