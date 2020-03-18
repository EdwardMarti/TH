<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Estado_civil.php');
require_once realpath('../../dao/interfaz/IEstado_civilDao.php');

class Estado_civilFacade {

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
   * Crea un objeto Estado_civil a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestado_civil
   * @param estado_civil_descripcion
   */
  public static function insert( $idestado_civil,  $estado_civil_descripcion){
      $estado_civil = new Estado_civil();
      $estado_civil->setIdestado_civil($idestado_civil); 
      $estado_civil->setEstado_civil_descripcion($estado_civil_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_civilDao =$FactoryDao->getestado_civilDao(self::getDataBaseDefault());
     $rtn = $estado_civilDao->insert($estado_civil);
     $estado_civilDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estado_civil de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestado_civil
   * @return El objeto en base de datos o Null
   */
  public static function select($idestado_civil){
      $estado_civil = new Estado_civil();
      $estado_civil->setIdestado_civil($idestado_civil); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_civilDao =$FactoryDao->getestado_civilDao(self::getDataBaseDefault());
     $result = $estado_civilDao->select($estado_civil);
     $estado_civilDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estado_civil  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestado_civil
   * @param estado_civil_descripcion
   */
  public static function update($idestado_civil, $estado_civil_descripcion){
      $estado_civil = self::select($idestado_civil);
      $estado_civil->setEstado_civil_descripcion($estado_civil_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_civilDao =$FactoryDao->getestado_civilDao(self::getDataBaseDefault());
     $estado_civilDao->update($estado_civil);
     $estado_civilDao->close();
  }

  /**
   * Elimina un objeto Estado_civil de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestado_civil
   */
  public static function delete($idestado_civil){
      $estado_civil = new Estado_civil();
      $estado_civil->setIdestado_civil($idestado_civil); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_civilDao =$FactoryDao->getestado_civilDao(self::getDataBaseDefault());
     $estado_civilDao->delete($estado_civil);
     $estado_civilDao->close();
  }

  /**
   * Lista todos los objetos Estado_civil de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estado_civil en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_civilDao =$FactoryDao->getestado_civilDao(self::getDataBaseDefault());
     $result = $estado_civilDao->listAll();
     $estado_civilDao->close();
     return $result;
  }


}
//That´s all folks!