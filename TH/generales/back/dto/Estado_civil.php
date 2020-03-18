<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\


class Estado_civil {

  private $idestado_civil;
  private $estado_civil_descripcion;

    /**
     * Constructor de Estado_civil
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idestado_civil
     * @return idestado_civil
     */
  public function getIdestado_civil(){
      return $this->idestado_civil;
  }

    /**
     * Modifica el valor correspondiente a idestado_civil
     * @param idestado_civil
     */
  public function setIdestado_civil($idestado_civil){
      $this->idestado_civil = $idestado_civil;
  }
    /**
     * Devuelve el valor correspondiente a estado_civil_descripcion
     * @return estado_civil_descripcion
     */
  public function getEstado_civil_descripcion(){
      return $this->estado_civil_descripcion;
  }

    /**
     * Modifica el valor correspondiente a estado_civil_descripcion
     * @param estado_civil_descripcion
     */
  public function setEstado_civil_descripcion($estado_civil_descripcion){
      $this->estado_civil_descripcion = $estado_civil_descripcion;
  }


}
//That´s all folks!