<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\

include_once realpath('../../dao/interfaz/IFamiliarDao.php');
include_once realpath('../../dto/Familiar.php');
include_once realpath('../../dto/Persona.php');

class FamiliarDao implements IFamiliarDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Familiar en la base de datos.
     * @param familiar objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($familiar){
      $id=$familiar->getId();
$nombre=$familiar->getNombre();
$apellido=$familiar->getApellido();
$parentesco=$familiar->getParentesco();
$persona_id=$familiar->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `familiar`( `id`, `nombre`, `parentesco`, `persona_id`)"
          ."VALUES ('$id','$nombre','$parentesco','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Familiar en la base de datos.
     * @param familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($familiar){
      $id=$familiar->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `parentesco`, `persona_id`"
          ."FROM `familiar`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $familiar->setId($data[$i]['id']);
          $familiar->setNombre($data[$i]['nombre']);
          $familiar->setApellido($data[$i]['apellido']);
          $familiar->setParentesco($data[$i]['parentesco']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $familiar->setPersona_id($persona);

          }
      return $familiar;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Familiar en la base de datos.
     * @param familiar objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($familiar){
      $id=$familiar->getId();
$nombre=$familiar->getNombre();
$apellido=$familiar->getApellido();
$parentesco=$familiar->getParentesco();
$persona_id=$familiar->getPersona_id()->getId();

      try {
          $sql= "UPDATE `familiar` SET`id`='$id' ,`nombre`='$nombre' ,`apellido`='$apellido' ,`parentesco`='$parentesco' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Familiar en la base de datos.
     * @param familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($familiar){
      $id=$familiar->getId();

      try {
          $sql ="DELETE FROM `familiar` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Familiar en la base de datos.
     * @return ArrayList<Familiar> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `apellido`, `parentesco`, `persona_id`"
          ."FROM `familiar`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $familiar= new Familiar();
          $familiar->setId($data[$i]['id']);
          $familiar->setNombre($data[$i]['nombre']);
          $familiar->setApellido($data[$i]['apellido']);
          $familiar->setParentesco($data[$i]['parentesco']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $familiar->setPersona_id($persona);

          array_push($lista,$familiar);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
    public function listXID($i){
      $lista = array();
      $memo = array();
      try {
          $sql ="SELECT `familiar`.`id` AS 'idFamiliar', `nombre`, `parentesco`, `persona_id`,`numero` FROM `familiar` INNER JOIN `familiar_has_celular` on (`familiar`.`id` = `familiar_has_celular`.`familiar_id`) INNER JOIN `celular` ON (`celular`.`id` = `familiar_has_celular`.`celular_id`) WHERE `familiar`.`persona_id` = '$i'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $familiar= new Familiar();
          $familiar->setId($data[$i]['idFamiliar']);
          $familiar->setNombre($data[$i]['nombre']);
         // $familiar->setApellido($data[$i]['apellido']);
          $parentesco = $data[$i]['parentesco'];
          if(!isset($memo[$parentesco])){
            $memo[$parentesco] = $this->get_tipo_familiar_descripcion($parentesco); 
          }        
          $familiar->setParentesco($parentesco."-".$memo[$parentesco]);
          $familiar->numero = $data[$i]['numero'];
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $familiar->setPersona_id($persona);

          array_push($lista,$familiar);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

private function get_tipo_familiar_descripcion($parentesco){
  $dsn = 'mysql:dbname=datos_generales;host=localhost:3306';
  $usuario = 'root';
  $contraseña = 'Soporte';
  try {
      $gbd = new PDO($dsn, $usuario, $contraseña);
      $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sentencia = $gbd->prepare("SELECT `tipo_familiar_descripcion` AS 'tipo' FROM `tipo_familiar` WHERE `idtipo_familiar` = '$parentesco'");
      $sentencia->execute(); 
      $data = $sentencia->fetchAll();
      $sentencia = null;
      return $data[0]['tipo'];
  }catch (PDOException $e) {
      echo 'Falló la conexión: ' . $e->getMessage();
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