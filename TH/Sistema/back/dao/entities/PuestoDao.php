<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\

include_once realpath('../../dao/interfaz/IPuestoDao.php');
include_once realpath('../../dto/Puesto.php');

class PuestoDao implements IPuestoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Puesto en la base de datos.
     * @param puesto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($puesto){
//      $idpuesto=$puesto->getIdpuesto();
$nombre=$puesto->getNombre();
$empresa_idempresa=$puesto->getEmpresa_idempresa();

      try {
          $sql= "INSERT INTO `puesto`(`nombre`, `empresa_idempresa`)"
          ."VALUES ('$nombre','$empresa_idempresa')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Puesto en la base de datos.
     * @param puesto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($puesto){
      $idpuesto=$puesto->getIdpuesto();

      try {
          $sql= "SELECT `idpuesto`, `nombre`"
          ."FROM `puesto`"
          ."WHERE `idpuesto`='$idpuesto'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $puesto->setIdpuesto($data[$i]['idpuesto']);
          $puesto->setNombre($data[$i]['nombre']);

          }
      return $puesto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Puesto en la base de datos.
     * @param puesto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($puesto){
      $idpuesto=$puesto->getIdpuesto();
$nombre=$puesto->getNombre();

      try {
          $sql= "UPDATE `puesto` SET`idpuesto`='$idpuesto' ,`nombre`='$nombre' WHERE `idpuesto`='$idpuesto' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Puesto en la base de datos.
     * @param puesto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($puesto){
      $idpuesto=$puesto->getIdpuesto();

      try {
          $sql ="DELETE FROM `puesto` WHERE `idpuesto`='$idpuesto'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Puesto en la base de datos.
     * @return ArrayList<Puesto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idpuesto`, `nombre`"
          ."FROM `puesto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $puesto= new Puesto();
          $puesto->setIdpuesto($data[$i]['idpuesto']);
          $puesto->setNombre($data[$i]['nombre']);

          array_push($lista,$puesto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  public function listAllxSucursal($empresa){
      $lista = array();
      try {
          $sql ="SELECT `idpuesto`, `nombre` FROM `puesto` WHERE `empresa_idempresa`=$empresa";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $puesto= new Puesto();
          $puesto->setIdpuesto($data[$i]['idpuesto']);
          $puesto->setNombre($data[$i]['nombre']);

          array_push($lista,$puesto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
   public function listAllxSucursal_nombre($empresa){
       //var_dump($empresa);
    $id=$this->buscar_id_sucursal($empresa);
    

      $lista = array();
      try {
          $sql ="SELECT `idpuesto`, `nombre` FROM `puesto` WHERE `empresa_idempresa`=$id";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $puesto= new Puesto();
          $puesto->setIdpuesto($data[$i]['idpuesto']);
          $puesto->setNombre($data[$i]['nombre']);

          array_push($lista,$puesto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
   public function buscar_id_sucursal($puesto){
      try {
          $sql ="SELECT `idempresa` FROM `empresa` WHERE `nombre_empresa`='$puesto'";     
          $data = $this->ejecutarConsulta($sql);
          if(count($data)>0){
              return $data[0]['idempresa'];
          }
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