<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Persona_has_celular.php');
require_once realpath('../../dao/interfaz/IPersona_has_celularDao.php');
require_once realpath('../../dto/Persona.php');
require_once realpath('../../dto/Celular.php');

class Persona_has_celularFacade {

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
   * Crea un objeto Persona_has_celular a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param persona_id
   * @param celular_id
   */
  public static function insert( $persona_id,  $celular_id){
      $persona_has_celular = new Persona_has_celular();
      $persona_has_celular->setPersona_id($persona_id); 
      $persona_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $rtn = $persona_has_celularDao->insert($persona_has_celular);
     $persona_has_celularDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Persona_has_celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param persona_id
   * @param celular_id
   * @return El objeto en base de datos o Null
   */
  public static function select($persona_id, $celular_id){
      $persona_has_celular = new Persona_has_celular();
      $persona_has_celular->setPersona_id($persona_id); 
      $persona_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $result = $persona_has_celularDao->select($persona_has_celular);
     $persona_has_celularDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Persona_has_celular  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param persona_id
   * @param celular_id
   */
  public static function update($persona_id, $celular_id){
      $persona_has_celular = self::select($persona_id, $celular_id);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $persona_has_celularDao->update($persona_has_celular);
     $persona_has_celularDao->close();
  }

  /**
   * Elimina un objeto Persona_has_celular de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param persona_id
   * @param celular_id
   */
  public static function delete($persona_id, $celular_id){
      $persona_has_celular = new Persona_has_celular();
      $persona_has_celular->setPersona_id($persona_id); 
      $persona_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $persona_has_celularDao->delete($persona_has_celular);
     $persona_has_celularDao->close();
  }

  /**
   * Lista todos los objetos Persona_has_celular de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Persona_has_celular en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $result = $persona_has_celularDao->listAll();
     $persona_has_celularDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Persona_has_celular de la base de datos a partir de persona_id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param persona_id
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByPersona_id($persona_id){
      $persona_has_celular = new Persona_has_celular();
      $persona_has_celular->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $result = $persona_has_celularDao->listByPersona_id($persona_has_celular);
     $persona_has_celularDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Persona_has_celular de la base de datos a partir de celular_id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param celular_id
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByCelular_id($celular_id){
      $persona_has_celular = new Persona_has_celular();
      $persona_has_celular->setCelular_id($celular_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_celularDao =$FactoryDao->getpersona_has_celularDao(self::getDataBaseDefault());
     $result = $persona_has_celularDao->listByCelular_id($persona_has_celular);
     $persona_has_celularDao->close();
     return $result;
  }


}
//That´s all folks!