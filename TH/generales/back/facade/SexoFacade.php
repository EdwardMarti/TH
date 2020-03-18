<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Sexo.php');
require_once realpath('../../dao/interfaz/ISexoDao.php');

class SexoFacade {

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
   * Crea un objeto Sexo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsexo
   * @param sexo_descripcion
   */
  public static function insert( $idsexo,  $sexo_descripcion){
      $sexo = new Sexo();
      $sexo->setIdsexo($idsexo); 
      $sexo->setSexo_descripcion($sexo_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sexoDao =$FactoryDao->getsexoDao(self::getDataBaseDefault());
     $rtn = $sexoDao->insert($sexo);
     $sexoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Sexo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsexo
   * @return El objeto en base de datos o Null
   */
  public static function select($idsexo){
      $sexo = new Sexo();
      $sexo->setIdsexo($idsexo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sexoDao =$FactoryDao->getsexoDao(self::getDataBaseDefault());
     $result = $sexoDao->select($sexo);
     $sexoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Sexo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsexo
   * @param sexo_descripcion
   */
  public static function update($idsexo, $sexo_descripcion){
      $sexo = self::select($idsexo);
      $sexo->setSexo_descripcion($sexo_descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sexoDao =$FactoryDao->getsexoDao(self::getDataBaseDefault());
     $sexoDao->update($sexo);
     $sexoDao->close();
  }

  /**
   * Elimina un objeto Sexo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsexo
   */
  public static function delete($idsexo){
      $sexo = new Sexo();
      $sexo->setIdsexo($idsexo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sexoDao =$FactoryDao->getsexoDao(self::getDataBaseDefault());
     $sexoDao->delete($sexo);
     $sexoDao->close();
  }

  /**
   * Lista todos los objetos Sexo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Sexo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sexoDao =$FactoryDao->getsexoDao(self::getDataBaseDefault());
     $result = $sexoDao->listAll();
     $sexoDao->close();
     return $result;
  }


}
//That´s all folks!