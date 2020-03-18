<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\

include_once realpath('../../dao/interfaz/IBarrioDao.php');
include_once realpath('../../dto/Barrio.php');
include_once realpath('../../dto/Ciudad.php');

class BarrioDao implements IBarrioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Barrio en la base de datos.
     * @param barrio objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($barrio){
      $idbarrio=$barrio->getIdbarrio();
$barrioco_nombre=$barrio->getBarrioco_nombre();
$ciudad_idciudad=$barrio->getCiudad_idciudad()->getIdciudad();

      try {
          $sql= "INSERT INTO `barrio`( `idbarrio`, `barrioco_nombre`, `ciudad_idciudad`)"
          ."VALUES ('$idbarrio','$barrioco_nombre','$ciudad_idciudad')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Barrio en la base de datos.
     * @param barrio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($barrio){
      $idbarrio=$barrio->getIdbarrio();

      try {
          $sql= "SELECT `idbarrio`, `barrioco_nombre`, `ciudad_idciudad`"
          ."FROM `barrio`"
          ."WHERE `idbarrio`='$idbarrio'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $barrio->setIdbarrio($data[$i]['idbarrio']);
          $barrio->setBarrioco_nombre($data[$i]['barrioco_nombre']);
           $ciudad = new Ciudad();
           $ciudad->setIdciudad($data[$i]['ciudad_idciudad']);
           $barrio->setCiudad_idciudad($ciudad);

          }
      return $barrio;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Barrio en la base de datos.
     * @param barrio objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($barrio){
      $idbarrio=$barrio->getIdbarrio();
$barrioco_nombre=$barrio->getBarrioco_nombre();
$ciudad_idciudad=$barrio->getCiudad_idciudad()->getIdciudad();

      try {
          $sql= "UPDATE `barrio` SET`idbarrio`='$idbarrio' ,`barrioco_nombre`='$barrioco_nombre' ,`ciudad_idciudad`='$ciudad_idciudad' WHERE `idbarrio`='$idbarrio' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Barrio en la base de datos.
     * @param barrio objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($barrio){
      $idbarrio=$barrio->getIdbarrio();

      try {
          $sql ="DELETE FROM `barrio` WHERE `idbarrio`='$idbarrio'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Barrio en la base de datos.
     * @return ArrayList<Barrio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idbarrio`, `barrioco_nombre`, `ciudad_idciudad`"
          ."FROM `barrio`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $barrio= new Barrio();
          $barrio->setIdbarrio($data[$i]['idbarrio']);
          $barrio->setBarrioco_nombre($data[$i]['barrioco_nombre']);
           $ciudad = new Ciudad();
           $ciudad->setIdciudad($data[$i]['ciudad_idciudad']);
           $barrio->setCiudad_idciudad($ciudad);

          array_push($lista,$barrio);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

   public function listXCiudad($ciudad){
      $lista = array();
      try {
          $sql ="SELECT `idbarrio`, `barrioco_nombre`, `ciudad_idciudad`"
          ."FROM `barrio`"
          ."WHERE ciudad_idciudad = '$ciudad'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $barrio= new Barrio();
          $barrio->setIdbarrio($data[$i]['idbarrio']);
          $barrio->setBarrioco_nombre($data[$i]['barrioco_nombre']);
           $ciudad = new Ciudad();
           $ciudad->setIdciudad($data[$i]['ciudad_idciudad']);
           $barrio->setCiudad_idciudad($ciudad);

          array_push($lista,$barrio);
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