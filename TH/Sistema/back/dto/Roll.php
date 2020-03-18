<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\


class Roll {

  private $idroll;
  private $roll_nombre;

    /**
     * Constructor de Roll
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idroll
     * @return idroll
     */
  public function getIdroll(){
      return $this->idroll;
  }

    /**
     * Modifica el valor correspondiente a idroll
     * @param idroll
     */
  public function setIdroll($idroll){
      $this->idroll = $idroll;
  }
    /**
     * Devuelve el valor correspondiente a roll_nombre
     * @return roll_nombre
     */
  public function getRoll_nombre(){
      return $this->roll_nombre;
  }

    /**
     * Modifica el valor correspondiente a roll_nombre
     * @param roll_nombre
     */
  public function setRoll_nombre($roll_nombre){
      $this->roll_nombre = $roll_nombre;
  }


}
//That´s all folks!