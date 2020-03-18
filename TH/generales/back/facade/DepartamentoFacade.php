<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Departamento.php');
require_once realpath('../../dao/interfaz/IDepartamentoDao.php');
require_once realpath('../../dto/Pais.php');

class DepartamentoFacade {

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
   * Crea un objeto Departamento a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param iddepartamento
   * @param departamento_descripcion
   * @param pais_idpais
   */
  public static function insert( $iddepartamento,  $departamento_descripcion,  $pais_idpais){
      $departamento = new Departamento();
      $departamento->setIddepartamento($iddepartamento); 
      $departamento->setDepartamento_descripcion($departamento_descripcion); 
      $departamento->setPais_idpais($pais_idpais); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $rtn = $departamentoDao->insert($departamento);
     $departamentoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Departamento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param iddepartamento
   * @return El objeto en base de datos o Null
   */
  public static function select($iddepartamento){
      $departamento = new Departamento();
      $departamento->setIddepartamento($iddepartamento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->select($departamento);
     $departamentoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Departamento  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param iddepartamento
   * @param departamento_descripcion
   * @param pais_idpais
   */
  public static function update($iddepartamento, $departamento_descripcion, $pais_idpais){
      $departamento = self::select($iddepartamento);
      $departamento->setDepartamento_descripcion($departamento_descripcion); 
      $departamento->setPais_idpais($pais_idpais); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $departamentoDao->update($departamento);
     $departamentoDao->close();
  }

  /**
   * Elimina un objeto Departamento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param iddepartamento
   */
  public static function delete($iddepartamento){
      $departamento = new Departamento();
      $departamento->setIddepartamento($iddepartamento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $departamentoDao->delete($departamento);
     $departamentoDao->close();
  }

  /**
   * Lista todos los objetos Departamento de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Departamento en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->listAll();
     $departamentoDao->close();
     return $result;
  }


}
//That´s all folks!