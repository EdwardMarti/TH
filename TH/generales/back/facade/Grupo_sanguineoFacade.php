<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Grupo_sanguineo.php');
require_once realpath('../../dao/interfaz/IGrupo_sanguineoDao.php');

class Grupo_sanguineoFacade {

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
   * Crea un objeto Grupo_sanguineo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idgrupo_sanguineo
   * @param grupo_sanguineo_nombre
   */
  public static function insert( $idgrupo_sanguineo,  $grupo_sanguineo_nombre){
      $grupo_sanguineo = new Grupo_sanguineo();
      $grupo_sanguineo->setIdgrupo_sanguineo($idgrupo_sanguineo); 
      $grupo_sanguineo->setGrupo_sanguineo_nombre($grupo_sanguineo_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_sanguineoDao =$FactoryDao->getgrupo_sanguineoDao(self::getDataBaseDefault());
     $rtn = $grupo_sanguineoDao->insert($grupo_sanguineo);
     $grupo_sanguineoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_sanguineo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idgrupo_sanguineo
   * @return El objeto en base de datos o Null
   */
  public static function select($idgrupo_sanguineo){
      $grupo_sanguineo = new Grupo_sanguineo();
      $grupo_sanguineo->setIdgrupo_sanguineo($idgrupo_sanguineo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_sanguineoDao =$FactoryDao->getgrupo_sanguineoDao(self::getDataBaseDefault());
     $result = $grupo_sanguineoDao->select($grupo_sanguineo);
     $grupo_sanguineoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_sanguineo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idgrupo_sanguineo
   * @param grupo_sanguineo_nombre
   */
  public static function update($idgrupo_sanguineo, $grupo_sanguineo_nombre){
      $grupo_sanguineo = self::select($idgrupo_sanguineo);
      $grupo_sanguineo->setGrupo_sanguineo_nombre($grupo_sanguineo_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_sanguineoDao =$FactoryDao->getgrupo_sanguineoDao(self::getDataBaseDefault());
     $grupo_sanguineoDao->update($grupo_sanguineo);
     $grupo_sanguineoDao->close();
  }

  /**
   * Elimina un objeto Grupo_sanguineo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idgrupo_sanguineo
   */
  public static function delete($idgrupo_sanguineo){
      $grupo_sanguineo = new Grupo_sanguineo();
      $grupo_sanguineo->setIdgrupo_sanguineo($idgrupo_sanguineo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_sanguineoDao =$FactoryDao->getgrupo_sanguineoDao(self::getDataBaseDefault());
     $grupo_sanguineoDao->delete($grupo_sanguineo);
     $grupo_sanguineoDao->close();
  }

  /**
   * Lista todos los objetos Grupo_sanguineo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_sanguineo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_sanguineoDao =$FactoryDao->getgrupo_sanguineoDao(self::getDataBaseDefault());
     $result = $grupo_sanguineoDao->listAll();
     $grupo_sanguineoDao->close();
     return $result;
  }


}
//That´s all folks!