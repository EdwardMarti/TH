<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora tú puedes ser el tipo con el látigo  \\

include_once realpath('../../dao/interfaz/ICargoDao.php');
include_once realpath('../../dto/Cargo.php');
include_once realpath('../../dto/Empresa.php');
include_once realpath('../../dto/Area_empresa.php');
include_once realpath('../../dto/Cargo_empreso.php');
include_once realpath('../../dto/Puesto.php');

class CargoDao implements ICargoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cargo en la base de datos.
     * @param cargo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cargo){
      $id=$cargo->getId();
$fecha_ingreso=$cargo->getFecha_ingreso();
$empresa_idempresa=$cargo->getEmpresa_idempresa()->getIdempresa();
$area_empresa_idarea_emp=$cargo->getArea_empresa_idarea_emp()->getIdarea_emp();
$cargo_empreso_idcargo=$cargo->getCargo_empreso_idcargo()->getIdcargo();
$puesto_idpuesto=$cargo->getPuesto_idpuesto()->getIdpuesto();

      try {
          $sql= "INSERT INTO `cargo`( `id`, `fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`)"
          ."VALUES ('$id','$fecha_ingreso','$empresa_idempresa','$area_empresa_idarea_emp','$cargo_empreso_idcargo','$puesto_idpuesto')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  public function insertNuevo($cargo){
       // $id = $cargo->getId();
        $fecha_ingreso = $cargo->getFecha_ingreso();
        $empresa_idempresa = $cargo->getEmpresa_idempresa()->getIdempresa();
        $area_empresa_idarea_emp = $cargo->getArea_empresa_idarea_emp()->getIdarea_emp();
        $cargo_empreso_idcargo = $cargo->getCargo_empreso_idcargo()->getIdcargo();
        $puesto_idpuesto = $cargo->getPuesto_idpuesto()->getIdpuesto();
        $empresa_p = $cargo->getEmpresa_p_idEmpresa_p()->getIdEmpresa_p();
        $Persona = $cargo->getPersona_id()->getId();

        try {
          $sql= "INSERT INTO `cargo`(`fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`, `Empresa_p_idEmpresa_p`, `persona_id`)"
          ."VALUES ('$fecha_ingreso','$empresa_idempresa','$area_empresa_idarea_emp','$cargo_empreso_idcargo','$puesto_idpuesto','$empresa_p','$Persona')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cargo en la base de datos.
     * @param cargo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cargo){
      $id=$cargo->getId();

      try {
          $sql= "SELECT `id`, `fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`"
          ."FROM `cargo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cargo->setId($data[$i]['id']);
          $cargo->setFecha_ingreso($data[$i]['fecha_ingreso']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $cargo->setEmpresa_idempresa($empresa);
           $area_empresa = new Area_empresa();
           $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $cargo->setArea_empresa_idarea_emp($area_empresa);
           $cargo_empreso = new Cargo_empreso();
           $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
           $cargo->setCargo_empreso_idcargo($cargo_empreso);
           $puesto = new Puesto();
           $puesto->setIdpuesto($data[$i]['puesto_idpuesto']);
           $cargo->setPuesto_idpuesto($puesto);

          }
      return $cargo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cargo en la base de datos.
     * @param cargo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cargo){
      $id=$cargo->getId();
$fecha_ingreso=$cargo->getFecha_ingreso();
$empresa_idempresa=$cargo->getEmpresa_idempresa()->getIdempresa();
$area_empresa_idarea_emp=$cargo->getArea_empresa_idarea_emp()->getIdarea_emp();
$cargo_empreso_idcargo=$cargo->getCargo_empreso_idcargo()->getIdcargo();
$puesto_idpuesto=$cargo->getPuesto_idpuesto()->getIdpuesto();

      try {
          $sql= "UPDATE `cargo` SET`id`='$id' ,`fecha_ingreso`='$fecha_ingreso' ,`empresa_idempresa`='$empresa_idempresa' ,`area_empresa_idarea_emp`='$area_empresa_idarea_emp' ,`cargo_empreso_idcargo`='$cargo_empreso_idcargo' ,`puesto_idpuesto`='$puesto_idpuesto' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  public function registrarTraslado($cargo,$id, $fecha_ingreso, $Observacion) {
      
//      $rta=$this->update_fecha($fecha_salida, $Observacion,$id);
//      echo $rta;
      $Stado='0';
      if($this->update_fecha($id, $fecha_ingreso, $Observacion,$Stado)){
          $rtas=$this->insertNuevo($cargo);
          if($rtas>0){
              
              return $rtas;
          }
              
      }
      
     
      
  }
  
  public function update_fecha($id, $fecha_ingreso, $Observacion,$Stado){

      try {
          $sql= "UPDATE `cargo` SET `fecha_salida`='$fecha_ingreso', `observacion`='$Observacion',`stado`='$Stado' WHERE `id`='$id' ";
         return $this->insertarConsulta2($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cargo en la base de datos.
     * @param cargo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cargo){
      $id=$cargo->getId();

      try {
          $sql ="DELETE FROM `cargo` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cargo en la base de datos.
     * @return ArrayList<Cargo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`"
          ."FROM `cargo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cargo= new Cargo();
          $cargo->setId($data[$i]['id']);
          $cargo->setFecha_ingreso($data[$i]['fecha_ingreso']);
           $empresa = new Empresa();
           $empresa->setIdempresa($data[$i]['empresa_idempresa']);
           $cargo->setEmpresa_idempresa($empresa);
           $area_empresa = new Area_empresa();
           $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
           $cargo->setArea_empresa_idarea_emp($area_empresa);
           $cargo_empreso = new Cargo_empreso();
           $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
           $cargo->setCargo_empreso_idcargo($cargo_empreso);
           $puesto = new Puesto();
           $puesto->setIdpuesto($data[$i]['puesto_idpuesto']);
           $cargo->setPuesto_idpuesto($puesto);

          array_push($lista,$cargo);
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
    
      public function updateConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $rta = $sentencia->rowCount();
        $sentencia = null;
        return $rta;
    }
    
       public function insertarConsulta2($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        if (!$sentencia->execute()) {
            $result = " . $mysqli->errno .";
            $sentencia = null;
        } else {
            $result = true;

            $sentencia = null;
        }

        return $result;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!