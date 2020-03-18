<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es tu vida y se acaba a cada minuto.  \\


class Puesto {

  private $idpuesto;
  private $nombre;
  private $empresa_idempresa;

    /**
     * Constructor de Puesto
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idpuesto
     * @return idpuesto
     */
  public function getIdpuesto(){
      return $this->idpuesto;
  }

    /**
     * Modifica el valor correspondiente a idpuesto
     * @param idpuesto
     */
  public function setIdpuesto($idpuesto){
      $this->idpuesto = $idpuesto;
  }
    /**
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
  function getEmpresa_idempresa() {
      return $this->empresa_idempresa;
  }

  function setEmpresa_idempresa($empresa_idempresa) {
      $this->empresa_idempresa = $empresa_idempresa;
  }



}
//That´s all folks!