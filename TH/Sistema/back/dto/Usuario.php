<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\


class Usuario {

  private $idusuario;
  private $cedula;
  private $usuario_nombre;
  private $usuario_correo;
  private $usuario_pass;
  private $cargo_empreso_idcargo;
  private $user_activation_code;
  private $user_email_status;
  private $roll_idroll;
  private $estado;

    /**
     * Constructor de Usuario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idusuario
     * @return idusuario
     */
  public function getIdusuario(){
      return $this->idusuario;
  }

    /**
     * Modifica el valor correspondiente a idusuario
     * @param idusuario
     */
  public function setIdusuario($idusuario){
      $this->idusuario = $idusuario;
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
     * Devuelve el valor correspondiente a usuario_nombre
     * @return usuario_nombre
     */
  public function getUsuario_nombre(){
      return $this->usuario_nombre;
  }

    /**
     * Modifica el valor correspondiente a usuario_nombre
     * @param usuario_nombre
     */
  public function setUsuario_nombre($usuario_nombre){
      $this->usuario_nombre = $usuario_nombre;
  }
    /**
     * Devuelve el valor correspondiente a usuario_correo
     * @return usuario_correo
     */
  public function getUsuario_correo(){
      return $this->usuario_correo;
  }

    /**
     * Modifica el valor correspondiente a usuario_correo
     * @param usuario_correo
     */
  public function setUsuario_correo($usuario_correo){
      $this->usuario_correo = $usuario_correo;
  }
    /**
     * Devuelve el valor correspondiente a usuario_pass
     * @return usuario_pass
     */
  public function getUsuario_pass(){
      return $this->usuario_pass;
  }

    /**
     * Modifica el valor correspondiente a usuario_pass
     * @param usuario_pass
     */
  public function setUsuario_pass($usuario_pass){
      $this->usuario_pass = $usuario_pass;
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
     * Devuelve el valor correspondiente a user_activation_code
     * @return user_activation_code
     */
  public function getUser_activation_code(){
      return $this->user_activation_code;
  }

    /**
     * Modifica el valor correspondiente a user_activation_code
     * @param user_activation_code
     */
  public function setUser_activation_code($user_activation_code){
      $this->user_activation_code = $user_activation_code;
  }
    /**
     * Devuelve el valor correspondiente a user_email_status
     * @return user_email_status
     */
  public function getUser_email_status(){
      return $this->user_email_status;
  }

    /**
     * Modifica el valor correspondiente a user_email_status
     * @param user_email_status
     */
  public function setUser_email_status($user_email_status){
      $this->user_email_status = $user_email_status;
  }
    /**
     * Devuelve el valor correspondiente a roll_idroll
     * @return roll_idroll
     */
  public function getRoll_idroll(){
      return $this->roll_idroll;
  }

    /**
     * Modifica el valor correspondiente a roll_idroll
     * @param roll_idroll
     */
  public function setRoll_idroll($roll_idroll){
      $this->roll_idroll = $roll_idroll;
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


}
//That´s all folks!