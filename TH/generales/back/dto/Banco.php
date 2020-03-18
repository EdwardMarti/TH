<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\


class Banco {

  private $idbanco;
  private $banco_descripcion;

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
     * Devuelve el valor correspondiente a banco_descripcion
     * @return banco_descripcion
     */
  public function getBanco_descripcion(){
      return $this->banco_descripcion;
  }

    /**
     * Modifica el valor correspondiente a banco_descripcion
     * @param banco_descripcion
     */
  public function setBanco_descripcion($banco_descripcion){
      $this->banco_descripcion = $banco_descripcion;
  }


}
//That´s all folks!