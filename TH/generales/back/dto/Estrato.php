<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\


class Estrato {

  private $idestrato;
  private $estrato_nombre;

    /**
     * Constructor de Estrato
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idestrato
     * @return idestrato
     */
  public function getIdestrato(){
      return $this->idestrato;
  }

    /**
     * Modifica el valor correspondiente a idestrato
     * @param idestrato
     */
  public function setIdestrato($idestrato){
      $this->idestrato = $idestrato;
  }
    /**
     * Devuelve el valor correspondiente a estrato_nombre
     * @return estrato_nombre
     */
  public function getEstrato_nombre(){
      return $this->estrato_nombre;
  }

    /**
     * Modifica el valor correspondiente a estrato_nombre
     * @param estrato_nombre
     */
  public function setEstrato_nombre($estrato_nombre){
      $this->estrato_nombre = $estrato_nombre;
  }


}
//That´s all folks!