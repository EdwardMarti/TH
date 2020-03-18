<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Celular.php');
require_once realpath('../../dao/interfaz/ICelularDao.php');

class CelularFacade {

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
   * Crea un objeto Celular a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param numero
   */
  public static function insert( $id,  $numero){
      $celular = new Celular();
      $celular->setId($id); 
      $celular->setNumero($numero); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $rtn = $celularDao->insert($celular);
     $celularDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $celular = new Celular();
      $celular->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $result = $celularDao->select($celular);
     $celularDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Celular  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param numero
   */
  public static function update($id, $numero){
      $celular = self::select($id);
      $celular->setNumero($numero); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $celularDao->update($celular);
     $celularDao->close();
  }

  /**
   * Elimina un objeto Celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $celular = new Celular();
      $celular->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $celularDao->delete($celular);
     $celularDao->close();
  }

  /**
   * Lista todos los objetos Celular de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Celular en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $result = $celularDao->listAll();
     $celularDao->close();
     return $result;
  }
  
public static function listXID($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $celularDao =$FactoryDao->getcelularDao(self::getDataBaseDefault());
     $result = $celularDao->listXID($id);
     $celularDao->close();
     return $result;
  }

}
//That´s all folks!