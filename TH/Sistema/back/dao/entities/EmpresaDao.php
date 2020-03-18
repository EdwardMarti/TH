<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\

include_once realpath('../../dao/interfaz/IEmpresaDao.php');
include_once realpath('../../dto/Empresa.php');

class EmpresaDao implements IEmpresaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Empresa en la base de datos.
     * @param empresa objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($empresa){
//      $idempresa=$empresa->getIdempresa();
$nombre_empresa=$empresa->getNombre_empresa();
$nit_empresa=$empresa->getNit_empresa();
$direccion_empresa=$empresa->getDireccion_empresa();
$empresa_p_idEmpresa_p=$empresa->getEmpresa_p_idEmpresa_p(); 
      try {
          $sql= "INSERT INTO `empresa`( `nombre_empresa`, `nit_empresa`, `direccion_empresa`,`Empresa_p_idEmpresa_p`)"
          ."VALUES ('$nombre_empresa','$nit_empresa','$direccion_empresa','$empresa_p_idEmpresa_p')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Empresa en la base de datos.
     * @param empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($empresa){
      $idempresa=$empresa->getIdempresa();

      try {
          $sql= "SELECT `idempresa`, `nombre_empresa`, `nit_empresa`, `direccion_empresa`"
          ."FROM `empresa`"
          ."WHERE `idempresa`='$idempresa'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $empresa->setIdempresa($data[$i]['idempresa']);
          $empresa->setNombre_empresa($data[$i]['nombre_empresa']);
          $empresa->setNit_empresa($data[$i]['nit_empresa']);
          $empresa->setDireccion_empresa($data[$i]['direccion_empresa']);

          }
      return $empresa;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Empresa en la base de datos.
     * @param empresa objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($empresa){
      $idempresa=$empresa->getIdempresa();
$nombre_empresa=$empresa->getNombre_empresa();
$nit_empresa=$empresa->getNit_empresa();
$direccion_empresa=$empresa->getDireccion_empresa();

      try {
          $sql= "UPDATE `empresa` SET `nombre_empresa`='$nombre_empresa' ,`nit_empresa`='$nit_empresa' ,`direccion_empresa`='$direccion_empresa' WHERE `idempresa`='$idempresa' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Empresa en la base de datos.
     * @param empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($empresa){
      $idempresa=$empresa->getIdempresa();

      try {
          $sql ="DELETE FROM `empresa` WHERE `idempresa`='$idempresa'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Empresa en la base de datos.
     * @return ArrayList<Empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idempresa`, `nombre_empresa`, `nit_empresa`, `direccion_empresa`"
          ."FROM `empresa`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $empresa= new Empresa();
          $empresa->setIdempresa($data[$i]['idempresa']);
          $empresa->setNombre_empresa($data[$i]['nombre_empresa']);
          $empresa->setNit_empresa($data[$i]['nit_empresa']);
          $empresa->setDireccion_empresa($data[$i]['direccion_empresa']);

          array_push($lista,$empresa);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
   public function listAll_sucursal($emp){
   
       
      $lista = array();
      try {
          $sql ="SELECT `idempresa`, `nombre_empresa`, `nit_empresa`, `direccion_empresa`"
          ."FROM `empresa`"
          ."WHERE `Empresa_p_idEmpresa_p`=$emp ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $empresa= new Empresa();
          $empresa->setIdempresa($data[$i]['idempresa']);
          $empresa->setNombre_empresa($data[$i]['nombre_empresa']);
          $empresa->setNit_empresa($data[$i]['nit_empresa']);
          $empresa->setDireccion_empresa($data[$i]['direccion_empresa']);

          array_push($lista,$empresa);
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