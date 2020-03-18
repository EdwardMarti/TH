<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\

include_once realpath('../../dao/interfaz/IDepartamentoDao.php');
include_once realpath('../../dto/Departamento.php');
include_once realpath('../../dto/Pais.php');

class DepartamentoDao implements IDepartamentoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Departamento en la base de datos.
     * @param departamento objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($departamento){
      $iddepartamento=$departamento->getIddepartamento();
$departamento_descripcion=$departamento->getDepartamento_descripcion();
$pais_idpais=$departamento->getPais_idpais()->getIdpais();

      try {
          $sql= "INSERT INTO `departamento`( `iddepartamento`, `departamento_descripcion`, `pais_idpais`)"
          ."VALUES ('$iddepartamento','$departamento_descripcion','$pais_idpais')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($departamento){
      $iddepartamento=$departamento->getIddepartamento();

      try {
          $sql= "SELECT `iddepartamento`, `departamento_descripcion`, `pais_idpais`"
          ."FROM `departamento`"
          ."WHERE `iddepartamento`='$iddepartamento'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $departamento->setIddepartamento($data[$i]['iddepartamento']);
          $departamento->setDepartamento_descripcion($data[$i]['departamento_descripcion']);
           $pais = new Pais();
           $pais->setIdpais($data[$i]['pais_idpais']);
           $departamento->setPais_idpais($pais);

          }
      return $departamento;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Departamento en la base de datos.
     * @param departamento objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($departamento){
      $iddepartamento=$departamento->getIddepartamento();
$departamento_descripcion=$departamento->getDepartamento_descripcion();
$pais_idpais=$departamento->getPais_idpais()->getIdpais();

      try {
          $sql= "UPDATE `departamento` SET`iddepartamento`='$iddepartamento' ,`departamento_descripcion`='$departamento_descripcion' ,`pais_idpais`='$pais_idpais' WHERE `iddepartamento`='$iddepartamento' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($departamento){
      $iddepartamento=$departamento->getIddepartamento();

      try {
          $sql ="DELETE FROM `departamento` WHERE `iddepartamento`='$iddepartamento'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Departamento en la base de datos.
     * @return ArrayList<Departamento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `iddepartamento`, `departamento_descripcion`, `pais_idpais`"
          ."FROM `departamento`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $departamento= new Departamento();
          $departamento->setIddepartamento($data[$i]['iddepartamento']);
          $departamento->setDepartamento_descripcion($data[$i]['departamento_descripcion']);
           $pais = new Pais();
           $pais->setIdpais($data[$i]['pais_idpais']);
           $departamento->setPais_idpais($pais);

          array_push($lista,$departamento);
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