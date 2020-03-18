<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\

include_once realpath('../../dao/interfaz/IRollDao.php');
include_once realpath('../../dto/Roll.php');

class RollDao implements IRollDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Roll en la base de datos.
     * @param roll objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($roll){
      $idroll=$roll->getIdroll();
$roll_nombre=$roll->getRoll_nombre();

      try {
          $sql= "INSERT INTO `roll`( `idroll`, `roll_nombre`)"
          ."VALUES ('$idroll','$roll_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Roll en la base de datos.
     * @param roll objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($roll){
      $idroll=$roll->getIdroll();

      try {
          $sql= "SELECT `idroll`, `roll_nombre`"
          ."FROM `roll`"
          ."WHERE `idroll`='$idroll'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $roll->setIdroll($data[$i]['idroll']);
          $roll->setRoll_nombre($data[$i]['roll_nombre']);

          }
      return $roll;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Roll en la base de datos.
     * @param roll objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($roll){
      $idroll=$roll->getIdroll();
$roll_nombre=$roll->getRoll_nombre();

      try {
          $sql= "UPDATE `roll` SET`idroll`='$idroll' ,`roll_nombre`='$roll_nombre' WHERE `idroll`='$idroll' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Roll en la base de datos.
     * @param roll objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($roll){
      $idroll=$roll->getIdroll();

      try {
          $sql ="DELETE FROM `roll` WHERE `idroll`='$idroll'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Roll en la base de datos.
     * @return ArrayList<Roll> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idroll`, `roll_nombre`"
          ."FROM `roll`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $roll= new Roll();
          $roll->setIdroll($data[$i]['idroll']);
          $roll->setRoll_nombre($data[$i]['roll_nombre']);

          array_push($lista,$roll);
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