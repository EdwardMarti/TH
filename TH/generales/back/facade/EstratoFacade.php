<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Estrato.php');
require_once realpath('../../dao/interfaz/IEstratoDao.php');

class EstratoFacade {

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
   * Crea un objeto Estrato a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestrato
   * @param estrato_nombre
   */
  public static function insert( $idestrato,  $estrato_nombre){
      $estrato = new Estrato();
      $estrato->setIdestrato($idestrato); 
      $estrato->setEstrato_nombre($estrato_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estratoDao =$FactoryDao->getestratoDao(self::getDataBaseDefault());
     $rtn = $estratoDao->insert($estrato);
     $estratoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estrato de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestrato
   * @return El objeto en base de datos o Null
   */
  public static function select($idestrato){
      $estrato = new Estrato();
      $estrato->setIdestrato($idestrato); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estratoDao =$FactoryDao->getestratoDao(self::getDataBaseDefault());
     $result = $estratoDao->select($estrato);
     $estratoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estrato  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestrato
   * @param estrato_nombre
   */
  public static function update($idestrato, $estrato_nombre){
      $estrato = self::select($idestrato);
      $estrato->setEstrato_nombre($estrato_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estratoDao =$FactoryDao->getestratoDao(self::getDataBaseDefault());
     $estratoDao->update($estrato);
     $estratoDao->close();
  }

  /**
   * Elimina un objeto Estrato de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idestrato
   */
  public static function delete($idestrato){
      $estrato = new Estrato();
      $estrato->setIdestrato($idestrato); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estratoDao =$FactoryDao->getestratoDao(self::getDataBaseDefault());
     $estratoDao->delete($estrato);
     $estratoDao->close();
  }

  /**
   * Lista todos los objetos Estrato de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estrato en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estratoDao =$FactoryDao->getestratoDao(self::getDataBaseDefault());
     $result = $estratoDao->listAll();
     $estratoDao->close();
     return $result;
  }


}
//That´s all folks!