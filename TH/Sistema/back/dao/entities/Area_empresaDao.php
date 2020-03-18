<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\

include_once realpath('../../dao/interfaz/IArea_empresaDao.php');
include_once realpath('../../dto/Area_empresa.php');
include_once realpath('../../dto/Empresa.php');

class Area_empresaDao implements IArea_empresaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($area_empresa){
//      $idarea_emp=$area_empresa->getIdarea_emp();
$nom_area=$area_empresa->getNom_area();
$empresa_idempresa=$area_empresa->getEmpresa_idempresa()->getIdempresa();

      try {
          $sql= "INSERT INTO `area_empresa`(  `nom_area`, `empresa_idempresa`)"
          ."VALUES ('$nom_area','$empresa_idempresa')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($area_empresa){
      $idarea_emp=$area_empresa->getIdarea_emp();

      try {
          $sql= "SELECT `idarea_emp`, `nom_area`, `empresa_idempresa`"
          ."FROM `area_empresa`"
          ."WHERE `idarea_emp`='$idarea_emp'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $area_empresa->setIdarea_emp($data[$i]['idarea_emp']);
          $area_empresa->setNom_area($data[$i]['nom_area']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $area_empresa->setEmpresa_idempresa($empresa);

          }
      return $area_empresa;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  


    /**
     * Modifica un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($area_empresa){
      $idarea_emp=$area_empresa->getIdarea_emp();
$nom_area=$area_empresa->getNom_area();
$empresa_idempresa=$area_empresa->getEmpresa_idempresa()->getIdempresa();

      try {
          $sql= "UPDATE `area_empresa` SET`idarea_emp`='$idarea_emp' ,`nom_area`='$nom_area' ,`empresa_idempresa`='$empresa_idempresa' WHERE `idarea_emp`='$idarea_emp' ";
          $rta= $this->insertarConsulta($sql);
       
         return $rta;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  public function update_1($area_empresa){
      $idarea_emp=$area_empresa->getIdarea_emp();
$nom_area=$area_empresa->getNom_area();
//var_dump($idarea_emp,$nom_area);
//$empresa_idempresa=$area_empresa->getEmpresa_idempresa()->getIdempresa();

      try {
          $sql= "UPDATE `area_empresa` SET `nom_area`='$nom_area' WHERE `idarea_emp`='$idarea_emp' ";
        return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($area_empresa){
      $idarea_emp=$area_empresa->getIdarea_emp();

      try {
          $sql ="DELETE FROM `area_empresa` WHERE `idarea_emp`='$idarea_emp'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Area_empresa en la base de datos.
     * @return ArrayList<Area_empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idarea_emp`, `nom_area`, `empresa_idempresa`"
          ."FROM `area_empresa`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $area_empresa= new Area_empresa();
          $area_empresa->setIdarea_emp($data[$i]['idarea_emp']);
          $area_empresa->setNom_area($data[$i]['nom_area']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $area_empresa->setEmpresa_idempresa($empresa);

          array_push($lista,$area_empresa);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
    public function listAreaXEmpresa($empresa){
      $lista = array();
      try {
          $sql ="SELECT `idarea_emp`, `nom_area`, `empresa_idempresa`"
          ."FROM `area_empresa`"
          ."WHERE `empresa_idempresa` = '$empresa'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $area_empresa= new Area_empresa();
          $area_empresa->setIdarea_emp($data[$i]['idarea_emp']);
          $area_empresa->setNom_area($data[$i]['nom_area']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $area_empresa->setEmpresa_idempresa($empresa);

          array_push($lista,$area_empresa);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
    public function listAreaXEmpresa_1($empresa){
      $lista = array();
      try {
          $sql ="SELECT a.`idarea_emp`, a.`nom_area`, e.nombre_empresa, a.`empresa_idempresa`
FROM `area_empresa` a
INNER JOIN empresa e 
ON e.idempresa=a.`empresa_idempresa`"
          ."WHERE `empresa_idempresa` = '$empresa'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $area_empresa= new Area_empresa();
          $area_empresa->setIdarea_emp($data[$i]['idarea_emp']);
          $area_empresa->setNom_area($data[$i]['nom_area']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $empresa->setNombre_empresa($data[$i]['nombre_empresa']);
           $area_empresa->setEmpresa_idempresa($empresa);

          array_push($lista,$area_empresa);
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
       public function updateConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $rta=$sentencia->rowCount();
          $sentencia = null;
          return $rta;
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