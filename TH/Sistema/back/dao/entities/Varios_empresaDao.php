<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\

include_once realpath('../../dao/interfaz/IVarios_empresaDao.php');
include_once realpath('../../dto/Varios_empresa.php');
include_once realpath('../../dto/Carnet_supervigilancia.php');
include_once realpath('../../dto/Persona.php');

class Varios_empresaDao implements IVarios_empresaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($varios_empresa){
      $idvarios_empresa=$varios_empresa->getIdvarios_empresa();
$cnsc=$varios_empresa->getCnsc();
$fecha_acre_super=$varios_empresa->getFecha_acre_super();
$acta_consejo=$varios_empresa->getActa_consejo();
$fecha_aceptacion=$varios_empresa->getFecha_aceptacion();
$psicofisico=$varios_empresa->getPsicofisico();
$fecha_examen_psicofisico=$varios_empresa->getFecha_examen_psicofisico();
$carnet_supervigilancia_idcarne=$varios_empresa->getCarnet_supervigilancia_idcarne()->getIdcarne();
$persona_id=$varios_empresa->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `varios_empresa`( `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`)"
          ."VALUES ('$idvarios_empresa','$cnsc','$fecha_acre_super','$acta_consejo','$fecha_aceptacion','$psicofisico','$fecha_examen_psicofisico','$carnet_supervigilancia_idcarne','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($varios_empresa){
      $idvarios_empresa=$varios_empresa->getIdvarios_empresa();

      try {
          $sql= "SELECT `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`"
          ."FROM `varios_empresa`"
          ."WHERE `idvarios_empresa`='$idvarios_empresa'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $varios_empresa->setIdvarios_empresa($data[$i]['idvarios_empresa']);
          $varios_empresa->setCnsc($data[$i]['cnsc']);
          $varios_empresa->setFecha_acre_super($data[$i]['fecha_acre_super']);
          $varios_empresa->setActa_consejo($data[$i]['acta_consejo']);
          $varios_empresa->setFecha_aceptacion($data[$i]['fecha_aceptacion']);
          $varios_empresa->setPsicofisico($data[$i]['psicofisico']);
          $varios_empresa->setFecha_examen_psicofisico($data[$i]['fecha_examen_psicofisico']);
           $carnet_supervigilancia = new Carnet_supervigilancia();
           $carnet_supervigilancia->setIdcarne($data[$i]['carnet_supervigilancia_idcarne']);
           $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $varios_empresa->setPersona_id($persona);

          }
      return $varios_empresa;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($varios_empresa){
      $idvarios_empresa=$varios_empresa->getIdvarios_empresa();
$cnsc=$varios_empresa->getCnsc();
$fecha_acre_super=$varios_empresa->getFecha_acre_super();
$acta_consejo=$varios_empresa->getActa_consejo();
$fecha_aceptacion=$varios_empresa->getFecha_aceptacion();
$psicofisico=$varios_empresa->getPsicofisico();
$fecha_examen_psicofisico=$varios_empresa->getFecha_examen_psicofisico();
$carnet_supervigilancia_idcarne=$varios_empresa->getCarnet_supervigilancia_idcarne()->getIdcarne();
$persona_id=$varios_empresa->getPersona_id()->getId();

      try {
          $sql= "UPDATE `varios_empresa` SET`idvarios_empresa`='$idvarios_empresa' ,`cnsc`='$cnsc' ,`fecha_acre_super`='$fecha_acre_super' ,`acta_consejo`='$acta_consejo' ,`fecha_aceptacion`='$fecha_aceptacion' ,`psicofisico`='$psicofisico' ,`fecha_examen_psicofisico`='$fecha_examen_psicofisico' ,`carnet_supervigilancia_idcarne`='$carnet_supervigilancia_idcarne' ,`persona_id`='$persona_id' WHERE `idvarios_empresa`='$idvarios_empresa' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($varios_empresa){
      $idvarios_empresa=$varios_empresa->getIdvarios_empresa();

      try {
          $sql ="DELETE FROM `varios_empresa` WHERE `idvarios_empresa`='$idvarios_empresa'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Varios_empresa en la base de datos.
     * @return ArrayList<Varios_empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`"
          ."FROM `varios_empresa`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $varios_empresa= new Varios_empresa();
          $varios_empresa->setIdvarios_empresa($data[$i]['idvarios_empresa']);
          $varios_empresa->setCnsc($data[$i]['cnsc']);
          $varios_empresa->setFecha_acre_super($data[$i]['fecha_acre_super']);
          $varios_empresa->setActa_consejo($data[$i]['acta_consejo']);
          $varios_empresa->setFecha_aceptacion($data[$i]['fecha_aceptacion']);
          $varios_empresa->setPsicofisico($data[$i]['psicofisico']);
          $varios_empresa->setFecha_examen_psicofisico($data[$i]['fecha_examen_psicofisico']);
           $carnet_supervigilancia = new Carnet_supervigilancia();
           $carnet_supervigilancia->setIdcarne($data[$i]['carnet_supervigilancia_idcarne']);
           $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $varios_empresa->setPersona_id($persona);

          array_push($lista,$varios_empresa);
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