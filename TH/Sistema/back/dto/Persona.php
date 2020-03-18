<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\


class Persona {

  private $id;
  private $cedula;
  private $nacionalidad;
  private $cedula_lugar_expedicion;
  private $nombres;
  private $apellidos;
  private $fechaNacimiento;
  private $lugar_nacimiento;
  private $sexo;
  private $grupo_sanguineo;
  private $estado_civil;
  private $correo;
  private $estado;
  private $cargo_id;
  private $nivel_vigilancia_id_p;
  private $tipo_vigilancia_id;
  private $libreta;

    /**
     * Constructor de Persona
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
     * Devuelve el valor correspondiente a cedula
     * @return cedula
     */
  public function getCedula(){
      return $this->cedula;
  }

    /**
     * Modifica el valor correspondiente a cedula
     * @param cedula
     */
  public function setCedula($cedula){
      $this->cedula = $cedula;
  }
    /**
     * Devuelve el valor correspondiente a nacionalidad
     * @return nacionalidad
     */
  public function getNacionalidad(){
      return $this->nacionalidad;
  }

    /**
     * Modifica el valor correspondiente a nacionalidad
     * @param nacionalidad
     */
  public function setNacionalidad($nacionalidad){
      $this->nacionalidad = $nacionalidad;
  }
    /**
     * Devuelve el valor correspondiente a cedula_lugar_expedicion
     * @return cedula_lugar_expedicion
     */
  public function getCedula_lugar_expedicion(){
      return $this->cedula_lugar_expedicion;
  }

    /**
     * Modifica el valor correspondiente a cedula_lugar_expedicion
     * @param cedula_lugar_expedicion
     */
  public function setCedula_lugar_expedicion($cedula_lugar_expedicion){
      $this->cedula_lugar_expedicion = $cedula_lugar_expedicion;
  }
    /**
     * Devuelve el valor correspondiente a nombres
     * @return nombres
     */
  public function getNombres(){
      return $this->nombres;
  }

    /**
     * Modifica el valor correspondiente a nombres
     * @param nombres
     */
  public function setNombres($nombres){
      $this->nombres = $nombres;
  }
    /**
     * Devuelve el valor correspondiente a apellidos
     * @return apellidos
     */
  public function getApellidos(){
      return $this->apellidos;
  }

    /**
     * Modifica el valor correspondiente a apellidos
     * @param apellidos
     */
  public function setApellidos($apellidos){
      $this->apellidos = $apellidos;
  }
    /**
     * Devuelve el valor correspondiente a fechaNacimiento
     * @return fechaNacimiento
     */
  public function getFechaNacimiento(){
      return $this->fechaNacimiento;
  }

    /**
     * Modifica el valor correspondiente a fechaNacimiento
     * @param fechaNacimiento
     */
  public function setFechaNacimiento($fechaNacimiento){
      $this->fechaNacimiento = $fechaNacimiento;
  }
    /**
     * Devuelve el valor correspondiente a lugar_nacimiento
     * @return lugar_nacimiento
     */
  public function getLugar_nacimiento(){
      return $this->lugar_nacimiento;
  }

    /**
     * Modifica el valor correspondiente a lugar_nacimiento
     * @param lugar_nacimiento
     */
  public function setLugar_nacimiento($lugar_nacimiento){
      $this->lugar_nacimiento = $lugar_nacimiento;
  }
    /**
     * Devuelve el valor correspondiente a sexo
     * @return sexo
     */
  public function getSexo(){
      return $this->sexo;
  }

    /**
     * Modifica el valor correspondiente a sexo
     * @param sexo
     */
  public function setSexo($sexo){
      $this->sexo = $sexo;
  }
    /**
     * Devuelve el valor correspondiente a grupo_sanguineo
     * @return grupo_sanguineo
     */
  public function getGrupo_sanguineo(){
      return $this->grupo_sanguineo;
  }

    /**
     * Modifica el valor correspondiente a grupo_sanguineo
     * @param grupo_sanguineo
     */
  public function setGrupo_sanguineo($grupo_sanguineo){
      $this->grupo_sanguineo = $grupo_sanguineo;
  }
    /**
     * Devuelve el valor correspondiente a estado_civil
     * @return estado_civil
     */
  public function getEstado_civil(){
      return $this->estado_civil;
  }

    /**
     * Modifica el valor correspondiente a estado_civil
     * @param estado_civil
     */
  public function setEstado_civil($estado_civil){
      $this->estado_civil = $estado_civil;
  }
    /**
     * Devuelve el valor correspondiente a correo
     * @return correo
     */
  public function getCorreo(){
      return $this->correo;
  }

    /**
     * Modifica el valor correspondiente a correo
     * @param correo
     */
  public function setCorreo($correo){
      $this->correo = $correo;
  }
    /**
     * Devuelve el valor correspondiente a estado
     * @return estado
     */
  public function getEstado(){
      return $this->estado;
  }

    /**
     * Modifica el valor correspondiente a estado
     * @param estado
     */
  public function setEstado($estado){
      $this->estado = $estado;
  }
    /**
     * Devuelve el valor correspondiente a cargo_id
     * @return cargo_id
     */
  public function getCargo_id(){
      return $this->cargo_id;
  }

    /**
     * Modifica el valor correspondiente a cargo_id
     * @param cargo_id
     */
  public function setCargo_id($cargo_id){
      $this->cargo_id = $cargo_id;
  }
    /**
     * Devuelve el valor correspondiente a nivel_vigilancia_id
     * @return nivel_vigilancia_id
     */
  public function getNivel_vigilancia_id_p(){
      return $this->nivel_vigilancia_id_p;
  }

    /**
     * Modifica el valor correspondiente a nivel_vigilancia_id
     * @param nivel_vigilancia_id
     */
  public function setNivel_vigilancia_id_p($nivel_vigilancia_id_p){
      $this->nivel_vigilancia_id_p = $nivel_vigilancia_id_p;
  }
    /**
     * Devuelve el valor correspondiente a tipo_vigilancia_id
     * @return tipo_vigilancia_id
     */
  public function getTipo_vigilancia_id(){
      return $this->tipo_vigilancia_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_vigilancia_id
     * @param tipo_vigilancia_id
     */
  public function setTipo_vigilancia_id($tipo_vigilancia_id){
      $this->tipo_vigilancia_id = $tipo_vigilancia_id;
  }
    /**
     * Devuelve el valor correspondiente a libreta
     * @return libreta
     */
  public function getLibreta(){
      return $this->libreta;
  }

    /**
     * Modifica el valor correspondiente a libreta
     * @param libreta
     */
  public function setLibreta($libreta){
      $this->libreta = $libreta;
  }


}
//That´s all folks!