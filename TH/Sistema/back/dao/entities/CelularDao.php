<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\

include_once realpath('../../dao/interfaz/ICelularDao.php');
include_once realpath('../../dto/Celular.php');

class CelularDao implements ICelularDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Celular en la base de datos.
     * @param celular objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($celular){
      $id=$celular->getId();
$numero=$celular->getNumero();

      try {
          $sql= "INSERT INTO `celular`( `id`, `numero`)"
          ."VALUES ('$id','$numero')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Celular en la base de datos.
     * @param celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($celular){
      $id=$celular->getId();

      try {
          $sql= "SELECT `id`, `numero`"
          ."FROM `celular`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $celular->setId($data[$i]['id']);
          $celular->setNumero($data[$i]['numero']);

          }
      return $celular;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Celular en la base de datos.
     * @param celular objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($celular){
      $id=$celular->getId();
$numero=$celular->getNumero();

      try {
          $sql= "UPDATE `celular` SET`id`='$id' ,`numero`='$numero' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Celular en la base de datos.
     * @param celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($celular){
      $id=$celular->getId();

      try {
          $sql ="DELETE FROM `celular` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Celular en la base de datos.
     * @return ArrayList<Celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `numero`"
          ."FROM `celular`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $celular= new Celular();
          $celular->setId($data[$i]['id']);
          $celular->setNumero($data[$i]['numero']);

          array_push($lista,$celular);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
   public function listXID($id){
      $lista = array();
      try {
          $sql ="SELECT `numero` FROM `celular` INNER JOIN `persona_has_celular` on `celular`.`id` = `persona_has_celular`.`celular_id` where `persona_has_celular`.`persona_id` = '$id';";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $celular= new Celular();
         // $celular->setId($data[$i]['id']);
          $celular->setNumero($data[$i]['numero']);

          array_push($lista,$celular);
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