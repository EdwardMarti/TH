<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Más delgado  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Cargo.php');
require_once realpath('../../dao/interfaz/ICargoDao.php');
require_once realpath('../../dto/Empresa.php');
require_once realpath('../../dto/Area_empresa.php');
require_once realpath('../../dto/Cargo_empreso.php');
require_once realpath('../../dto/Puesto.php');

class CargoFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Cargo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha_ingreso
   * @param empresa_idempresa
   * @param area_empresa_idarea_emp
   * @param cargo_empreso_idcargo
   * @param puesto_idpuesto
   */
  public static function insert( $id,  $fecha_ingreso,  $empresa_idempresa,  $area_empresa_idarea_emp,  $cargo_empreso_idcargo,  $puesto_idpuesto){
      $cargo = new Cargo();
      $cargo->setId($id); 
      $cargo->setFecha_ingreso($fecha_ingreso); 
      $cargo->setEmpresa_idempresa($empresa_idempresa); 
      $cargo->setArea_empresa_idarea_emp($area_empresa_idarea_emp); 
      $cargo->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $cargo->setPuesto_idpuesto($puesto_idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $rtn = $cargoDao->insert($cargo);
     $cargoDao->close();
     return $rtn;
  }
  public static function insertNuevo(   $fecha_ingreso,  $empresa_idempresa,  $area_empresa_idarea_emp,  $cargo_empreso_idcargo,  $puesto_idpuesto,$empresa_p,$persona,$fecha_Salida,$Observacion,$id){
      $cargo = new Cargo();
//      $cargo->setId($id); 
      $cargo->setFecha_ingreso($fecha_ingreso); 
      $cargo->setEmpresa_idempresa($empresa_idempresa); 
      $cargo->setArea_empresa_idarea_emp($area_empresa_idarea_emp); 
      $cargo->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $cargo->setPuesto_idpuesto($puesto_idpuesto); 
      $cargo->setEmpresa_p_idEmpresa_p($empresa_p); 
      $cargo->setPersona_id($persona); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $rtn = $cargoDao->registrarTraslado($cargo,$fecha_Salida,$Observacion,$id);
     $cargoDao->close();
     return $rtn;
  }
  
  public static function update_fecha($id, $fecha_ingreso, $Observacion,$Stado){
//      $cargo = new Cargo();
//      $cargo->setId($id); 
//      $cargo->setFecha_ingreso($fecha_ingreso); 
//      $cargo->setPuesto_idpuesto($puesto_idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $rtn = $cargoDao->update_fecha($id, $fecha_ingreso, $Observacion,$Stado);
     $cargoDao->close();
     return $rtn;
  }
  
  public static function registrarTraslado($id, $fecha_ingreso, $Observacion){
//      $cargo = new Cargo();
//      $cargo->setId($id); 
//      $cargo->setFecha_ingreso($fecha_ingreso); 
//      $cargo->setPuesto_idpuesto($puesto_idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $rtn = $cargoDao->registrarTraslado($id, $fecha_ingreso, $Observacion);
     $cargoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Cargo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $cargo = new Cargo();
      $cargo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $result = $cargoDao->select($cargo);
     $cargoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cargo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha_ingreso
   * @param empresa_idempresa
   * @param area_empresa_idarea_emp
   * @param cargo_empreso_idcargo
   * @param puesto_idpuesto
   */
  public static function update($id, $fecha_ingreso, $empresa_idempresa, $area_empresa_idarea_emp, $cargo_empreso_idcargo, $puesto_idpuesto){
      $cargo = self::select($id);
      $cargo->setFecha_ingreso($fecha_ingreso); 
      $cargo->setEmpresa_idempresa($empresa_idempresa); 
      $cargo->setArea_empresa_idarea_emp($area_empresa_idarea_emp); 
      $cargo->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $cargo->setPuesto_idpuesto($puesto_idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $cargoDao->update($cargo);
     $cargoDao->close();
  }

  /**
   * Elimina un objeto Cargo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $cargo = new Cargo();
      $cargo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $cargoDao->delete($cargo);
     $cargoDao->close();
  }

  /**
   * Lista todos los objetos Cargo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cargo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargoDao =$FactoryDao->getcargoDao(self::getDataBaseDefault());
     $result = $cargoDao->listAll();
     $cargoDao->close();
     return $result;
  }


}
//That´s all folks!