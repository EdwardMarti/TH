<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\


class Eps {

  private $ideps;
  private $eps_nombre;

    /**
     * Constructor de Eps
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a ideps
     * @return ideps
     */
  public function getIdeps(){
      return $this->ideps;
  }

    /**
     * Modifica el valor correspondiente a ideps
     * @param ideps
     */
  public function setIdeps($ideps){
      $this->ideps = $ideps;
  }
    /**
     * Devuelve el valor correspondiente a eps_nombre
     * @return eps_nombre
     */
  public function getEps_nombre(){
      return $this->eps_nombre;
  }

    /**
     * Modifica el valor correspondiente a eps_nombre
     * @param eps_nombre
     */
  public function setEps_nombre($eps_nombre){
      $this->eps_nombre = $eps_nombre;
  }


}
//That´s all folks!