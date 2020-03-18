<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\


class Sucursal {

  private $idsucursal;
  private $nombre_sucursal;
  private $direccion_sucursal;
  private $tel_sucursal;

    /**
     * Constructor de Sucursal
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idsucursal
     * @return idsucursal
     */
  public function getIdsucursal(){
      return $this->idsucursal;
  }

    /**
     * Modifica el valor correspondiente a idsucursal
     * @param idsucursal
     */
  public function setIdsucursal($idsucursal){
      $this->idsucursal = $idsucursal;
  }
    /**
     * Devuelve el valor correspondiente a nombre_sucursal
     * @return nombre_sucursal
     */
  public function getNombre_sucursal(){
      return $this->nombre_sucursal;
  }

    /**
     * Modifica el valor correspondiente a nombre_sucursal
     * @param nombre_sucursal
     */
  public function setNombre_sucursal($nombre_sucursal){
      $this->nombre_sucursal = $nombre_sucursal;
  }
    /**
     * Devuelve el valor correspondiente a direccion_sucursal
     * @return direccion_sucursal
     */
  public function getDireccion_sucursal(){
      return $this->direccion_sucursal;
  }

    /**
     * Modifica el valor correspondiente a direccion_sucursal
     * @param direccion_sucursal
     */
  public function setDireccion_sucursal($direccion_sucursal){
      $this->direccion_sucursal = $direccion_sucursal;
  }
    /**
     * Devuelve el valor correspondiente a tel_sucursal
     * @return tel_sucursal
     */
  public function getTel_sucursal(){
      return $this->tel_sucursal;
  }

    /**
     * Modifica el valor correspondiente a tel_sucursal
     * @param tel_sucursal
     */
  public function setTel_sucursal($tel_sucursal){
      $this->tel_sucursal = $tel_sucursal;
  }


}
//That´s all folks!