<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\


class Area_empresa {

  private $idarea_emp;
  private $nom_area;
  private $empresa_idempresa;

    /**
     * Constructor de Area_empresa
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idarea_emp
     * @return idarea_emp
     */
  public function getIdarea_emp(){
      return $this->idarea_emp;
  }

    /**
     * Modifica el valor correspondiente a idarea_emp
     * @param idarea_emp
     */
  public function setIdarea_emp($idarea_emp){
      $this->idarea_emp = $idarea_emp;
  }
    /**
     * Devuelve el valor correspondiente a nom_area
     * @return nom_area
     */
  public function getNom_area(){
      return $this->nom_area;
  }

    /**
     * Modifica el valor correspondiente a nom_area
     * @param nom_area
     */
  public function setNom_area($nom_area){
      $this->nom_area = $nom_area;
  }
    /**
     * Devuelve el valor correspondiente a empresa_idempresa
     * @return empresa_idempresa
     */
  public function getEmpresa_idempresa(){
      return $this->empresa_idempresa;
  }

    /**
     * Modifica el valor correspondiente a empresa_idempresa
     * @param empresa_idempresa
     */
  public function setEmpresa_idempresa($empresa_idempresa){
      $this->empresa_idempresa = $empresa_idempresa;
  }


}
//That´s all folks!