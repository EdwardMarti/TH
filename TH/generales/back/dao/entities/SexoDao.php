<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\

include_once realpath('../../dao/interfaz/ISexoDao.php');
include_once realpath('../../dto/Sexo.php');

class SexoDao implements ISexoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Sexo en la base de datos.
     * @param sexo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($sexo){
      $idsexo=$sexo->getIdsexo();
$sexo_descripcion=$sexo->getSexo_descripcion();

      try {
          $sql= "INSERT INTO `sexo`( `idsexo`, `sexo_descripcion`)"
          ."VALUES ('$idsexo','$sexo_descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sexo en la base de datos.
     * @param sexo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($sexo){
      $idsexo=$sexo->getIdsexo();

      try {
          $sql= "SELECT `idsexo`, `sexo_descripcion`"
          ."FROM `sexo`"
          ."WHERE `idsexo`='$idsexo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $sexo->setIdsexo($data[$i]['idsexo']);
          $sexo->setSexo_descripcion($data[$i]['sexo_descripcion']);

          }
      return $sexo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Sexo en la base de datos.
     * @param sexo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($sexo){
      $idsexo=$sexo->getIdsexo();
$sexo_descripcion=$sexo->getSexo_descripcion();

      try {
          $sql= "UPDATE `sexo` SET`idsexo`='$idsexo' ,`sexo_descripcion`='$sexo_descripcion' WHERE `idsexo`='$idsexo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Sexo en la base de datos.
     * @param sexo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($sexo){
      $idsexo=$sexo->getIdsexo();

      try {
          $sql ="DELETE FROM `sexo` WHERE `idsexo`='$idsexo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sexo en la base de datos.
     * @return ArrayList<Sexo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idsexo`, `sexo_descripcion`"
          ."FROM `sexo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $sexo= new Sexo();
          $sexo->setIdsexo($data[$i]['idsexo']);
          $sexo->setSexo_descripcion($data[$i]['sexo_descripcion']);

          array_push($lista,$sexo);
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