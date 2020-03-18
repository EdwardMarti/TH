<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Pais.php');
require_once realpath('../../dao/interfaz/IPaisDao.php');

class PaisFacade {

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
   * Crea un objeto Pais a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpais
   * @param pais_descripcion
   */
  public static function insert( $idpais,  $pais_descripcion){
      $pais = new Pais();
      $pais->setIdpais($idpais); 
      $pais->setPais_descripcion($pais_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $paisDao =$FactoryDao->getpaisDao(self::getDataBaseDefault());
     $rtn = $paisDao->insert($pais);
     $paisDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Pais de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpais
   * @return El objeto en base de datos o Null
   */
  public static function select($idpais){
      $pais = new Pais();
      $pais->setIdpais($idpais); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $paisDao =$FactoryDao->getpaisDao(self::getDataBaseDefault());
     $result = $paisDao->select($pais);
     $paisDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Pais  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpais
   * @param pais_descripcion
   */
  public static function update($idpais, $pais_descripcion){
      $pais = self::select($idpais);
      $pais->setPais_descripcion($pais_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $paisDao =$FactoryDao->getpaisDao(self::getDataBaseDefault());
     $paisDao->update($pais);
     $paisDao->close();
  }

  /**
   * Elimina un objeto Pais de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idpais
   */
  public static function delete($idpais){
      $pais = new Pais();
      $pais->setIdpais($idpais); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $paisDao =$FactoryDao->getpaisDao(self::getDataBaseDefault());
     $paisDao->delete($pais);
     $paisDao->close();
  }

  /**
   * Lista todos los objetos Pais de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Pais en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $paisDao =$FactoryDao->getpaisDao(self::getDataBaseDefault());
     $result = $paisDao->listAll();
     $paisDao->close();
     return $result;
  }


}
//That´s all folks!