<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Familiar_has_celular.php');
require_once realpath('../../dao/interfaz/IFamiliar_has_celularDao.php');
require_once realpath('../../dto/Familiar.php');
require_once realpath('../../dto/Celular.php');

class Familiar_has_celularFacade {

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
   * Crea un objeto Familiar_has_celular a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param familiar_id
   * @param celular_id
   */
  public static function insert( $familiar_id,  $celular_id){
      $familiar_has_celular = new Familiar_has_celular();
      $familiar_has_celular->setFamiliar_id($familiar_id); 
      $familiar_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $rtn = $familiar_has_celularDao->insert($familiar_has_celular);
     $familiar_has_celularDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Familiar_has_celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param familiar_id
   * @param celular_id
   * @return El objeto en base de datos o Null
   */
  public static function select($familiar_id, $celular_id){
      $familiar_has_celular = new Familiar_has_celular();
      $familiar_has_celular->setFamiliar_id($familiar_id); 
      $familiar_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $result = $familiar_has_celularDao->select($familiar_has_celular);
     $familiar_has_celularDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Familiar_has_celular  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param familiar_id
   * @param celular_id
   */
  public static function update($familiar_id, $celular_id){
      $familiar_has_celular = self::select($familiar_id, $celular_id);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $familiar_has_celularDao->update($familiar_has_celular);
     $familiar_has_celularDao->close();
  }

  /**
   * Elimina un objeto Familiar_has_celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param familiar_id
   * @param celular_id
   */
  public static function delete($familiar_id, $celular_id){
      $familiar_has_celular = new Familiar_has_celular();
      $familiar_has_celular->setFamiliar_id($familiar_id); 
      $familiar_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $familiar_has_celularDao->delete($familiar_has_celular);
     $familiar_has_celularDao->close();
  }

  /**
   * Lista todos los objetos Familiar_has_celular de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Familiar_has_celular en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $result = $familiar_has_celularDao->listAll();
     $familiar_has_celularDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Familiar_has_celular de la base de datos a partir de familiar_id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param familiar_id
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByFamiliar_id($familiar_id){
      $familiar_has_celular = new Familiar_has_celular();
      $familiar_has_celular->setFamiliar_id($familiar_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $result = $familiar_has_celularDao->listByFamiliar_id($familiar_has_celular);
     $familiar_has_celularDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Familiar_has_celular de la base de datos a partir de celular_id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param celular_id
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByCelular_id($celular_id){
      $familiar_has_celular = new Familiar_has_celular();
      $familiar_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiar_has_celularDao =$FactoryDao->getfamiliar_has_celularDao(self::getDataBaseDefault());
     $result = $familiar_has_celularDao->listByCelular_id($familiar_has_celular);
     $familiar_has_celularDao->close();
     return $result;
  }


}
//That´s all folks!