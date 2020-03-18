<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

include_once realpath('../../dao/interfaz/IEstado_civilDao.php');
include_once realpath('../../dto/Estado_civil.php');

class Estado_civilDao implements IEstado_civilDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estado_civil){
      $idestado_civil=$estado_civil->getIdestado_civil();
$estado_civil_descripcion=$estado_civil->getEstado_civil_descripcion();

      try {
          $sql= "INSERT INTO `estado_civil`( `idestado_civil`, `estado_civil_descripcion`)"
          ."VALUES ('$idestado_civil','$estado_civil_descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estado_civil){
      $idestado_civil=$estado_civil->getIdestado_civil();

      try {
          $sql= "SELECT `idestado_civil`, `estado_civil_descripcion`"
          ."FROM `estado_civil`"
          ."WHERE `idestado_civil`='$idestado_civil'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estado_civil->setIdestado_civil($data[$i]['idestado_civil']);
          $estado_civil->setEstado_civil_descripcion($data[$i]['estado_civil_descripcion']);

          }
      return $estado_civil;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estado_civil){
      $idestado_civil=$estado_civil->getIdestado_civil();
$estado_civil_descripcion=$estado_civil->getEstado_civil_descripcion();

      try {
          $sql= "UPDATE `estado_civil` SET`idestado_civil`='$idestado_civil' ,`estado_civil_descripcion`='$estado_civil_descripcion' WHERE `idestado_civil`='$idestado_civil' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estado_civil){
      $idestado_civil=$estado_civil->getIdestado_civil();

      try {
          $sql ="DELETE FROM `estado_civil` WHERE `idestado_civil`='$idestado_civil'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estado_civil en la base de datos.
     * @return ArrayList<Estado_civil> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idestado_civil`, `estado_civil_descripcion`"
          ."FROM `estado_civil`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estado_civil= new Estado_civil();
          $estado_civil->setIdestado_civil($data[$i]['idestado_civil']);
          $estado_civil->setEstado_civil_descripcion($data[$i]['estado_civil_descripcion']);

          array_push($lista,$estado_civil);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!