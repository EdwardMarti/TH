<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuenta la leyenda que si gritas 'Soy programador' las nenas caerán a tus pies  \\


class Pension {

  private $idpension;
  private $pension_nombre;

    /**
     * Constructor de Pension
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idpension
     * @return idpension
     */
  public function getIdpension(){
      return $this->idpension;
  }

    /**
     * Modifica el valor correspondiente a idpension
     * @param idpension
     */
  public function setIdpension($idpension){
      $this->idpension = $idpension;
  }
    /**
     * Devuelve el valor correspondiente a pension_nombre
     * @return pension_nombre
     */
  public function getPension_nombre(){
      return $this->pension_nombre;
  }

    /**
     * Modifica el valor correspondiente a pension_nombre
     * @param pension_nombre
     */
  public function setPension_nombre($pension_nombre){
      $this->pension_nombre = $pension_nombre;
  }


}
//That´s all folks!