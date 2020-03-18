<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\

include_once realpath('../../dao/interfaz/ICarnet_supervigilanciaDao.php');
include_once realpath('../../dto/Carnet_supervigilancia.php');

class Carnet_supervigilanciaDao implements ICarnet_supervigilanciaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($carnet_supervigilancia){
      $idcarne=$carnet_supervigilancia->getIdcarne();
$carnet_nombre=$carnet_supervigilancia->getCarnet_nombre();

      try {
          $sql= "INSERT INTO `carnet_supervigilancia`( `idcarne`, `carnet_nombre`)"
          ."VALUES ('$idcarne','$carnet_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($carnet_supervigilancia){
      $idcarne=$carnet_supervigilancia->getIdcarne();

      try {
          $sql= "SELECT `idcarne`, `carnet_nombre`"
          ."FROM `carnet_supervigilancia`"
          ."WHERE `idcarne`='$idcarne'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $carnet_supervigilancia->setIdcarne($data[$i]['idcarne']);
          $carnet_supervigilancia->setCarnet_nombre($data[$i]['carnet_nombre']);

          }
      return $carnet_supervigilancia;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($carnet_supervigilancia){
      $idcarne=$carnet_supervigilancia->getIdcarne();
$carnet_nombre=$carnet_supervigilancia->getCarnet_nombre();

      try {
          $sql= "UPDATE `carnet_supervigilancia` SET`idcarne`='$idcarne' ,`carnet_nombre`='$carnet_nombre' WHERE `idcarne`='$idcarne' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($carnet_supervigilancia){
      $idcarne=$carnet_supervigilancia->getIdcarne();

      try {
          $sql ="DELETE FROM `carnet_supervigilancia` WHERE `idcarne`='$idcarne'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Carnet_supervigilancia en la base de datos.
     * @return ArrayList<Carnet_supervigilancia> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idcarne`, `carnet_nombre`"
          ."FROM `carnet_supervigilancia`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $carnet_supervigilancia= new Carnet_supervigilancia();
          $carnet_supervigilancia->setIdcarne($data[$i]['idcarne']);
          $carnet_supervigilancia->setCarnet_nombre($data[$i]['carnet_nombre']);

          array_push($lista,$carnet_supervigilancia);
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