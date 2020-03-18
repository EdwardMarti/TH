<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\


class Carnet_supervigilancia {

  private $idcarne;
  private $carnet_nombre;

    /**
     * Constructor de Carnet_supervigilancia
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idcarne
     * @return idcarne
     */
  public function getIdcarne(){
      return $this->idcarne;
  }

    /**
     * Modifica el valor correspondiente a idcarne
     * @param idcarne
     */
  public function setIdcarne($idcarne){
      $this->idcarne = $idcarne;
  }
    /**
     * Devuelve el valor correspondiente a carnet_nombre
     * @return carnet_nombre
     */
  public function getCarnet_nombre(){
      return $this->carnet_nombre;
  }

    /**
     * Modifica el valor correspondiente a carnet_nombre
     * @param carnet_nombre
     */
  public function setCarnet_nombre($carnet_nombre){
      $this->carnet_nombre = $carnet_nombre;
  }


}
//That´s all folks!