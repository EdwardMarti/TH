<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\

include_once realpath('../../dao/interfaz/IFamiliar_has_celularDao.php');
include_once realpath('../../dto/Familiar_has_celular.php');
include_once realpath('../../dto/Familiar.php');
include_once realpath('../../dto/Celular.php');

class Familiar_has_celularDao implements IFamiliar_has_celularDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($familiar_has_celular){
      $familiar_id=$familiar_has_celular->getFamiliar_id()->getId();
$celular_id=$familiar_has_celular->getCelular_id()->getId();

      try {
          $sql= "INSERT INTO `familiar_has_celular`( `familiar_id`, `celular_id`)"
          ."VALUES ('$familiar_id','$celular_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($familiar_has_celular){
      $familiar_id=$familiar_has_celular->getFamiliar_id()->getId();
$celular_id=$familiar_has_celular->getCelular_id()->getId();

      try {
          $sql= "SELECT `familiar_id`, `celular_id`"
          ."FROM `familiar_has_celular`"
          ."WHERE `familiar_id`='$familiar_id' AND`celular_id`='$celular_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $familiar = new Familiar();
           $familiar->setId($data[$i]['familiar_id']);
           $familiar_has_celular->setFamiliar_id($familiar);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $familiar_has_celular->setCelular_id($celular);

          }
      return $familiar_has_celular;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($familiar_has_celular){
      $familiar_id=$familiar_has_celular->getFamiliar_id()->getId();
$celular_id=$familiar_has_celular->getCelular_id()->getId();

      try {
          $sql= "UPDATE `familiar_has_celular` SET`familiar_id`='$familiar_id' ,`celular_id`='$celular_id' WHERE `familiar_id`='$familiar_id' AND `celular_id`='$celular_id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($familiar_has_celular){
      $familiar_id=$familiar_has_celular->getFamiliar_id()->getId();
$celular_id=$familiar_has_celular->getCelular_id()->getId();

      try {
          $sql ="DELETE FROM `familiar_has_celular` WHERE `familiar_id`='$familiar_id' AND`celular_id`='$celular_id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Familiar_has_celular en la base de datos.
     * @return ArrayList<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `familiar_id`, `celular_id`"
          ."FROM `familiar_has_celular`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $familiar_has_celular= new Familiar_has_celular();
           $familiar = new Familiar();
           $familiar->setId($data[$i]['familiar_id']);
           $familiar_has_celular->setFamiliar_id($familiar);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $familiar_has_celular->setCelular_id($celular);

          array_push($lista,$familiar_has_celular);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByFamiliar_id($familiar_has_celular){
      $lista = array();
      $familiar_id=$familiar_has_celular->getFamiliar_id()->getId();

      try {
          $sql ="SELECT `familiar_id`, `celular_id`"
          ."FROM `familiar_has_celular`"
          ."WHERE `familiar_id`='$familiar_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $familiar_has_celular = new Familiar_has_celular();
           $familiar = new Familiar();
           $familiar->setId($data[$i]['familiar_id']);
           $familiar_has_celular->setFamiliar_id($familiar);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $familiar_has_celular->setCelular_id($celular);

          array_push($lista,$familiar_has_celular);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByCelular_id($familiar_has_celular){
      $lista = array();
      $celular_id=$familiar_has_celular->getCelular_id()->getId();

      try {
          $sql ="SELECT `familiar_id`, `celular_id`"
          ."FROM `familiar_has_celular`"
          ."WHERE `celular_id`='$celular_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $familiar_has_celular = new Familiar_has_celular();
           $familiar = new Familiar();
           $familiar->setId($data[$i]['familiar_id']);
           $familiar_has_celular->setFamiliar_id($familiar);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $familiar_has_celular->setCelular_id($celular);

          array_push($lista,$familiar_has_celular);
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