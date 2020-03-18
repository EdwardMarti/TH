<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\

include_once realpath('../../dao/interfaz/IEpsDao.php');
include_once realpath('../../dto/Eps.php');

class EpsDao implements IEpsDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Eps en la base de datos.
     * @param eps objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($eps){
      $ideps=$eps->getIdeps();
$eps_nombre=$eps->getEps_nombre();

      try {
          $sql= "INSERT INTO `eps`( `ideps`, `eps_nombre`)"
          ."VALUES ('$ideps','$eps_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Eps en la base de datos.
     * @param eps objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($eps){
      $ideps=$eps->getIdeps();

      try {
          $sql= "SELECT `ideps`, `eps_nombre`"
          ."FROM `eps`"
          ."WHERE `ideps`='$ideps'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $eps->setIdeps($data[$i]['ideps']);
          $eps->setEps_nombre($data[$i]['eps_nombre']);

          }
      return $eps;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Eps en la base de datos.
     * @param eps objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($eps){
      $ideps=$eps->getIdeps();
$eps_nombre=$eps->getEps_nombre();

      try {
          $sql= "UPDATE `eps` SET`ideps`='$ideps' ,`eps_nombre`='$eps_nombre' WHERE `ideps`='$ideps' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Eps en la base de datos.
     * @param eps objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($eps){
      $ideps=$eps->getIdeps();

      try {
          $sql ="DELETE FROM `eps` WHERE `ideps`='$ideps'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Eps en la base de datos.
     * @return ArrayList<Eps> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `ideps`, `eps_nombre`"
          ."FROM `eps`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $eps= new Eps();
          $eps->setIdeps($data[$i]['ideps']);
          $eps->setEps_nombre($data[$i]['eps_nombre']);

          array_push($lista,$eps);
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