<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

include_once realpath('../../dao/interfaz/ICargo_empresoDao.php');
include_once realpath('../../dto/Cargo_empreso.php');
include_once realpath('../../dto/Area_empresa.php');

class Cargo_empresoDao implements ICargo_empresoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cargo_empreso){
  
$nom_cargo= $cargo_empreso->getNom_cargo();
$area_empresa_idarea_emp=$cargo_empreso->getArea_empresa_idarea_emp()->getIdarea_emp();

      try {
          $sql= "INSERT INTO `cargo_empreso`(`nom_cargo`, `area_empresa_idarea_emp`)"
          ."VALUES ('$nom_cargo','$area_empresa_idarea_emp')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }


    /**
     * Busca un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cargo_empreso){
      $idcargo=$cargo_empreso->getIdcargo();

      try {
          $sql= "SELECT `idcargo`, `nom_cargo`, `area_empresa_idarea_emp`"
          ."FROM `cargo_empreso`"
          ."WHERE `idcargo`='$idcargo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cargo_empreso->setIdcargo($data[$i]['idcargo']);
          $cargo_empreso->setNom_cargo($data[$i]['nom_cargo']);
           $area_empresa = new Area_empresa();
           $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $cargo_empreso->setArea_empresa_idarea_emp($area_empresa);

          }
      return $cargo_empreso;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cargo_empreso){
      $idcargo=$cargo_empreso->getIdcargo();
$nom_cargo=$cargo_empreso->getNom_cargo();
//$area_empresa_idarea_emp=$cargo_empreso->getArea_empresa_idarea_emp()->getIdarea_emp();
   
      try {
          $sql= "UPDATE `cargo_empreso` SET `nom_cargo`='$nom_cargo'  WHERE `idcargo`='$idcargo' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cargo_empreso){
      $idcargo=$cargo_empreso->getIdcargo();

      try {
          $sql ="DELETE FROM `cargo_empreso` WHERE `idcargo`='$idcargo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cargo_empreso en la base de datos.
     * @return ArrayList<Cargo_empreso> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idcargo`, `nom_cargo`, `area_empresa_idarea_emp`"
          ."FROM `cargo_empreso`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cargo_empreso= new Cargo_empreso();
          $cargo_empreso->setIdcargo($data[$i]['idcargo']);
          $cargo_empreso->setNom_cargo($data[$i]['nom_cargo']);
           $area_empresa = new Area_empresa();
           $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $cargo_empreso->setArea_empresa_idarea_emp($area_empresa);

          array_push($lista,$cargo_empreso);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
   public function listCargoXArea($area){
      $lista = array();
      try {
          $sql ="SELECT `idcargo`, `nom_cargo`, `area_empresa_idarea_emp`,ae.`nom_area`
          FROM `cargo_empreso`
          INNER JOIN `area_empresa`  ae
          ON (ae.`idarea_emp`=`cargo_empreso`.`area_empresa_idarea_emp`)"
          ."WHERE area_empresa_idarea_emp = '$area'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cargo_empreso= new Cargo_empreso();
          $cargo_empreso->setIdcargo($data[$i]['idcargo']);
          $cargo_empreso->setNom_cargo($data[$i]['nom_cargo']);
           $area_empresa = new Area_empresa();
           $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $area_empresa->setNom_area($data[$i]['nom_area']);
           $cargo_empreso->setArea_empresa_idarea_emp($area_empresa);

          array_push($lista,$cargo_empreso);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
   public function listCargoXAreaXEmpresa($area){
      $lista = array();
      try {
          $sql ="SELECT c.nom_cargo, a.nom_area, e.nombre_empresa FROM cargo_empreso c
INNER join area_empresa a
ON c.area_empresa_idarea_emp=a.idarea_emp
INNER JOIN empresa e 
on e.idempresa=a.empresa_idempresa
WHERE e.idempresa='$area'
GROUP by  c.nom_cargo";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cargo_empreso= new Cargo_empreso();
          $cargo_empreso->setIdcargo($data[$i]['idcargo']);
          $cargo_empreso->setNom_cargo($data[$i]['nom_cargo']);
          $cargo_empreso->setNom_cargo_1($data[$i]['nom_cargo']);
          $cargo_empreso->setNom_cargo_2($data[$i]['nom_cargo']);
           $area_empresa = new Area_empresa();
          $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $area_empresa->setNom_area($data[$i]['nombre_empresa']);
           $empresa = new Empresa();
           $cargo_empreso->setArea_empresa_idarea_emp($area_empresa);

          array_push($lista,$cargo_empreso);
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
      public function updateConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $rta=$sentencia->rowCount();
          $sentencia = null;
          return $rta;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!