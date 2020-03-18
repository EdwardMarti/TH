<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\


class Empresa {

  private $idempresa;
  private $nombre_empresa;
  private $nit_empresa;
  private $direccion_empresa;
  private $Empresa_p_idEmpresa_p;

    /**
     * Constructor de Empresa
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idempresa
     * @return idempresa
     */
  public function getIdempresa(){
      return $this->idempresa;
  }

    /**
     * Modifica el valor correspondiente a idempresa
     * @param idempresa
     */
  public function setIdempresa($idempresa){
      $this->idempresa = $idempresa;
  }
  
  
  function getEmpresa_p_idEmpresa_p() {
      return $this->Empresa_p_idEmpresa_p;
  }

  function setEmpresa_p_idEmpresa_p($Empresa_p_idEmpresa_p) {
      $this->Empresa_p_idEmpresa_p = $Empresa_p_idEmpresa_p;
  }

      /**
     * Devuelve el valor correspondiente a nombre_empresa
     * @return nombre_empresa
     */
  public function getNombre_empresa(){
      return $this->nombre_empresa;
  }

    /**
     * Modifica el valor correspondiente a nombre_empresa
     * @param nombre_empresa
     */
  public function setNombre_empresa($nombre_empresa){
      $this->nombre_empresa = $nombre_empresa;
  }
    /**
     * Devuelve el valor correspondiente a nit_empresa
     * @return nit_empresa
     */
  public function getNit_empresa(){
      return $this->nit_empresa;
  }

    /**
     * Modifica el valor correspondiente a nit_empresa
     * @param nit_empresa
     */
  public function setNit_empresa($nit_empresa){
      $this->nit_empresa = $nit_empresa;
  }
    /**
     * Devuelve el valor correspondiente a direccion_empresa
     * @return direccion_empresa
     */
  public function getDireccion_empresa(){
      return $this->direccion_empresa;
  }

    /**
     * Modifica el valor correspondiente a direccion_empresa
     * @param direccion_empresa
     */
  public function setDireccion_empresa($direccion_empresa){
      $this->direccion_empresa = $direccion_empresa;
  }


}
//That´s all folks!