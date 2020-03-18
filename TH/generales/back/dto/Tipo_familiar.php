<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\


class Tipo_familiar {

  private $idtipo_familiar;
  private $tipo_familiar_descripcion;

    /**
     * Constructor de Tipo_familiar
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idtipo_familiar
     * @return idtipo_familiar
     */
  public function getIdtipo_familiar(){
      return $this->idtipo_familiar;
  }

    /**
     * Modifica el valor correspondiente a idtipo_familiar
     * @param idtipo_familiar
     */
  public function setIdtipo_familiar($idtipo_familiar){
      $this->idtipo_familiar = $idtipo_familiar;
  }
    /**
     * Devuelve el valor correspondiente a tipo_familiar_descripcion
     * @return tipo_familiar_descripcion
     */
  public function getTipo_familiar_descripcion(){
      return $this->tipo_familiar_descripcion;
  }

    /**
     * Modifica el valor correspondiente a tipo_familiar_descripcion
     * @param tipo_familiar_descripcion
     */
  public function setTipo_familiar_descripcion($tipo_familiar_descripcion){
      $this->tipo_familiar_descripcion = $tipo_familiar_descripcion;
  }


}
//That´s all folks!