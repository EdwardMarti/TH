<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuenta la leyenda que si gritas 'Soy programador' las nenas caerán a tus pies  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Nivel_vigilancia.php');
require_once realpath('../../dao/interfaz/INivel_vigilanciaDao.php');

class Nivel_vigilanciaFacade {

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
   * Crea un objeto Nivel_vigilancia a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   */
  public static function insert(   $nombre){
      $nivel_vigilancia = new Nivel_vigilancia();
//      $nivel_vigilancia->setId($id); 
      $nivel_vigilancia->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_vigilanciaDao =$FactoryDao->getnivel_vigilanciaDao(self::getDataBaseDefault());
     $rtn = $nivel_vigilanciaDao->insert($nivel_vigilancia);
     $nivel_vigilanciaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Nivel_vigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $nivel_vigilancia = new Nivel_vigilancia();
      $nivel_vigilancia->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_vigilanciaDao =$FactoryDao->getnivel_vigilanciaDao(self::getDataBaseDefault());
     $result = $nivel_vigilanciaDao->select($nivel_vigilancia);
     $nivel_vigilanciaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Nivel_vigilancia  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   */
  public static function update($id, $nombre){
      $nivel_vigilancia = self::select($id);
      $nivel_vigilancia->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_vigilanciaDao =$FactoryDao->getnivel_vigilanciaDao(self::getDataBaseDefault());
     $nivel_vigilanciaDao->update($nivel_vigilancia);
     $nivel_vigilanciaDao->close();
  }

  /**
   * Elimina un objeto Nivel_vigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $nivel_vigilancia = new Nivel_vigilancia();
      $nivel_vigilancia->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_vigilanciaDao =$FactoryDao->getnivel_vigilanciaDao(self::getDataBaseDefault());
     $nivel_vigilanciaDao->delete($nivel_vigilancia);
     $nivel_vigilanciaDao->close();
  }

  /**
   * Lista todos los objetos Nivel_vigilancia de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Nivel_vigilancia en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $nivel_vigilanciaDao =$FactoryDao->getnivel_vigilanciaDao(self::getDataBaseDefault());
     $result = $nivel_vigilanciaDao->listAll();
     $nivel_vigilanciaDao->close();
     return $result;
  }


}
//That´s all folks!