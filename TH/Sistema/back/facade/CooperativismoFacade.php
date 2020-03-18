<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Cooperativismo.php');
require_once realpath('../../dao/interfaz/ICooperativismoDao.php');
require_once realpath('../../dto/Persona.php');

class CooperativismoFacade {

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
   * Crea un objeto Cooperativismo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcooperativismo
   * @param coop_nombre
   * @param coop_fecha
   * @param coop_nit
   * @param persona_id
   */
  public static function insert( $idcooperativismo,  $coop_nombre,  $coop_fecha,  $coop_nit,  $persona_id){
      $cooperativismo = new Cooperativismo();
      $cooperativismo->setIdcooperativismo($idcooperativismo); 
      $cooperativismo->setCoop_nombre($coop_nombre); 
      $cooperativismo->setCoop_fecha($coop_fecha); 
      $cooperativismo->setCoop_nit($coop_nit); 
      $cooperativismo->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cooperativismoDao =$FactoryDao->getcooperativismoDao(self::getDataBaseDefault());
     $rtn = $cooperativismoDao->insert($cooperativismo);
     $cooperativismoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Cooperativismo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcooperativismo
   * @return El objeto en base de datos o Null
   */
  public static function select($idcooperativismo){
      $cooperativismo = new Cooperativismo();
      $cooperativismo->setIdcooperativismo($idcooperativismo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cooperativismoDao =$FactoryDao->getcooperativismoDao(self::getDataBaseDefault());
     $result = $cooperativismoDao->select($cooperativismo);
     $cooperativismoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cooperativismo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcooperativismo
   * @param coop_nombre
   * @param coop_fecha
   * @param coop_nit
   * @param persona_id
   */
  public static function update($idcooperativismo, $coop_nombre, $coop_fecha, $coop_nit, $persona_id){
      $cooperativismo = self::select($idcooperativismo);
      $cooperativismo->setCoop_nombre($coop_nombre); 
      $cooperativismo->setCoop_fecha($coop_fecha); 
      $cooperativismo->setCoop_nit($coop_nit); 
      $cooperativismo->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cooperativismoDao =$FactoryDao->getcooperativismoDao(self::getDataBaseDefault());
     $cooperativismoDao->update($cooperativismo);
     $cooperativismoDao->close();
  }

  /**
   * Elimina un objeto Cooperativismo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcooperativismo
   */
  public static function delete($idcooperativismo){
      $cooperativismo = new Cooperativismo();
      $cooperativismo->setIdcooperativismo($idcooperativismo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cooperativismoDao =$FactoryDao->getcooperativismoDao(self::getDataBaseDefault());
     $cooperativismoDao->delete($cooperativismo);
     $cooperativismoDao->close();
  }

  /**
   * Lista todos los objetos Cooperativismo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cooperativismo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cooperativismoDao =$FactoryDao->getcooperativismoDao(self::getDataBaseDefault());
     $result = $cooperativismoDao->listAll();
     $cooperativismoDao->close();
     return $result;
  }


}
//That´s all folks!