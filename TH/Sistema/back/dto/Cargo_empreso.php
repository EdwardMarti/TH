<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\


class Cargo_empreso {

  private $idcargo;
  private $nom_cargo;
  private $nom_cargo_1;
  private $nom_cargo_2;
  private $area_empresa_idarea_emp;

    /**
     * Constructor de Cargo_empreso
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idcargo
     * @return idcargo
     */
  public function getIdcargo(){
      return $this->idcargo;
  }

    /**
     * Modifica el valor correspondiente a idcargo
     * @param idcargo
     */
  public function setIdcargo($idcargo){
      $this->idcargo = $idcargo;
  }
    /**
     * Devuelve el valor correspondiente a nom_cargo
     * @return nom_cargo
     */
  public function getNom_cargo(){
      return $this->nom_cargo;
  }

    /**
     * Modifica el valor correspondiente a nom_cargo
     * @param nom_cargo
     */
  public function setNom_cargo($nom_cargo){
      $this->nom_cargo = $nom_cargo;
  }
  
  
  function getNom_cargo_1() {
      return $this->nom_cargo_1;
  }

  function getNom_cargo_2() {
      return $this->nom_cargo_2;
  }

  function setNom_cargo_1($nom_cargo_1) {
      $this->nom_cargo_1 = $nom_cargo_1;
  }

  function setNom_cargo_2($nom_cargo_2) {
      $this->nom_cargo_2 = $nom_cargo_2;
  }

      /**
     * Devuelve el valor correspondiente a area_empresa_idarea_emp
     * @return area_empresa_idarea_emp
     */
  public function getArea_empresa_idarea_emp(){
      return $this->area_empresa_idarea_emp;
  }

    /**
     * Modifica el valor correspondiente a area_empresa_idarea_emp
     * @param area_empresa_idarea_emp
     */
  public function setArea_empresa_idarea_emp($area_empresa_idarea_emp){
      $this->area_empresa_idarea_emp = $area_empresa_idarea_emp;
  }


}
//That´s all folks!