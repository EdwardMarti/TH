<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\

include_once realpath('../../dao/interfaz/IEstudioDao.php');
include_once realpath('../../dto/Estudio.php');
include_once realpath('../../dto/Persona.php');

class EstudioDao implements IEstudioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estudio en la base de datos.
     * @param estudio objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estudio){
      $nivel_academico=$estudio->getNivel_academico();
$nivel_vigilancia=$estudio->getNivel_vigilancia();
$fecha_curso=$estudio->getFecha_curso();
$id=$estudio->getId();
$persona_id=$estudio->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `estudio`( `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`)"
          ."VALUES ('$nivel_academico','$nivel_vigilancia','$fecha_curso','$id','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudio en la base de datos.
     * @param estudio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estudio){
      $id=$estudio->getId();

      try {
          $sql= "SELECT `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`"
          ."FROM `estudio`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estudio->setNivel_academico($data[$i]['nivel_academico']);
          $estudio->setNivel_vigilancia($data[$i]['nivel_vigilancia']);
          $estudio->setFecha_curso($data[$i]['fecha_curso']);
          $estudio->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $estudio->setPersona_id($persona);

          }
      return $estudio;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estudio en la base de datos.
     * @param estudio objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estudio){
      $nivel_academico=$estudio->getNivel_academico();
$nivel_vigilancia=$estudio->getNivel_vigilancia();
$fecha_curso=$estudio->getFecha_curso();
$id=$estudio->getId();
$persona_id=$estudio->getPersona_id()->getId();

      try {
          $sql= "UPDATE `estudio` SET`nivel_academico`='$nivel_academico' ,`nivel_vigilancia`='$nivel_vigilancia' ,`fecha_curso`='$fecha_curso' ,`id`='$id' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estudio en la base de datos.
     * @param estudio objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estudio){
      $id=$estudio->getId();

      try {
          $sql ="DELETE FROM `estudio` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudio en la base de datos.
     * @return ArrayList<Estudio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`"
          ."FROM `estudio`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudio= new Estudio();
          $estudio->setNivel_academico($data[$i]['nivel_academico']);
          $estudio->setNivel_vigilancia($data[$i]['nivel_vigilancia']);
          $estudio->setFecha_curso($data[$i]['fecha_curso']);
          $estudio->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $estudio->setPersona_id($persona);

          array_push($lista,$estudio);
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