<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora tú puedes ser el tipo con el látigo  \\

include_once realpath('../../dao/interfaz/IEmpresa_pDao.php');
include_once realpath('../../dto/Empresa_p.php');

class Empresa_pDao implements IEmpresa_pDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($empresa_p){
  
$empresa_p_nombre=$empresa_p->getEmpresa_p_nombre();
$nit_empresa_p=$empresa_p->getNit_empresa_p();
$empresa_p_direccion=$empresa_p->getEmpresa_p_direccion();
$empresa_p_tel=$empresa_p->getEmpresa_p_tel();

      try {
          $sql= "INSERT INTO `empresa_p`( `Empresa_p_nombre`, `nit_empresa_p`, `Empresa_p_direccion`, `Empresa_p_tel`)"
          ."VALUES ('$empresa_p_nombre','$nit_empresa_p','$empresa_p_direccion','$empresa_p_tel')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($empresa_p){
      $idEmpresa_p=$empresa_p->getIdEmpresa_p();

      try {
          $sql= "SELECT `idEmpresa_p`, `Empresa_p_nombre`, `nit_empresa_p`, `Empresa_p_direccion`, `Empresa_p_tel`"
          ."FROM `empresa_p`"
          ."WHERE `idEmpresa_p`='$idEmpresa_p'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $empresa_p->setIdEmpresa_p($data[$i]['idEmpresa_p']);
          $empresa_p->setEmpresa_p_nombre($data[$i]['Empresa_p_nombre']);
          $empresa_p->setNit_empresa_p($data[$i]['nit_empresa_p']);
          $empresa_p->setEmpresa_p_direccion($data[$i]['Empresa_p_direccion']);
          $empresa_p->setEmpresa_p_tel($data[$i]['Empresa_p_tel']);

          }
      return $empresa_p;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($empresa_p){
$idEmpresa_p=$empresa_p->getIdEmpresa_p();
$empresa_p_nombre=$empresa_p->getEmpresa_p_nombre();
$nit_empresa_p=$empresa_p->getNit_empresa_p();
$empresa_p_direccion=$empresa_p->getEmpresa_p_direccion();
$empresa_p_tel=$empresa_p->getEmpresa_p_tel();

      try {
          $sql= "UPDATE `empresa_p` SET `Empresa_p_nombre`='$empresa_p_nombre' ,`nit_empresa_p`='$nit_empresa_p' ,`Empresa_p_direccion`='$empresa_p_direccion' ,`Empresa_p_tel`='$empresa_p_tel' WHERE `idEmpresa_p`='$idEmpresa_p' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($empresa_p){
      $idEmpresa_p=$empresa_p->getIdEmpresa_p();

      try {
          $sql ="DELETE FROM `empresa_p` WHERE `idEmpresa_p`='$idEmpresa_p'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Empresa_p en la base de datos.
     * @return ArrayList<Empresa_p> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idEmpresa_p`, `Empresa_p_nombre`, `nit_empresa_p`, `Empresa_p_direccion`, `Empresa_p_tel`"
          ."FROM `empresa_p`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $empresa_p= new Empresa_p();
          $empresa_p->setIdEmpresa_p($data[$i]['idEmpresa_p']);
          $empresa_p->setEmpresa_p_nombre($data[$i]['Empresa_p_nombre']);
          $empresa_p->setNit_empresa_p($data[$i]['nit_empresa_p']);
          $empresa_p->setEmpresa_p_direccion($data[$i]['Empresa_p_direccion']);
          $empresa_p->setEmpresa_p_tel($data[$i]['Empresa_p_tel']);

          array_push($lista,$empresa_p);
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