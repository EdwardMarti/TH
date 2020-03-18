<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\

include_once realpath('../../dao/interfaz/ICiudadDao.php');
include_once realpath('../../dto/Ciudad.php');
include_once realpath('../../dto/Departamento.php');

class CiudadDao implements ICiudadDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Ciudad en la base de datos.
     * @param ciudad objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($ciudad){
      $idciudad=$ciudad->getIdciudad();
$ciudad_descripcion=$ciudad->getCiudad_descripcion();
$departamento_iddepartamento=$ciudad->getDepartamento_iddepartamento()->getIddepartamento();

      try {
          $sql= "INSERT INTO `ciudad`( `idciudad`, `ciudad_descripcion`, `departamento_iddepartamento`)"
          ."VALUES ('$idciudad','$ciudad_descripcion','$departamento_iddepartamento')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($ciudad){
      $idciudad=$ciudad->getIdciudad();

      try {
          $sql= "SELECT `idciudad`, `ciudad_descripcion`, `departamento_iddepartamento`"
          ."FROM `ciudad`"
          ."WHERE `idciudad`='$idciudad'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $ciudad->setIdciudad($data[$i]['idciudad']);
          $ciudad->setCiudad_descripcion($data[$i]['ciudad_descripcion']);
           $departamento = new Departamento();
           $departamento->setIddepartamento($data[$i]['departamento_iddepartamento']);
           $ciudad->setDepartamento_iddepartamento($departamento);

          }
      return $ciudad;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($ciudad){
      $idciudad=$ciudad->getIdciudad();
$ciudad_descripcion=$ciudad->getCiudad_descripcion();
$departamento_iddepartamento=$ciudad->getDepartamento_iddepartamento()->getIddepartamento();

      try {
          $sql= "UPDATE `ciudad` SET`idciudad`='$idciudad' ,`ciudad_descripcion`='$ciudad_descripcion' ,`departamento_iddepartamento`='$departamento_iddepartamento' WHERE `idciudad`='$idciudad' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($ciudad){
      $idciudad=$ciudad->getIdciudad();

      try {
          $sql ="DELETE FROM `ciudad` WHERE `idciudad`='$idciudad'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Ciudad en la base de datos.
     * @return ArrayList<Ciudad> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idciudad`, `ciudad_descripcion`, `departamento_iddepartamento`"
          ."FROM `ciudad`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $ciudad= new Ciudad();
          $ciudad->setIdciudad($data[$i]['idciudad']);
          $ciudad->setCiudad_descripcion($data[$i]['ciudad_descripcion']);
           $departamento = new Departamento();
           $departamento->setIddepartamento($data[$i]['departamento_iddepartamento']);
           $ciudad->setDepartamento_iddepartamento($departamento);

          array_push($lista,$ciudad);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listXDepartamento($depa){
      $lista = array();
      try {
          $sql ="SELECT `idciudad`, `ciudad_descripcion`, `departamento_iddepartamento`"
          ."FROM `ciudad`"
          ."WHERE `departamento_iddepartamento` = $depa";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $ciudad= new Ciudad();
          $ciudad->setIdciudad($data[$i]['idciudad']);
          $ciudad->setCiudad_descripcion($data[$i]['ciudad_descripcion']);
           $departamento = new Departamento();
           $departamento->setIddepartamento($data[$i]['departamento_iddepartamento']);
           $ciudad->setDepartamento_iddepartamento($departamento);

          array_push($lista,$ciudad);
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