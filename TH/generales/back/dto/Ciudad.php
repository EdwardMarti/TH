<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\


class Ciudad {

  private $idciudad;
  private $ciudad_descripcion;
  private $departamento_iddepartamento;

    /**
     * Constructor de Ciudad
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idciudad
     * @return idciudad
     */
  public function getIdciudad(){
      return $this->idciudad;
  }

    /**
     * Modifica el valor correspondiente a idciudad
     * @param idciudad
     */
  public function setIdciudad($idciudad){
      $this->idciudad = $idciudad;
  }
    /**
     * Devuelve el valor correspondiente a ciudad_descripcion
     * @return ciudad_descripcion
     */
  public function getCiudad_descripcion(){
      return $this->ciudad_descripcion;
  }

    /**
     * Modifica el valor correspondiente a ciudad_descripcion
     * @param ciudad_descripcion
     */
  public function setCiudad_descripcion($ciudad_descripcion){
      $this->ciudad_descripcion = $ciudad_descripcion;
  }
    /**
     * Devuelve el valor correspondiente a departamento_iddepartamento
     * @return departamento_iddepartamento
     */
  public function getDepartamento_iddepartamento(){
      return $this->departamento_iddepartamento;
  }

    /**
     * Modifica el valor correspondiente a departamento_iddepartamento
     * @param departamento_iddepartamento
     */
  public function setDepartamento_iddepartamento($departamento_iddepartamento){
      $this->departamento_iddepartamento = $departamento_iddepartamento;
  }


}
//That´s all folks!