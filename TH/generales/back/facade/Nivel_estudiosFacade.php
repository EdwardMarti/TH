<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Nivel_estudios.php');
require_once realpath('../../dao/interfaz/INivel_estudiosDao.php');

class Nivel_estudiosFacade {

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
   * Crea un objeto Nivel_estudios a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idnivel_estudios
   * @param nivel_estudios_nombre
   */
  public static function insert( $idnivel_estudios,  $nivel_estudios_nombre){
      $nivel_estudios = new Nivel_estudios();
      $nivel_estudios->setIdnivel_estudios($idnivel_estudios); 
      $nivel_estudios->setNivel_estudios_nombre($nivel_estudios_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_estudiosDao =$FactoryDao->getnivel_estudiosDao(self::getDataBaseDefault());
     $rtn = $nivel_estudiosDao->insert($nivel_estudios);
     $nivel_estudiosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Nivel_estudios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idnivel_estudios
   * @return El objeto en base de datos o Null
   */
  public static function select($idnivel_estudios){
      $nivel_estudios = new Nivel_estudios();
      $nivel_estudios->setIdnivel_estudios($idnivel_estudios); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_estudiosDao =$FactoryDao->getnivel_estudiosDao(self::getDataBaseDefault());
     $result = $nivel_estudiosDao->select($nivel_estudios);
     $nivel_estudiosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Nivel_estudios  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idnivel_estudios
   * @param nivel_estudios_nombre
   */
  public static function update($idnivel_estudios, $nivel_estudios_nombre){
      $nivel_estudios = self::select($idnivel_estudios);
      $nivel_estudios->setNivel_estudios_nombre($nivel_estudios_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_estudiosDao =$FactoryDao->getnivel_estudiosDao(self::getDataBaseDefault());
     $nivel_estudiosDao->update($nivel_estudios);
     $nivel_estudiosDao->close();
  }

  /**
   * Elimina un objeto Nivel_estudios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idnivel_estudios
   */
  public static function delete($idnivel_estudios){
      $nivel_estudios = new Nivel_estudios();
      $nivel_estudios->setIdnivel_estudios($idnivel_estudios); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_estudiosDao =$FactoryDao->getnivel_estudiosDao(self::getDataBaseDefault());
     $nivel_estudiosDao->delete($nivel_estudios);
     $nivel_estudiosDao->close();
  }

  /**
   * Lista todos los objetos Nivel_estudios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Nivel_estudios en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_estudiosDao =$FactoryDao->getnivel_estudiosDao(self::getDataBaseDefault());
     $result = $nivel_estudiosDao->listAll();
     $nivel_estudiosDao->close();
     return $result;
  }


}
//That´s all folks!