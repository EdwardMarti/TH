<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\


class Departamento {

  private $iddepartamento;
  private $departamento_descripcion;
  private $pais_idpais;

    /**
     * Constructor de Departamento
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a iddepartamento
     * @return iddepartamento
     */
  public function getIddepartamento(){
      return $this->iddepartamento;
  }

    /**
     * Modifica el valor correspondiente a iddepartamento
     * @param iddepartamento
     */
  public function setIddepartamento($iddepartamento){
      $this->iddepartamento = $iddepartamento;
  }
    /**
     * Devuelve el valor correspondiente a departamento_descripcion
     * @return departamento_descripcion
     */
  public function getDepartamento_descripcion(){
      return $this->departamento_descripcion;
  }

    /**
     * Modifica el valor correspondiente a departamento_descripcion
     * @param departamento_descripcion
     */
  public function setDepartamento_descripcion($departamento_descripcion){
      $this->departamento_descripcion = $departamento_descripcion;
  }
    /**
     * Devuelve el valor correspondiente a pais_idpais
     * @return pais_idpais
     */
  public function getPais_idpais(){
      return $this->pais_idpais;
  }

    /**
     * Modifica el valor correspondiente a pais_idpais
     * @param pais_idpais
     */
  public function setPais_idpais($pais_idpais){
      $this->pais_idpais = $pais_idpais;
  }


}
//That´s all folks!