<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Varios_empresa.php');
require_once realpath('../../dao/interfaz/IVarios_empresaDao.php');
require_once realpath('../../dto/Carnet_supervigilancia.php');
require_once realpath('../../dto/Persona.php');

class Varios_empresaFacade {

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
   * Crea un objeto Varios_empresa a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idvarios_empresa
   * @param cnsc
   * @param fecha_acre_super
   * @param acta_consejo
   * @param fecha_aceptacion
   * @param psicofisico
   * @param fecha_examen_psicofisico
   * @param carnet_supervigilancia_idcarne
   * @param persona_id
   */
  public static function insert( $idvarios_empresa,  $cnsc,  $fecha_acre_super,  $acta_consejo,  $fecha_aceptacion,  $psicofisico,  $fecha_examen_psicofisico,  $carnet_supervigilancia_idcarne,  $persona_id){
      $varios_empresa = new Varios_empresa();
      $varios_empresa->setIdvarios_empresa($idvarios_empresa); 
      $varios_empresa->setCnsc($cnsc); 
      $varios_empresa->setFecha_acre_super($fecha_acre_super); 
      $varios_empresa->setActa_consejo($acta_consejo); 
      $varios_empresa->setFecha_aceptacion($fecha_aceptacion); 
      $varios_empresa->setPsicofisico($psicofisico); 
      $varios_empresa->setFecha_examen_psicofisico($fecha_examen_psicofisico); 
      $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia_idcarne); 
      $varios_empresa->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $varios_empresaDao =$FactoryDao->getvarios_empresaDao(self::getDataBaseDefault());
     $rtn = $varios_empresaDao->insert($varios_empresa);
     $varios_empresaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Varios_empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idvarios_empresa
   * @return El objeto en base de datos o Null
   */
  public static function select($idvarios_empresa){
      $varios_empresa = new Varios_empresa();
      $varios_empresa->setIdvarios_empresa($idvarios_empresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $varios_empresaDao =$FactoryDao->getvarios_empresaDao(self::getDataBaseDefault());
     $result = $varios_empresaDao->select($varios_empresa);
     $varios_empresaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Varios_empresa  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idvarios_empresa
   * @param cnsc
   * @param fecha_acre_super
   * @param acta_consejo
   * @param fecha_aceptacion
   * @param psicofisico
   * @param fecha_examen_psicofisico
   * @param carnet_supervigilancia_idcarne
   * @param persona_id
   */
  public static function update($idvarios_empresa, $cnsc, $fecha_acre_super, $acta_consejo, $fecha_aceptacion, $psicofisico, $fecha_examen_psicofisico, $carnet_supervigilancia_idcarne, $persona_id){
      $varios_empresa = self::select($idvarios_empresa);
      $varios_empresa->setCnsc($cnsc); 
      $varios_empresa->setFecha_acre_super($fecha_acre_super); 
      $varios_empresa->setActa_consejo($acta_consejo); 
      $varios_empresa->setFecha_aceptacion($fecha_aceptacion); 
      $varios_empresa->setPsicofisico($psicofisico); 
      $varios_empresa->setFecha_examen_psicofisico($fecha_examen_psicofisico); 
      $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia_idcarne); 
      $varios_empresa->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $varios_empresaDao =$FactoryDao->getvarios_empresaDao(self::getDataBaseDefault());
     $varios_empresaDao->update($varios_empresa);
     $varios_empresaDao->close();
  }

  /**
   * Elimina un objeto Varios_empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idvarios_empresa
   */
  public static function delete($idvarios_empresa){
      $varios_empresa = new Varios_empresa();
      $varios_empresa->setIdvarios_empresa($idvarios_empresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $varios_empresaDao =$FactoryDao->getvarios_empresaDao(self::getDataBaseDefault());
     $varios_empresaDao->delete($varios_empresa);
     $varios_empresaDao->close();
  }

  /**
   * Lista todos los objetos Varios_empresa de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Varios_empresa en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $varios_empresaDao =$FactoryDao->getvarios_empresaDao(self::getDataBaseDefault());
     $result = $varios_empresaDao->listAll();
     $varios_empresaDao->close();
     return $result;
  }


}
//That´s all folks!