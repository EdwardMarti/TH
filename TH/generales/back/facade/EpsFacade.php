<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No dejes el código del futuro en manos humanas  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Eps.php');
require_once realpath('../../dao/interfaz/IEpsDao.php');

class EpsFacade {

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
   * Crea un objeto Eps a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param ideps
   * @param eps_nombre
   */
  public static function insert( $ideps,  $eps_nombre){
      $eps = new Eps();
      $eps->setIdeps($ideps); 
      $eps->setEps_nombre($eps_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $epsDao =$FactoryDao->getepsDao(self::getDataBaseDefault());
     $rtn = $epsDao->insert($eps);
     $epsDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Eps de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param ideps
   * @return El objeto en base de datos o Null
   */
  public static function select($ideps){
      $eps = new Eps();
      $eps->setIdeps($ideps); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $epsDao =$FactoryDao->getepsDao(self::getDataBaseDefault());
     $result = $epsDao->select($eps);
     $epsDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Eps  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param ideps
   * @param eps_nombre
   */
  public static function update($ideps, $eps_nombre){
      $eps = self::select($ideps);
      $eps->setEps_nombre($eps_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $epsDao =$FactoryDao->getepsDao(self::getDataBaseDefault());
     $epsDao->update($eps);
     $epsDao->close();
  }

  /**
   * Elimina un objeto Eps de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param ideps
   */
  public static function delete($ideps){
      $eps = new Eps();
      $eps->setIdeps($ideps); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $epsDao =$FactoryDao->getepsDao(self::getDataBaseDefault());
     $epsDao->delete($eps);
     $epsDao->close();
  }

  /**
   * Lista todos los objetos Eps de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Eps en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $epsDao =$FactoryDao->getepsDao(self::getDataBaseDefault());
     $result = $epsDao->listAll();
     $epsDao->close();
     return $result;
  }


}
//That´s all folks!