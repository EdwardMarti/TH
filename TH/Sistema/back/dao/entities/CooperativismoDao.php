<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\

include_once realpath('../../dao/interfaz/ICooperativismoDao.php');
include_once realpath('../../dto/Cooperativismo.php');
include_once realpath('../../dto/Persona.php');

class CooperativismoDao implements ICooperativismoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cooperativismo en la base de datos.
     * @param cooperativismo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cooperativismo){
      $idcooperativismo=$cooperativismo->getIdcooperativismo();
$coop_nombre=$cooperativismo->getCoop_nombre();
$coop_fecha=$cooperativismo->getCoop_fecha();
$coop_nit=$cooperativismo->getCoop_nit();
$persona_id=$cooperativismo->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `cooperativismo`( `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`)"
          ."VALUES ('$idcooperativismo','$coop_nombre','$coop_fecha','$coop_nit','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cooperativismo en la base de datos.
     * @param cooperativismo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cooperativismo){
      $idcooperativismo=$cooperativismo->getIdcooperativismo();

      try {
          $sql= "SELECT `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`"
          ."FROM `cooperativismo`"
          ."WHERE `idcooperativismo`='$idcooperativismo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cooperativismo->setIdcooperativismo($data[$i]['idcooperativismo']);
          $cooperativismo->setCoop_nombre($data[$i]['coop_nombre']);
          $cooperativismo->setCoop_fecha($data[$i]['coop_fecha']);
          $cooperativismo->setCoop_nit($data[$i]['coop_nit']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $cooperativismo->setPersona_id($persona);

          }
      return $cooperativismo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cooperativismo en la base de datos.
     * @param cooperativismo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cooperativismo){
      $idcooperativismo=$cooperativismo->getIdcooperativismo();
$coop_nombre=$cooperativismo->getCoop_nombre();
$coop_fecha=$cooperativismo->getCoop_fecha();
$coop_nit=$cooperativismo->getCoop_nit();
$persona_id=$cooperativismo->getPersona_id()->getId();

      try {
          $sql= "UPDATE `cooperativismo` SET`idcooperativismo`='$idcooperativismo' ,`coop_nombre`='$coop_nombre' ,`coop_fecha`='$coop_fecha' ,`coop_nit`='$coop_nit' ,`persona_id`='$persona_id' WHERE `idcooperativismo`='$idcooperativismo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cooperativismo en la base de datos.
     * @param cooperativismo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cooperativismo){
      $idcooperativismo=$cooperativismo->getIdcooperativismo();

      try {
          $sql ="DELETE FROM `cooperativismo` WHERE `idcooperativismo`='$idcooperativismo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cooperativismo en la base de datos.
     * @return ArrayList<Cooperativismo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`"
          ."FROM `cooperativismo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cooperativismo= new Cooperativismo();
          $cooperativismo->setIdcooperativismo($data[$i]['idcooperativismo']);
          $cooperativismo->setCoop_nombre($data[$i]['coop_nombre']);
          $cooperativismo->setCoop_fecha($data[$i]['coop_fecha']);
          $cooperativismo->setCoop_nit($data[$i]['coop_nit']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $cooperativismo->setPersona_id($persona);

          array_push($lista,$cooperativismo);
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