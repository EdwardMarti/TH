<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\


class Sexo {

  private $idsexo;
  private $sexo_descripcion;

    /**
     * Constructor de Sexo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idsexo
     * @return idsexo
     */
  public function getIdsexo(){
      return $this->idsexo;
  }

    /**
     * Modifica el valor correspondiente a idsexo
     * @param idsexo
     */
  public function setIdsexo($idsexo){
      $this->idsexo = $idsexo;
  }
    /**
     * Devuelve el valor correspondiente a sexo_descripcion
     * @return sexo_descripcion
     */
  public function getSexo_descripcion(){
      return $this->sexo_descripcion;
  }

    /**
     * Modifica el valor correspondiente a sexo_descripcion
     * @param sexo_descripcion
     */
  public function setSexo_descripcion($sexo_descripcion){
      $this->sexo_descripcion = $sexo_descripcion;
  }


}
//That´s all folks!