<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\


class Persona_has_celular {

  private $persona_id;
  private $celular_id;

    /**
     * Constructor de Persona_has_celular
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a persona_id
     * @return persona_id
     */
  public function getPersona_id(){
      return $this->persona_id;
  }

    /**
     * Modifica el valor correspondiente a persona_id
     * @param persona_id
     */
  public function setPersona_id($persona_id){
      $this->persona_id = $persona_id;
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