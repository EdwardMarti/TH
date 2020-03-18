<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\


class Arl {

  private $idarl;
  private $arl_nombre;

    /**
     * Constructor de Arl
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idarl
     * @return idarl
     */
  public function getIdarl(){
      return $this->idarl;
  }

    /**
     * Modifica el valor correspondiente a idarl
     * @param idarl
     */
  public function setIdarl($idarl){
      $this->idarl = $idarl;
  }
    /**
     * Devuelve el valor correspondiente a arl_nombre
     * @return arl_nombre
     */
  public function getArl_nombre(){
      return $this->arl_nombre;
  }

    /**
     * Modifica el valor correspondiente a arl_nombre
     * @param arl_nombre
     */
  public function setArl_nombre($arl_nombre){
      $this->arl_nombre = $arl_nombre;
  }


}
//That´s all folks!