<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\


class Tipo_vigilancia {

  private $id;
  private $tipo_vigilancia;

    /**
     * Constructor de Tipo_vigilancia
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a tipo_vigilancia
     * @return tipo_vigilancia
     */
  public function getTipo_vigilancia(){
      return $this->tipo_vigilancia;
  }

    /**
     * Modifica el valor correspondiente a tipo_vigilancia
     * @param tipo_vigilancia
     */
  public function setTipo_vigilancia($tipo_vigilancia){
      $this->tipo_vigilancia = $tipo_vigilancia;
  }


}
//That´s all folks!