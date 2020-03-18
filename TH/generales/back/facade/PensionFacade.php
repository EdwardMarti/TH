<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Pension.php');
require_once realpath('../../dao/interfaz/IPensionDao.php');

class PensionFacade {

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
   * Crea un objeto Pension a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpension
   * @param pension_nombre
   */
  public static function insert( $idpension,  $pension_nombre){
      $pension = new Pension();
      $pension->setIdpension($idpension); 
      $pension->setPension_nombre($pension_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pensionDao =$FactoryDao->getpensionDao(self::getDataBaseDefault());
     $rtn = $pensionDao->insert($pension);
     $pensionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Pension de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpension
   * @return El objeto en base de datos o Null
   */
  public static function select($idpension){
      $pension = new Pension();
      $pension->setIdpension($idpension); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pensionDao =$FactoryDao->getpensionDao(self::getDataBaseDefault());
     $result = $pensionDao->select($pension);
     $pensionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Pension  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpension
   * @param pension_nombre
   */
  public static function update($idpension, $pension_nombre){
      $pension = self::select($idpension);
      $pension->setPension_nombre($pension_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pensionDao =$FactoryDao->getpensionDao(self::getDataBaseDefault());
     $pensionDao->update($pension);
     $pensionDao->close();
  }

  /**
   * Elimina un objeto Pension de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpension
   */
  public static function delete($idpension){
      $pension = new Pension();
      $pension->setIdpension($idpension); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pensionDao =$FactoryDao->getpensionDao(self::getDataBaseDefault());
     $pensionDao->delete($pension);
     $pensionDao->close();
  }

  /**
   * Lista todos los objetos Pension de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Pension en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pensionDao =$FactoryDao->getpensionDao(self::getDataBaseDefault());
     $result = $pensionDao->listAll();
     $pensionDao->close();
     return $result;
  }


}
//That´s all folks!