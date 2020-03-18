<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Banco.php');
require_once realpath('../../dao/interfaz/IBancoDao.php');
require_once realpath('../../dto/Persona.php');

class BancoFacade {

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
   * Crea un objeto Banco a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbanco
   * @param banco_nombre
   * @param numero_cuenta
   * @param persona_id
   */
  public static function insert( $idbanco,  $banco_nombre,  $numero_cuenta,  $persona_id){
      $banco = new Banco();
      $banco->setIdbanco($idbanco); 
      $banco->setBanco_nombre($banco_nombre); 
      $banco->setNumero_cuenta($numero_cuenta); 
      $banco->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $rtn = $bancoDao->insert($banco);
     $bancoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Banco de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbanco
   * @return El objeto en base de datos o Null
   */
  public static function select($idbanco){
      $banco = new Banco();
      $banco->setIdbanco($idbanco); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $result = $bancoDao->select($banco);
     $bancoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Banco  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbanco
   * @param banco_nombre
   * @param numero_cuenta
   * @param persona_id
   */
  public static function update($idbanco, $banco_nombre, $numero_cuenta, $persona_id){
      $banco = self::select($idbanco);
      $banco->setBanco_nombre($banco_nombre); 
      $banco->setNumero_cuenta($numero_cuenta); 
      $banco->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $bancoDao->update($banco);
     $bancoDao->close();
  }

  /**
   * Elimina un objeto Banco de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbanco
   */
  public static function delete($idbanco){
      $banco = new Banco();
      $banco->setIdbanco($idbanco); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $bancoDao->delete($banco);
     $bancoDao->close();
  }

  /**
   * Lista todos los objetos Banco de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Banco en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $result = $bancoDao->listAll();
     $bancoDao->close();
     return $result;
  }
  public static function listAll_id($banco){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $bancoDao =$FactoryDao->getbancoDao(self::getDataBaseDefault());
     $result = $bancoDao->select($banco);
     $bancoDao->close();
     return $result;
  }


}
//That´s all folks!