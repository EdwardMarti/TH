<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\


class Celular {

  private $id;
  private $numero;

    /**
     * Constructor de Celular
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
     * Devuelve el valor correspondiente a numero
     * @return numero
     */
  public function getNumero(){
      return $this->numero;
  }

    /**
     * Modifica el valor correspondiente a numero
     * @param numero
     */
  public function setNumero($numero){
      $this->numero = $numero;
  }


}
//That´s all folks!