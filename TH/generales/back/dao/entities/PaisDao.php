<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\

include_once realpath('../../dao/interfaz/IPaisDao.php');
include_once realpath('../../dto/Pais.php');

class PaisDao implements IPaisDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Pais en la base de datos.
     * @param pais objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pais){
      $idpais=$pais->getIdpais();
$pais_descripcion=$pais->getPais_descripcion();

      try {
          $sql= "INSERT INTO `pais`( `idpais`, `pais_descripcion`)"
          ."VALUES ('$idpais','$pais_descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pais en la base de datos.
     * @param pais objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pais){
      $idpais=$pais->getIdpais();

      try {
          $sql= "SELECT `idpais`, `pais_descripcion`"
          ."FROM `pais`"
          ."WHERE `idpais`='$idpais'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $pais->setIdpais($data[$i]['idpais']);
          $pais->setPais_descripcion($data[$i]['pais_descripcion']);

          }
      return $pais;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Pais en la base de datos.
     * @param pais objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pais){
      $idpais=$pais->getIdpais();
$pais_descripcion=$pais->getPais_descripcion();

      try {
          $sql= "UPDATE `pais` SET`idpais`='$idpais' ,`pais_descripcion`='$pais_descripcion' WHERE `idpais`='$idpais' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Pais en la base de datos.
     * @param pais objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pais){
      $idpais=$pais->getIdpais();

      try {
          $sql ="DELETE FROM `pais` WHERE `idpais`='$idpais'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pais en la base de datos.
     * @return ArrayList<Pais> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idpais`, `pais_descripcion`"
          ."FROM `pais`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $pais= new Pais();
          $pais->setIdpais($data[$i]['idpais']);
          $pais->setPais_descripcion($data[$i]['pais_descripcion']);

          array_push($lista,$pais);
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