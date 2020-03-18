<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\


class Nivel_estudios {

  private $idnivel_estudios;
  private $nivel_estudios_nombre;

    /**
     * Constructor de Nivel_estudios
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idnivel_estudios
     * @return idnivel_estudios
     */
  public function getIdnivel_estudios(){
      return $this->idnivel_estudios;
  }

    /**
     * Modifica el valor correspondiente a idnivel_estudios
     * @param idnivel_estudios
     */
  public function setIdnivel_estudios($idnivel_estudios){
      $this->idnivel_estudios = $idnivel_estudios;
  }
    /**
     * Devuelve el valor correspondiente a nivel_estudios_nombre
     * @return nivel_estudios_nombre
     */
  public function getNivel_estudios_nombre(){
      return $this->nivel_estudios_nombre;
  }

    /**
     * Modifica el valor correspondiente a nivel_estudios_nombre
     * @param nivel_estudios_nombre
     */
  public function setNivel_estudios_nombre($nivel_estudios_nombre){
      $this->nivel_estudios_nombre = $nivel_estudios_nombre;
  }


}
//That´s all folks!