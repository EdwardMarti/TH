<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si mi madre entendiera mi código, estaría orgullosa  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Salud_pension.php');
require_once realpath('../../dao/interfaz/ISalud_pensionDao.php');
require_once realpath('../../dto/Persona.php');

class Salud_pensionFacade {

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
   * Crea un objeto Salud_pension a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param salud
   * @param pension
   * @param persona_id
   */
  public static function insert( $id,  $salud,  $pension,  $persona_id){
      $salud_pension = new Salud_pension();
      $salud_pension->setId($id); 
      $salud_pension->setSalud($salud); 
      $salud_pension->setPension($pension); 
      $salud_pension->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $salud_pensionDao =$FactoryDao->getsalud_pensionDao(self::getDataBaseDefault());
     $rtn = $salud_pensionDao->insert($salud_pension);
     $salud_pensionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Salud_pension de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $salud_pension = new Salud_pension();
      $salud_pension->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $salud_pensionDao =$FactoryDao->getsalud_pensionDao(self::getDataBaseDefault());
     $result = $salud_pensionDao->select($salud_pension);
     $salud_pensionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Salud_pension  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param salud
   * @param pension
   * @param persona_id
   */
  public static function update($id, $salud, $pension, $persona_id){
      $salud_pension = self::select($id);
      $salud_pension->setSalud($salud); 
      $salud_pension->setPension($pension); 
      $salud_pension->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $salud_pensionDao =$FactoryDao->getsalud_pensionDao(self::getDataBaseDefault());
     $salud_pensionDao->update($salud_pension);
     $salud_pensionDao->close();
  }

  /**
   * Elimina un objeto Salud_pension de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $salud_pension = new Salud_pension();
      $salud_pension->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $salud_pensionDao =$FactoryDao->getsalud_pensionDao(self::getDataBaseDefault());
     $salud_pensionDao->delete($salud_pension);
     $salud_pensionDao->close();
  }

  /**
   * Lista todos los objetos Salud_pension de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Salud_pension en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $salud_pensionDao =$FactoryDao->getsalud_pensionDao(self::getDataBaseDefault());
     $result = $salud_pensionDao->listAll();
     $salud_pensionDao->close();
     return $result;
  }


}
//That´s all folks!