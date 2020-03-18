<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\

include_once realpath('../../dao/interfaz/ISalud_pensionDao.php');
include_once realpath('../../dto/Salud_pension.php');
include_once realpath('../../dto/Persona.php');

class Salud_pensionDao implements ISalud_pensionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($salud_pension){
      $id=$salud_pension->getId();
$salud=$salud_pension->getSalud();
$pension=$salud_pension->getPension();
$persona_id=$salud_pension->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `salud_pension`( `id`, `salud`, `pension`, `persona_id`)"
          ."VALUES ('$id','$salud','$pension','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($salud_pension){
      $id=$salud_pension->getId();

      try {
          $sql= "SELECT `id`, `salud`, `pension`, `persona_id`"
          ."FROM `salud_pension`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $salud_pension->setId($data[$i]['id']);
          $salud_pension->setSalud($data[$i]['salud']);
          $salud_pension->setPension($data[$i]['pension']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $salud_pension->setPersona_id($persona);

          }
      return $salud_pension;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($salud_pension){
      $id=$salud_pension->getId();
$salud=$salud_pension->getSalud();
$pension=$salud_pension->getPension();
$persona_id=$salud_pension->getPersona_id()->getId();

      try {
          $sql= "UPDATE `salud_pension` SET`id`='$id' ,`salud`='$salud' ,`pension`='$pension' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($salud_pension){
      $id=$salud_pension->getId();

      try {
          $sql ="DELETE FROM `salud_pension` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Salud_pension en la base de datos.
     * @return ArrayList<Salud_pension> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `salud`, `pension`, `persona_id`"
          ."FROM `salud_pension`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $salud_pension= new Salud_pension();
          $salud_pension->setId($data[$i]['id']);
          $salud_pension->setSalud($data[$i]['salud']);
          $salud_pension->setPension($data[$i]['pension']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $salud_pension->setPersona_id($persona);

          array_push($lista,$salud_pension);
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