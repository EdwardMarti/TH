<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\

include_once realpath('../../dao/interfaz/IDomicilioDao.php');
include_once realpath('../../dto/Domicilio.php');
include_once realpath('../../dto/Persona.php');

class DomicilioDao implements IDomicilioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Domicilio en la base de datos.
     * @param domicilio objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($domicilio){
      $id=$domicilio->getId();
$direccion=$domicilio->getDireccion();
$barrio=$domicilio->getBarrio();
$persona_id=$domicilio->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `domicilio`( `id`, `direccion`, `barrio`, `persona_id`)"
          ."VALUES ('$id','$direccion','$barrio','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($domicilio){
      $id=$domicilio->getId();

      try {
          $sql= "SELECT `id`, `direccion`, `barrio`, `persona_id`"
          ."FROM `domicilio`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $domicilio->setId($data[$i]['id']);
          $domicilio->setDireccion($data[$i]['direccion']);
          $domicilio->setBarrio($data[$i]['barrio']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $domicilio->setPersona_id($persona);

          }
      return $domicilio;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($domicilio){
      $id=$domicilio->getId();
$direccion=$domicilio->getDireccion();
$barrio=$domicilio->getBarrio();
$persona_id=$domicilio->getPersona_id()->getId();

      try {
          $sql= "UPDATE `domicilio` SET`id`='$id' ,`direccion`='$direccion' ,`barrio`='$barrio' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($domicilio){
      $id=$domicilio->getId();

      try {
          $sql ="DELETE FROM `domicilio` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Domicilio en la base de datos.
     * @return ArrayList<Domicilio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `direccion`, `barrio`, `persona_id`"
          ."FROM `domicilio`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $domicilio= new Domicilio();
          $domicilio->setId($data[$i]['id']);
          $domicilio->setDireccion($data[$i]['direccion']);
          $domicilio->setBarrio($data[$i]['barrio']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $domicilio->setPersona_id($persona);

          array_push($lista,$domicilio);
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