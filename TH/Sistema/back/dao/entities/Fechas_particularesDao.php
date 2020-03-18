<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es tu vida y se acaba a cada minuto.  \\

include_once realpath('../../dao/interfaz/IFechas_particularesDao.php');
include_once realpath('../../dto/Fechas_particulares.php');
include_once realpath('../../dto/Persona.php');

class Fechas_particularesDao implements IFechas_particularesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fechas_particulares en la base de datos.
     * @param fechas_particulares objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fechas_particulares){
      $estudio_seguridad=$fechas_particulares->getEstudio_seguridad();
$examen_medico=$fechas_particulares->getExamen_medico();
$prueba_psicotecnica=$fechas_particulares->getPrueba_psicotecnica();
$id=$fechas_particulares->getId();
$persona_id=$fechas_particulares->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `fechas_particulares`( `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`)"
          ."VALUES ('$estudio_seguridad','$examen_medico','$prueba_psicotecnica','$id','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fechas_particulares en la base de datos.
     * @param fechas_particulares objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fechas_particulares){
      $id=$fechas_particulares->getId();

      try {
          $sql= "SELECT `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`"
          ."FROM `fechas_particulares`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fechas_particulares->setEstudio_seguridad($data[$i]['estudio_seguridad']);
          $fechas_particulares->setExamen_medico($data[$i]['examen_medico']);
          $fechas_particulares->setPrueba_psicotecnica($data[$i]['prueba_psicotecnica']);
          $fechas_particulares->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $fechas_particulares->setPersona_id($persona);

          }
      return $fechas_particulares;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fechas_particulares en la base de datos.
     * @param fechas_particulares objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fechas_particulares){
      $estudio_seguridad=$fechas_particulares->getEstudio_seguridad();
$examen_medico=$fechas_particulares->getExamen_medico();
$prueba_psicotecnica=$fechas_particulares->getPrueba_psicotecnica();
$id=$fechas_particulares->getId();
$persona_id=$fechas_particulares->getPersona_id()->getId();

      try {
          $sql= "UPDATE `fechas_particulares` SET`estudio_seguridad`='$estudio_seguridad' ,`examen_medico`='$examen_medico' ,`prueba_psicotecnica`='$prueba_psicotecnica' ,`id`='$id' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fechas_particulares en la base de datos.
     * @param fechas_particulares objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fechas_particulares){
      $id=$fechas_particulares->getId();

      try {
          $sql ="DELETE FROM `fechas_particulares` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fechas_particulares en la base de datos.
     * @return ArrayList<Fechas_particulares> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`"
          ."FROM `fechas_particulares`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fechas_particulares= new Fechas_particulares();
          $fechas_particulares->setEstudio_seguridad($data[$i]['estudio_seguridad']);
          $fechas_particulares->setExamen_medico($data[$i]['examen_medico']);
          $fechas_particulares->setPrueba_psicotecnica($data[$i]['prueba_psicotecnica']);
          $fechas_particulares->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $fechas_particulares->setPersona_id($persona);

          array_push($lista,$fechas_particulares);
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