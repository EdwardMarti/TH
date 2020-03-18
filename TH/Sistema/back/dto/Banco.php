<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\


class Banco {

  private $idbanco;
  private $banco_nombre;
  private $numero_cuenta;
  private $persona_id;

    /**
     * Constructor de Banco
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idbanco
     * @return idbanco
     */
  public function getIdbanco(){
      return $this->idbanco;
  }

    /**
     * Modifica el valor correspondiente a idbanco
     * @param idbanco
     */
  public function setIdbanco($idbanco){
      $this->idbanco = $idbanco;
  }
    /**
     * Devuelve el valor correspondiente a banco_nombre
     * @return banco_nombre
     */
  public function getBanco_nombre(){
      return $this->banco_nombre;
  }

    /**
     * Modifica el valor correspondiente a banco_nombre
     * @param banco_nombre
     */
  public function setBanco_nombre($banco_nombre){
      $this->banco_nombre = $banco_nombre;
  }
    /**
     * Devuelve el valor correspondiente a numero_cuenta
     * @return numero_cuenta
     */
  public function getNumero_cuenta(){
      return $this->numero_cuenta;
  }

    /**
     * Modifica el valor correspondiente a numero_cuenta
     * @param numero_cuenta
     */
  public function setNumero_cuenta($numero_cuenta){
      $this->numero_cuenta = $numero_cuenta;
  }
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


}
//That´s all folks!