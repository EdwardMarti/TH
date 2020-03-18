<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\


class Pais {

  private $idpais;
  private $pais_descripcion;

    /**
     * Constructor de Pais
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idpais
     * @return idpais
     */
  public function getIdpais(){
      return $this->idpais;
  }

    /**
     * Modifica el valor correspondiente a idpais
     * @param idpais
     */
  public function setIdpais($idpais){
      $this->idpais = $idpais;
  }
    /**
     * Devuelve el valor correspondiente a pais_descripcion
     * @return pais_descripcion
     */
  public function getPais_descripcion(){
      return $this->pais_descripcion;
  }

    /**
     * Modifica el valor correspondiente a pais_descripcion
     * @param pais_descripcion
     */
  public function setPais_descripcion($pais_descripcion){
      $this->pais_descripcion = $pais_descripcion;
  }


}
//That´s all folks!