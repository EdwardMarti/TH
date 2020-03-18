<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Soy la sonrisa burlona y vengativa de Jack  \\

include_once realpath('../../dao/interfaz/IBancoDao.php');
include_once realpath('../../dto/Banco.php');

class BancoDao implements IBancoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Banco en la base de datos.
     * @param banco objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($banco){
      $idbanco=$banco->getIdbanco();
$banco_descripcion=$banco->getBanco_descripcion();

      try {
          $sql= "INSERT INTO `banco`( `idbanco`, `banco_descripcion`)"
          ."VALUES ('$idbanco','$banco_descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Banco en la base de datos.
     * @param banco objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($banco){
      $idbanco=$banco->getIdbanco();

      try {
          $sql= "SELECT `idbanco`, `banco_descripcion`"
          ."FROM `banco`"
          ."WHERE `idbanco`='$idbanco'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $banco->setIdbanco($data[$i]['idbanco']);
          $banco->setBanco_descripcion($data[$i]['banco_descripcion']);

          }
      return $banco;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Banco en la base de datos.
     * @param banco objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($banco){
      $idbanco=$banco->getIdbanco();
$banco_descripcion=$banco->getBanco_descripcion();

      try {
          $sql= "UPDATE `banco` SET`idbanco`='$idbanco' ,`banco_descripcion`='$banco_descripcion' WHERE `idbanco`='$idbanco' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Banco en la base de datos.
     * @param banco objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($banco){
      $idbanco=$banco->getIdbanco();

      try {
          $sql ="DELETE FROM `banco` WHERE `idbanco`='$idbanco'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Banco en la base de datos.
     * @return ArrayList<Banco> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idbanco`, `banco_descripcion`"
          ."FROM `banco`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $banco= new Banco();
          $banco->setIdbanco($data[$i]['idbanco']);
          $banco->setBanco_descripcion($data[$i]['banco_descripcion']);

          array_push($lista,$banco);
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