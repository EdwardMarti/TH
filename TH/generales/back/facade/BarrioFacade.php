<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Barrio.php');
require_once realpath('../../dao/interfaz/IBarrioDao.php');
require_once realpath('../../dto/Ciudad.php');

class BarrioFacade {

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
   * Crea un objeto Barrio a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbarrio
   * @param barrioco_nombre
   * @param ciudad_idciudad
   */
  public static function insert( $idbarrio,  $barrioco_nombre,  $ciudad_idciudad){
      $barrio = new Barrio();
      $barrio->setIdbarrio($idbarrio); 
      $barrio->setBarrioco_nombre($barrioco_nombre); 
      $barrio->setCiudad_idciudad($ciudad_idciudad); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $rtn = $barrioDao->insert($barrio);
     $barrioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Barrio de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbarrio
   * @return El objeto en base de datos o Null
   */
  public static function select($idbarrio){
      $barrio = new Barrio();
      $barrio->setIdbarrio($idbarrio); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $result = $barrioDao->select($barrio);
     $barrioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Barrio  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbarrio
   * @param barrioco_nombre
   * @param ciudad_idciudad
   */
  public static function update($idbarrio, $barrioco_nombre, $ciudad_idciudad){
      $barrio = self::select($idbarrio);
      $barrio->setBarrioco_nombre($barrioco_nombre); 
      $barrio->setCiudad_idciudad($ciudad_idciudad); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $barrioDao->update($barrio);
     $barrioDao->close();
  }

  /**
   * Elimina un objeto Barrio de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbarrio
   */
  public static function delete($idbarrio){
      $barrio = new Barrio();
      $barrio->setIdbarrio($idbarrio); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $barrioDao->delete($barrio);
     $barrioDao->close();
  }

  /**
   * Lista todos los objetos Barrio de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Barrio en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $result = $barrioDao->listAll();
     $barrioDao->close();
     return $result;
  }

   public static function listXCiudad($ciudad){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $barrioDao =$FactoryDao->getbarrioDao(self::getDataBaseDefault());
     $result = $barrioDao->listXCiudad($ciudad);
     $barrioDao->close();
     return $result;
  }



}
//That´s all folks!