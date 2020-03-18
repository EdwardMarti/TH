<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si mi madre entendiera mi código, estaría orgullosa  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Puesto.php');
require_once realpath('../../dao/interfaz/IPuestoDao.php');

class PuestoFacade {

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
   * Crea un objeto Puesto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpuesto
   * @param nombre
   */
  public static function insert( $nombre,$empresa_idempresa){
      $puesto = new Puesto();
//      $puesto->setIdpuesto($idpuesto); 
      $puesto->setNombre($nombre); 
      $puesto->setEmpresa_idempresa($empresa_idempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $rtn = $puestoDao->insert($puesto);
     $puestoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Puesto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpuesto
   * @return El objeto en base de datos o Null
   */
  public static function select($idpuesto){
      $puesto = new Puesto();
      $puesto->setIdpuesto($idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $result = $puestoDao->select($puesto);
     $puestoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Puesto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpuesto
   * @param nombre
   */
  public static function update($idpuesto, $nombre){
      $puesto = self::select($idpuesto);
      $puesto->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $puestoDao->update($puesto);
     $puestoDao->close();
  }

  /**
   * Elimina un objeto Puesto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpuesto
   */
  public static function delete($idpuesto){
      $puesto = new Puesto();
      $puesto->setIdpuesto($idpuesto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $puestoDao->delete($puesto);
     $puestoDao->close();
  }

  /**
   * Lista todos los objetos Puesto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Puesto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $result = $puestoDao->listAll();
     $puestoDao->close();
     return $result;
  }
  public static function listAllxSucursal($empresa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $result = $puestoDao->listAllxSucursal($empresa);
     $puestoDao->close();
     return $result;
  }
  public static function listAllxSucursal_nombre($empresa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $puestoDao =$FactoryDao->getpuestoDao(self::getDataBaseDefault());
     $result = $puestoDao->listAllxSucursal_nombre($empresa);
     $puestoDao->close();
     return $result;
  }


}
//That´s all folks!