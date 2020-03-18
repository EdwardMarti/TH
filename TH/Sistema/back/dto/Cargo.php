<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\


class Cargo {

  private $id;
  private $fecha_ingreso;
  private $empresa_idempresa;
  private $area_empresa_idarea_emp;
  private $cargo_empreso_idcargo;
  private $puesto_idpuesto;
  private $Empresa_p_idEmpresa_p;
  private $persona_id;

    /**
     * Constructor de Cargo
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
     * Devuelve el valor correspondiente a fecha_ingreso
     * @return fecha_ingreso
     */
  public function getFecha_ingreso(){
      return $this->fecha_ingreso;
  }

    /**
     * Modifica el valor correspondiente a fecha_ingreso
     * @param fecha_ingreso
     */
  public function setFecha_ingreso($fecha_ingreso){
      $this->fecha_ingreso = $fecha_ingreso;
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
    /**
     * Devuelve el valor correspondiente a cargo_empreso_idcargo
     * @return cargo_empreso_idcargo
     */
  public function getCargo_empreso_idcargo(){
      return $this->cargo_empreso_idcargo;
  }

    /**
     * Modifica el valor correspondiente a cargo_empreso_idcargo
     * @param cargo_empreso_idcargo
     */
  public function setCargo_empreso_idcargo($cargo_empreso_idcargo){
      $this->cargo_empreso_idcargo = $cargo_empreso_idcargo;
  }
    /**
     * Devuelve el valor correspondiente a puesto_idpuesto
     * @return puesto_idpuesto
     */
  public function getPuesto_idpuesto(){
      return $this->puesto_idpuesto;
  }

    /**
     * Modifica el valor correspondiente a puesto_idpuesto
     * @param puesto_idpuesto
     */
  public function setPuesto_idpuesto($puesto_idpuesto){
      $this->puesto_idpuesto = $puesto_idpuesto;
  }

  function getEmpresa_p_idEmpresa_p() {
      return $this->Empresa_p_idEmpresa_p;
  }

  function getPersona_id() {
      return $this->persona_id;
  }

  function setEmpresa_p_idEmpresa_p($Empresa_p_idEmpresa_p) {
      $this->Empresa_p_idEmpresa_p = $Empresa_p_idEmpresa_p;
  }

  function setPersona_id($persona_id) {
      $this->persona_id = $persona_id;
  }


}
//That´s all folks!