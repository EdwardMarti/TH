<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

include_once realpath('../../dao/interfaz/ITipo_vigilanciaDao.php');
include_once realpath('../../dto/Tipo_vigilancia.php');

class Tipo_vigilanciaDao implements ITipo_vigilanciaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_vigilancia en la base de datos.
     * @param tipo_vigilancia objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_vigilancia){
   //   $id=$tipo_vigilancia->getId();
$tipo_vigilancia=$tipo_vigilancia->getTipo_vigilancia();

      try {
          $sql= "INSERT INTO `tipo_vigilancia`( `tipo_vigilancia`)"
          ."VALUES ('$tipo_vigilancia')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_vigilancia en la base de datos.
     * @param tipo_vigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_vigilancia){
      $id=$tipo_vigilancia->getId();

      try {
          $sql= "SELECT `id`, `tipo_vigilancia`"
          ."FROM `tipo_vigilancia`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_vigilancia->setId($data[$i]['id']);
          $tipo_vigilancia->setTipo_vigilancia($data[$i]['tipo_vigilancia']);

          }
      return $tipo_vigilancia;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_vigilancia en la base de datos.
     * @param tipo_vigilancia objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_vigilancia){
      $id=$tipo_vigilancia->getId();
$tipo_vigilancia=$tipo_vigilancia->getTipo_vigilancia();

      try {
          $sql= "UPDATE `tipo_vigilancia` SET`id`='$id' ,`tipo_vigilancia`='$tipo_vigilancia' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_vigilancia en la base de datos.
     * @param tipo_vigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_vigilancia){
      $id=$tipo_vigilancia->getId();

      try {
          $sql ="DELETE FROM `tipo_vigilancia` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_vigilancia en la base de datos.
     * @return ArrayList<Tipo_vigilancia> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `tipo_vigilancia`"
          ."FROM `tipo_vigilancia`"
          ."WHERE `id`>'0'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_vigilancia= new Tipo_vigilancia();
          $tipo_vigilancia->setId($data[$i]['id']);
          $tipo_vigilancia->setTipo_vigilancia($data[$i]['tipo_vigilancia']);

          array_push($lista,$tipo_vigilancia);
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