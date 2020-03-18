<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Familiar.php');
require_once realpath('../../dao/interfaz/IFamiliarDao.php');
require_once realpath('../../dto/Persona.php');

class FamiliarFacade {

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
   * Crea un objeto Familiar a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param apellido
   * @param parentesco
   * @param persona_id
   */
  public static function insert( $id,  $nombre,  $apellido,  $parentesco,  $persona_id){
      $familiar = new Familiar();
      $familiar->setId($id); 
      $familiar->setNombre($nombre); 
      $familiar->setApellido($apellido); 
      $familiar->setParentesco($parentesco); 
      $familiar->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $rtn = $familiarDao->insert($familiar);
     $familiarDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Familiar de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $familiar = new Familiar();
      $familiar->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $result = $familiarDao->select($familiar);
     $familiarDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Familiar  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param apellido
   * @param parentesco
   * @param persona_id
   */
  public static function update($id, $nombre, $apellido, $parentesco, $persona_id){
      $familiar = self::select($id);
      $familiar->setNombre($nombre); 
      $familiar->setApellido($apellido); 
      $familiar->setParentesco($parentesco); 
      $familiar->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $familiarDao->update($familiar);
     $familiarDao->close();
  }

  /**
   * Elimina un objeto Familiar de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $familiar = new Familiar();
      $familiar->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $familiarDao->delete($familiar);
     $familiarDao->close();
  }

  /**
   * Lista todos los objetos Familiar de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Familiar en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $result = $familiarDao->listAll();
     $familiarDao->close();
     return $result;
  }
  
  public static function listXID($i){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $familiarDao =$FactoryDao->getfamiliarDao(self::getDataBaseDefault());
     $result = $familiarDao->listXID($i);
     $familiarDao->close();
     return $result;
  }


}
//That´s all folks!