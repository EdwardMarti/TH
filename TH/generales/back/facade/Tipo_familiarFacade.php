<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Tipo_familiar.php');
require_once realpath('../../dao/interfaz/ITipo_familiarDao.php');

class Tipo_familiarFacade {

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
   * Crea un objeto Tipo_familiar a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtipo_familiar
   * @param tipo_familiar_descripcion
   */
  public static function insert( $idtipo_familiar,  $tipo_familiar_descripcion){
      $tipo_familiar = new Tipo_familiar();
      $tipo_familiar->setIdtipo_familiar($idtipo_familiar); 
      $tipo_familiar->setTipo_familiar_descripcion($tipo_familiar_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_familiarDao =$FactoryDao->gettipo_familiarDao(self::getDataBaseDefault());
     $rtn = $tipo_familiarDao->insert($tipo_familiar);
     $tipo_familiarDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_familiar de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtipo_familiar
   * @return El objeto en base de datos o Null
   */
  public static function select($idtipo_familiar){
      $tipo_familiar = new Tipo_familiar();
      $tipo_familiar->setIdtipo_familiar($idtipo_familiar); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_familiarDao =$FactoryDao->gettipo_familiarDao(self::getDataBaseDefault());
     $result = $tipo_familiarDao->select($tipo_familiar);
     $tipo_familiarDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_familiar  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtipo_familiar
   * @param tipo_familiar_descripcion
   */
  public static function update($idtipo_familiar, $tipo_familiar_descripcion){
      $tipo_familiar = self::select($idtipo_familiar);
      $tipo_familiar->setTipo_familiar_descripcion($tipo_familiar_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_familiarDao =$FactoryDao->gettipo_familiarDao(self::getDataBaseDefault());
     $tipo_familiarDao->update($tipo_familiar);
     $tipo_familiarDao->close();
  }

  /**
   * Elimina un objeto Tipo_familiar de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtipo_familiar
   */
  public static function delete($idtipo_familiar){
      $tipo_familiar = new Tipo_familiar();
      $tipo_familiar->setIdtipo_familiar($idtipo_familiar); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_familiarDao =$FactoryDao->gettipo_familiarDao(self::getDataBaseDefault());
     $tipo_familiarDao->delete($tipo_familiar);
     $tipo_familiarDao->close();
  }

  /**
   * Lista todos los objetos Tipo_familiar de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_familiar en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_familiarDao =$FactoryDao->gettipo_familiarDao(self::getDataBaseDefault());
     $result = $tipo_familiarDao->listAll();
     $tipo_familiarDao->close();
     return $result;
  }


}
//That´s all folks!