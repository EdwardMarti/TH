<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\


class Grupo_sanguineo {

  private $idgrupo_sanguineo;
  private $grupo_sanguineo_nombre;

    /**
     * Constructor de Grupo_sanguineo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idgrupo_sanguineo
     * @return idgrupo_sanguineo
     */
  public function getIdgrupo_sanguineo(){
      return $this->idgrupo_sanguineo;
  }

    /**
     * Modifica el valor correspondiente a idgrupo_sanguineo
     * @param idgrupo_sanguineo
     */
  public function setIdgrupo_sanguineo($idgrupo_sanguineo){
      $this->idgrupo_sanguineo = $idgrupo_sanguineo;
  }
    /**
     * Devuelve el valor correspondiente a grupo_sanguineo_nombre
     * @return grupo_sanguineo_nombre
     */
  public function getGrupo_sanguineo_nombre(){
      return $this->grupo_sanguineo_nombre;
  }

    /**
     * Modifica el valor correspondiente a grupo_sanguineo_nombre
     * @param grupo_sanguineo_nombre
     */
  public function setGrupo_sanguineo_nombre($grupo_sanguineo_nombre){
      $this->grupo_sanguineo_nombre = $grupo_sanguineo_nombre;
  }


}
//That´s all folks!