<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Sucursal.php');
require_once realpath('../../dao/interfaz/ISucursalDao.php');

class SucursalFacade {

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
   * Crea un objeto Sucursal a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsucursal
   * @param nombre_sucursal
   * @param direccion_sucursal
   * @param tel_sucursal
   */
  public static function insert( $idsucursal,  $nombre_sucursal,  $direccion_sucursal,  $tel_sucursal){
      $sucursal = new Sucursal();
      $sucursal->setIdsucursal($idsucursal); 
      $sucursal->setNombre_sucursal($nombre_sucursal); 
      $sucursal->setDireccion_sucursal($direccion_sucursal); 
      $sucursal->setTel_sucursal($tel_sucursal); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sucursalDao =$FactoryDao->getsucursalDao(self::getDataBaseDefault());
     $rtn = $sucursalDao->insert($sucursal);
     $sucursalDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Sucursal de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsucursal
   * @return El objeto en base de datos o Null
   */
  public static function select($idsucursal){
      $sucursal = new Sucursal();
      $sucursal->setIdsucursal($idsucursal); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sucursalDao =$FactoryDao->getsucursalDao(self::getDataBaseDefault());
     $result = $sucursalDao->select($sucursal);
     $sucursalDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Sucursal  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsucursal
   * @param nombre_sucursal
   * @param direccion_sucursal
   * @param tel_sucursal
   */
  public static function update($idsucursal, $nombre_sucursal, $direccion_sucursal, $tel_sucursal){
      $sucursal = self::select($idsucursal);
      $sucursal->setNombre_sucursal($nombre_sucursal); 
      $sucursal->setDireccion_sucursal($direccion_sucursal); 
      $sucursal->setTel_sucursal($tel_sucursal); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sucursalDao =$FactoryDao->getsucursalDao(self::getDataBaseDefault());
     $sucursalDao->update($sucursal);
     $sucursalDao->close();
  }

  /**
   * Elimina un objeto Sucursal de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsucursal
   */
  public static function delete($idsucursal){
      $sucursal = new Sucursal();
      $sucursal->setIdsucursal($idsucursal); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sucursalDao =$FactoryDao->getsucursalDao(self::getDataBaseDefault());
     $sucursalDao->delete($sucursal);
     $sucursalDao->close();
  }

  /**
   * Lista todos los objetos Sucursal de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Sucursal en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sucursalDao =$FactoryDao->getsucursalDao(self::getDataBaseDefault());
     $result = $sucursalDao->listAll();
     $sucursalDao->close();
     return $result;
  }


}
//That´s all folks!