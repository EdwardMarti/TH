<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\

include_once realpath('../../dao/interfaz/IGrupo_sanguineoDao.php');
include_once realpath('../../dto/Grupo_sanguineo.php');

class Grupo_sanguineoDao implements IGrupo_sanguineoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_sanguineo){
      $idgrupo_sanguineo=$grupo_sanguineo->getIdgrupo_sanguineo();
$grupo_sanguineo_nombre=$grupo_sanguineo->getGrupo_sanguineo_nombre();

      try {
          $sql= "INSERT INTO `grupo_sanguineo`( `idgrupo_sanguineo`, `grupo_sanguineo_nombre`)"
          ."VALUES ('$idgrupo_sanguineo','$grupo_sanguineo_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_sanguineo){
      $idgrupo_sanguineo=$grupo_sanguineo->getIdgrupo_sanguineo();

      try {
          $sql= "SELECT `idgrupo_sanguineo`, `grupo_sanguineo_nombre`"
          ."FROM `grupo_sanguineo`"
          ."WHERE `idgrupo_sanguineo`='$idgrupo_sanguineo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_sanguineo->setIdgrupo_sanguineo($data[$i]['idgrupo_sanguineo']);
          $grupo_sanguineo->setGrupo_sanguineo_nombre($data[$i]['grupo_sanguineo_nombre']);

          }
      return $grupo_sanguineo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_sanguineo){
      $idgrupo_sanguineo=$grupo_sanguineo->getIdgrupo_sanguineo();
$grupo_sanguineo_nombre=$grupo_sanguineo->getGrupo_sanguineo_nombre();

      try {
          $sql= "UPDATE `grupo_sanguineo` SET`idgrupo_sanguineo`='$idgrupo_sanguineo' ,`grupo_sanguineo_nombre`='$grupo_sanguineo_nombre' WHERE `idgrupo_sanguineo`='$idgrupo_sanguineo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_sanguineo){
      $idgrupo_sanguineo=$grupo_sanguineo->getIdgrupo_sanguineo();

      try {
          $sql ="DELETE FROM `grupo_sanguineo` WHERE `idgrupo_sanguineo`='$idgrupo_sanguineo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_sanguineo en la base de datos.
     * @return ArrayList<Grupo_sanguineo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idgrupo_sanguineo`, `grupo_sanguineo_nombre`"
          ."FROM `grupo_sanguineo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_sanguineo= new Grupo_sanguineo();
          $grupo_sanguineo->setIdgrupo_sanguineo($data[$i]['idgrupo_sanguineo']);
          $grupo_sanguineo->setGrupo_sanguineo_nombre($data[$i]['grupo_sanguineo_nombre']);

          array_push($lista,$grupo_sanguineo);
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