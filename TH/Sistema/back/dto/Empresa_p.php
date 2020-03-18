<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


class Empresa_p {

  private $idEmpresa_p;
  private $Empresa_p_nombre;
  private $nit_empresa_p;
  private $Empresa_p_direccion;
  private $Empresa_p_tel;

    /**
     * Constructor de Empresa_p
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idEmpresa_p
     * @return idEmpresa_p
     */
  public function getIdEmpresa_p(){
      return $this->idEmpresa_p;
  }

    /**
     * Modifica el valor correspondiente a idEmpresa_p
     * @param idEmpresa_p
     */
  public function setIdEmpresa_p($idEmpresa_p){
      $this->idEmpresa_p = $idEmpresa_p;
  }
    /**
     * Devuelve el valor correspondiente a Empresa_p_nombre
     * @return Empresa_p_nombre
     */
  public function getEmpresa_p_nombre(){
      return $this->Empresa_p_nombre;
  }

    /**
     * Modifica el valor correspondiente a Empresa_p_nombre
     * @param Empresa_p_nombre
     */
  public function setEmpresa_p_nombre($empresa_p_nombre){
      $this->Empresa_p_nombre = $empresa_p_nombre;
  }
    /**
     * Devuelve el valor correspondiente a nit_empresa_p
     * @return nit_empresa_p
     */
  public function getNit_empresa_p(){
      return $this->nit_empresa_p;
  }

    /**
     * Modifica el valor correspondiente a nit_empresa_p
     * @param nit_empresa_p
     */
  public function setNit_empresa_p($nit_empresa_p){
      $this->nit_empresa_p = $nit_empresa_p;
  }
    /**
     * Devuelve el valor correspondiente a Empresa_p_direccion
     * @return Empresa_p_direccion
     */
  public function getEmpresa_p_direccion(){
      return $this->Empresa_p_direccion;
  }

    /**
     * Modifica el valor correspondiente a Empresa_p_direccion
     * @param Empresa_p_direccion
     */
  public function setEmpresa_p_direccion($empresa_p_direccion){
      $this->Empresa_p_direccion = $empresa_p_direccion;
  }
    /**
     * Devuelve el valor correspondiente a Empresa_p_tel
     * @return Empresa_p_tel
     */
  public function getEmpresa_p_tel(){
      return $this->Empresa_p_tel;
  }

    /**
     * Modifica el valor correspondiente a Empresa_p_tel
     * @param Empresa_p_tel
     */
  public function setEmpresa_p_tel($empresa_p_tel){
      $this->Empresa_p_tel = $empresa_p_tel;
  }


}
//That´s all folks!