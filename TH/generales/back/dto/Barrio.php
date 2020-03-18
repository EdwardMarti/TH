<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\


class Barrio {

  private $idbarrio;
  private $barrioco_nombre;
  private $ciudad_idciudad;

    /**
     * Constructor de Barrio
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idbarrio
     * @return idbarrio
     */
  public function getIdbarrio(){
      return $this->idbarrio;
  }

    /**
     * Modifica el valor correspondiente a idbarrio
     * @param idbarrio
     */
  public function setIdbarrio($idbarrio){
      $this->idbarrio = $idbarrio;
  }
    /**
     * Devuelve el valor correspondiente a barrioco_nombre
     * @return barrioco_nombre
     */
  public function getBarrioco_nombre(){
      return $this->barrioco_nombre;
  }

    /**
     * Modifica el valor correspondiente a barrioco_nombre
     * @param barrioco_nombre
     */
  public function setBarrioco_nombre($barrioco_nombre){
      $this->barrioco_nombre = $barrioco_nombre;
  }
    /**
     * Devuelve el valor correspondiente a ciudad_idciudad
     * @return ciudad_idciudad
     */
  public function getCiudad_idciudad(){
      return $this->ciudad_idciudad;
  }

    /**
     * Modifica el valor correspondiente a ciudad_idciudad
     * @param ciudad_idciudad
     */
  public function setCiudad_idciudad($ciudad_idciudad){
      $this->ciudad_idciudad = $ciudad_idciudad;
  }


}
//That´s all folks!