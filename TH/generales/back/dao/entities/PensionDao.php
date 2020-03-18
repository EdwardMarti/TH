<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\

include_once realpath('../../dao/interfaz/IPensionDao.php');
include_once realpath('../../dto/Pension.php');

class PensionDao implements IPensionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Pension en la base de datos.
     * @param pension objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pension){
      $idpension=$pension->getIdpension();
$pension_nombre=$pension->getPension_nombre();

      try {
          $sql= "INSERT INTO `pension`( `idpension`, `pension_nombre`)"
          ."VALUES ('$idpension','$pension_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pension en la base de datos.
     * @param pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pension){
      $idpension=$pension->getIdpension();

      try {
          $sql= "SELECT `idpension`, `pension_nombre`"
          ."FROM `pension`"
          ."WHERE `idpension`='$idpension'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $pension->setIdpension($data[$i]['idpension']);
          $pension->setPension_nombre($data[$i]['pension_nombre']);

          }
      return $pension;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Pension en la base de datos.
     * @param pension objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pension){
      $idpension=$pension->getIdpension();
$pension_nombre=$pension->getPension_nombre();

      try {
          $sql= "UPDATE `pension` SET`idpension`='$idpension' ,`pension_nombre`='$pension_nombre' WHERE `idpension`='$idpension' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Pension en la base de datos.
     * @param pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pension){
      $idpension=$pension->getIdpension();

      try {
          $sql ="DELETE FROM `pension` WHERE `idpension`='$idpension'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pension en la base de datos.
     * @return ArrayList<Pension> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idpension`, `pension_nombre`"
          ."FROM `pension`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $pension= new Pension();
          $pension->setIdpension($data[$i]['idpension']);
          $pension->setPension_nombre($data[$i]['pension_nombre']);

          array_push($lista,$pension);
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