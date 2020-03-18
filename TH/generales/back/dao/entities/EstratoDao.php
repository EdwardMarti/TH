<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bueno ¿y ahora qué?  \\

include_once realpath('../../dao/interfaz/IEstratoDao.php');
include_once realpath('../../dto/Estrato.php');

class EstratoDao implements IEstratoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estrato en la base de datos.
     * @param estrato objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estrato){
      $idestrato=$estrato->getIdestrato();
$estrato_nombre=$estrato->getEstrato_nombre();

      try {
          $sql= "INSERT INTO `estrato`( `idestrato`, `estrato_nombre`)"
          ."VALUES ('$idestrato','$estrato_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estrato en la base de datos.
     * @param estrato objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estrato){
      $idestrato=$estrato->getIdestrato();

      try {
          $sql= "SELECT `idestrato`, `estrato_nombre`"
          ."FROM `estrato`"
          ."WHERE `idestrato`='$idestrato'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estrato->setIdestrato($data[$i]['idestrato']);
          $estrato->setEstrato_nombre($data[$i]['estrato_nombre']);

          }
      return $estrato;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estrato en la base de datos.
     * @param estrato objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estrato){
      $idestrato=$estrato->getIdestrato();
$estrato_nombre=$estrato->getEstrato_nombre();

      try {
          $sql= "UPDATE `estrato` SET`idestrato`='$idestrato' ,`estrato_nombre`='$estrato_nombre' WHERE `idestrato`='$idestrato' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estrato en la base de datos.
     * @param estrato objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estrato){
      $idestrato=$estrato->getIdestrato();

      try {
          $sql ="DELETE FROM `estrato` WHERE `idestrato`='$idestrato'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estrato en la base de datos.
     * @return ArrayList<Estrato> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idestrato`, `estrato_nombre`"
          ."FROM `estrato`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estrato= new Estrato();
          $estrato->setIdestrato($data[$i]['idestrato']);
          $estrato->setEstrato_nombre($data[$i]['estrato_nombre']);

          array_push($lista,$estrato);
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