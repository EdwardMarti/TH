<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Tipo_vigilancia.php');
require_once realpath('../../dao/interfaz/ITipo_vigilanciaDao.php');

class Tipo_vigilanciaFacade {

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
   * Crea un objeto Tipo_vigilancia a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tipo_vigilancia
   */
  public static function insert(   $tipo_vigilancia1){
      $tipo_vigilancia = new Tipo_vigilancia();
     // $tipo_vigilancia->setId($id); 
      $tipo_vigilancia->setTipo_vigilancia($tipo_vigilancia1); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vigilanciaDao =$FactoryDao->gettipo_vigilanciaDao(self::getDataBaseDefault());
     $rtn = $tipo_vigilanciaDao->insert($tipo_vigilancia);
     $tipo_vigilanciaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_vigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_vigilancia = new Tipo_vigilancia();
      $tipo_vigilancia->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vigilanciaDao =$FactoryDao->gettipo_vigilanciaDao(self::getDataBaseDefault());
     $result = $tipo_vigilanciaDao->select($tipo_vigilancia);
     $tipo_vigilanciaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_vigilancia  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tipo_vigilancia
   */
  public static function update($id, $tipo_vigilancia1){
      $tipo_vigilancia = self::select($id);
      $tipo_vigilancia->setTipo_vigilancia($tipo_vigilancia1); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vigilanciaDao =$FactoryDao->gettipo_vigilanciaDao(self::getDataBaseDefault());
     $tipo_vigilanciaDao->update($tipo_vigilancia);
     $tipo_vigilanciaDao->close();
  }

  /**
   * Elimina un objeto Tipo_vigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_vigilancia = new Tipo_vigilancia();
      $tipo_vigilancia->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vigilanciaDao =$FactoryDao->gettipo_vigilanciaDao(self::getDataBaseDefault());
     $tipo_vigilanciaDao->delete($tipo_vigilancia);
     $tipo_vigilanciaDao->close();
  }

  /**
   * Lista todos los objetos Tipo_vigilancia de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_vigilancia en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vigilanciaDao =$FactoryDao->gettipo_vigilanciaDao(self::getDataBaseDefault());
     $result = $tipo_vigilanciaDao->listAll();
     $tipo_vigilanciaDao->close();
     return $result;
  }


}
//That´s all folks!