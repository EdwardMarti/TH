<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\

include_once realpath('../../dao/interfaz/IPersona_has_celularDao.php');
include_once realpath('../../dto/Persona_has_celular.php');
include_once realpath('../../dto/Persona.php');
include_once realpath('../../dto/Celular.php');

class Persona_has_celularDao implements IPersona_has_celularDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona_has_celular){
      $persona_id=$persona_has_celular->getPersona_id()->getId();
$celular_id=$persona_has_celular->getCelular_id()->getId();

      try {
          $sql= "INSERT INTO `persona_has_celular`( `persona_id`, `celular_id`)"
          ."VALUES ('$persona_id','$celular_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona_has_celular){
      $persona_id=$persona_has_celular->getPersona_id()->getId();
$celular_id=$persona_has_celular->getCelular_id()->getId();

      try {
          $sql= "SELECT `persona_id`, `celular_id`"
          ."FROM `persona_has_celular`"
          ."WHERE `persona_id`='$persona_id' AND`celular_id`='$celular_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_celular->setPersona_id($persona);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $persona_has_celular->setCelular_id($celular);

          }
      return $persona_has_celular;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona_has_celular){
      $persona_id=$persona_has_celular->getPersona_id()->getId();
$celular_id=$persona_has_celular->getCelular_id()->getId();

      try {
          $sql= "UPDATE `persona_has_celular` SET`persona_id`='$persona_id' ,`celular_id`='$celular_id' WHERE `persona_id`='$persona_id' AND `celular_id`='$celular_id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona_has_celular){
      $persona_id=$persona_has_celular->getPersona_id()->getId();
$celular_id=$persona_has_celular->getCelular_id()->getId();

      try {
          $sql ="DELETE FROM `persona_has_celular` WHERE `persona_id`='$persona_id' AND`celular_id`='$celular_id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_celular en la base de datos.
     * @return ArrayList<Persona_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `persona_id`, `celular_id`"
          ."FROM `persona_has_celular`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_celular= new Persona_has_celular();
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_celular->setPersona_id($persona);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $persona_has_celular->setCelular_id($celular);

          array_push($lista,$persona_has_celular);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Persona_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByPersona_id($persona_has_celular){
      $lista = array();
      $persona_id=$persona_has_celular->getPersona_id()->getId();

      try {
          $sql ="SELECT `persona_id`, `celular_id`"
          ."FROM `persona_has_celular`"
          ."WHERE `persona_id`='$persona_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona_has_celular = new Persona_has_celular();
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_celular->setPersona_id($persona);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $persona_has_celular->setCelular_id($celular);

          array_push($lista,$persona_has_celular);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Persona_has_celular en la base de datos.
     * @param persona_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Persona_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByCelular_id($persona_has_celular){
      $lista = array();
      $celular_id=$persona_has_celular->getCelular_id()->getId();

      try {
          $sql ="SELECT `persona_id`, `celular_id`"
          ."FROM `persona_has_celular`"
          ."WHERE `celular_id`='$celular_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona_has_celular = new Persona_has_celular();
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_celular->setPersona_id($persona);
           $celular = new Celular();
           $celular->setId($data[$i]['celular_id']);
           $persona_has_celular->setCelular_id($celular);

          array_push($lista,$persona_has_celular);
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