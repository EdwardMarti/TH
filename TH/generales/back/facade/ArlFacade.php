<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Más delgado  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Arl.php');
require_once realpath('../../dao/interfaz/IArlDao.php');

class ArlFacade {

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
   * Crea un objeto Arl a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarl
   * @param arl_nombre
   */
  public static function insert( $idarl,  $arl_nombre){
      $arl = new Arl();
      $arl->setIdarl($idarl); 
      $arl->setArl_nombre($arl_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $arlDao =$FactoryDao->getarlDao(self::getDataBaseDefault());
     $rtn = $arlDao->insert($arl);
     $arlDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Arl de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarl
   * @return El objeto en base de datos o Null
   */
  public static function select($idarl){
      $arl = new Arl();
      $arl->setIdarl($idarl); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $arlDao =$FactoryDao->getarlDao(self::getDataBaseDefault());
     $result = $arlDao->select($arl);
     $arlDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Arl  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarl
   * @param arl_nombre
   */
  public static function update($idarl, $arl_nombre){
      $arl = self::select($idarl);
      $arl->setArl_nombre($arl_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $arlDao =$FactoryDao->getarlDao(self::getDataBaseDefault());
     $arlDao->update($arl);
     $arlDao->close();
  }

  /**
   * Elimina un objeto Arl de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarl
   */
  public static function delete($idarl){
      $arl = new Arl();
      $arl->setIdarl($idarl); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $arlDao =$FactoryDao->getarlDao(self::getDataBaseDefault());
     $arlDao->delete($arl);
     $arlDao->close();
  }

  /**
   * Lista todos los objetos Arl de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Arl en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $arlDao =$FactoryDao->getarlDao(self::getDataBaseDefault());
     $result = $arlDao->listAll();
     $arlDao->close();
     return $result;
  }


}
//That´s all folks!