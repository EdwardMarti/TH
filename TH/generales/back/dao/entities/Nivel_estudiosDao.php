<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\

include_once realpath('../../dao/interfaz/INivel_estudiosDao.php');
include_once realpath('../../dto/Nivel_estudios.php');

class Nivel_estudiosDao implements INivel_estudiosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Nivel_estudios en la base de datos.
     * @param nivel_estudios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($nivel_estudios){
      $idnivel_estudios=$nivel_estudios->getIdnivel_estudios();
$nivel_estudios_nombre=$nivel_estudios->getNivel_estudios_nombre();

      try {
          $sql= "INSERT INTO `nivel_estudios`( `idnivel_estudios`, `nivel_estudios_nombre`)"
          ."VALUES ('$idnivel_estudios','$nivel_estudios_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Nivel_estudios en la base de datos.
     * @param nivel_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($nivel_estudios){
      $idnivel_estudios=$nivel_estudios->getIdnivel_estudios();

      try {
          $sql= "SELECT `idnivel_estudios`, `nivel_estudios_nombre`"
          ."FROM `nivel_estudios`"
          ."WHERE `idnivel_estudios`='$idnivel_estudios'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $nivel_estudios->setIdnivel_estudios($data[$i]['idnivel_estudios']);
          $nivel_estudios->setNivel_estudios_nombre($data[$i]['nivel_estudios_nombre']);

          }
      return $nivel_estudios;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Nivel_estudios en la base de datos.
     * @param nivel_estudios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($nivel_estudios){
      $idnivel_estudios=$nivel_estudios->getIdnivel_estudios();
$nivel_estudios_nombre=$nivel_estudios->getNivel_estudios_nombre();

      try {
          $sql= "UPDATE `nivel_estudios` SET`idnivel_estudios`='$idnivel_estudios' ,`nivel_estudios_nombre`='$nivel_estudios_nombre' WHERE `idnivel_estudios`='$idnivel_estudios' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Nivel_estudios en la base de datos.
     * @param nivel_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($nivel_estudios){
      $idnivel_estudios=$nivel_estudios->getIdnivel_estudios();

      try {
          $sql ="DELETE FROM `nivel_estudios` WHERE `idnivel_estudios`='$idnivel_estudios'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Nivel_estudios en la base de datos.
     * @return ArrayList<Nivel_estudios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idnivel_estudios`, `nivel_estudios_nombre`"
          ."FROM `nivel_estudios`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $nivel_estudios= new Nivel_estudios();
          $nivel_estudios->setIdnivel_estudios($data[$i]['idnivel_estudios']);
          $nivel_estudios->setNivel_estudios_nombre($data[$i]['nivel_estudios_nombre']);

          array_push($lista,$nivel_estudios);
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