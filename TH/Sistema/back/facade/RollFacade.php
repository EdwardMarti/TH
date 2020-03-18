<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Roll.php');
require_once realpath('../../dao/interfaz/IRollDao.php');

class RollFacade {

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
   * Crea un objeto Roll a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idroll
   * @param roll_nombre
   */
  public static function insert( $idroll,  $roll_nombre){
      $roll = new Roll();
      $roll->setIdroll($idroll); 
      $roll->setRoll_nombre($roll_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rollDao =$FactoryDao->getrollDao(self::getDataBaseDefault());
     $rtn = $rollDao->insert($roll);
     $rollDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Roll de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idroll
   * @return El objeto en base de datos o Null
   */
  public static function select($idroll){
      $roll = new Roll();
      $roll->setIdroll($idroll); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rollDao =$FactoryDao->getrollDao(self::getDataBaseDefault());
     $result = $rollDao->select($roll);
     $rollDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Roll  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idroll
   * @param roll_nombre
   */
  public static function update($idroll, $roll_nombre){
      $roll = self::select($idroll);
      $roll->setRoll_nombre($roll_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rollDao =$FactoryDao->getrollDao(self::getDataBaseDefault());
     $rollDao->update($roll);
     $rollDao->close();
  }

  /**
   * Elimina un objeto Roll de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idroll
   */
  public static function delete($idroll){
      $roll = new Roll();
      $roll->setIdroll($idroll); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rollDao =$FactoryDao->getrollDao(self::getDataBaseDefault());
     $rollDao->delete($roll);
     $rollDao->close();
  }

  /**
   * Lista todos los objetos Roll de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Roll en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rollDao =$FactoryDao->getrollDao(self::getDataBaseDefault());
     $result = $rollDao->listAll();
     $rollDao->close();
     return $result;
  }


}
//That´s all folks!