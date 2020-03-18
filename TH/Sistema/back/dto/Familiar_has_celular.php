<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cansado de escribir bugs? tranquilo, los escribimos por ti  \\


class Familiar_has_celular {

  private $familiar_id;
  private $celular_id;

    /**
     * Constructor de Familiar_has_celular
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a familiar_id
     * @return familiar_id
     */
  public function getFamiliar_id(){
      return $this->familiar_id;
  }

    /**
     * Modifica el valor correspondiente a familiar_id
     * @param familiar_id
     */
  public function setFamiliar_id($familiar_id){
      $this->familiar_id = $familiar_id;
  }
    /**
     * Devuelve el valor correspondiente a celular_id
     * @return celular_id
     */
  public function getCelular_id(){
      return $this->celular_id;
  }

    /**
     * Modifica el valor correspondiente a celular_id
     * @param celular_id
     */
  public function setCelular_id($celular_id){
      $this->celular_id = $celular_id;
  }


}
//That´s all folks!