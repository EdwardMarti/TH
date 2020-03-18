<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Cargo_empreso.php');
require_once realpath('../../dao/interfaz/ICargo_empresoDao.php');

class Cargo_empresoFacade {

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
   * Crea un objeto Cargo_empreso a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcargo
   * @param nom_cargo
   * @param area_empresa_idarea_emp
   */
  public static function insert(  $nom_cargo,  $area_empresa_idarea_emp){
      $cargo_empreso = new Cargo_empreso();
//      $cargo_empreso->setIdcargo($idcargo); 
      $cargo_empreso->setNom_cargo($nom_cargo); 
      $cargo_empreso->setArea_empresa_idarea_emp($area_empresa_idarea_emp); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $rtn = $cargo_empresoDao->insert($cargo_empreso);
     $cargo_empresoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Cargo_empreso de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcargo
   * @return El objeto en base de datos o Null
   */
  public static function select($idcargo){
      $cargo_empreso = new Cargo_empreso();
      $cargo_empreso->setIdcargo($idcargo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $result = $cargo_empresoDao->select($cargo_empreso);
     $cargo_empresoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cargo_empreso  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcargo
   * @param nom_cargo
   * @param area_empresa_idarea_emp
   */
  public static function update($idcargo, $nom_cargo){
      $cargo_empreso = self::select($idcargo);
      $cargo_empreso->setNom_cargo($nom_cargo); 
    //  $cargo_empreso->setArea_empresa_idarea_emp($area_empresa_idarea_emp); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $cargo_empresoDao->update($cargo_empreso);
     $cargo_empresoDao->close();
  }

  /**
   * Elimina un objeto Cargo_empreso de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcargo
   */
  public static function delete($idcargo){
      $cargo_empreso = new Cargo_empreso();
      $cargo_empreso->setIdcargo($idcargo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $cargo_empresoDao->delete($cargo_empreso);
     $cargo_empresoDao->close();
  }

  /**
   * Lista todos los objetos Cargo_empreso de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cargo_empreso en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $result = $cargo_empresoDao->listAll();
     $cargo_empresoDao->close();
     return $result;
  }
  public static function listCargoXArea($area){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $result = $cargo_empresoDao->listCargoXArea($area);
     $cargo_empresoDao->close();
     return $result;
  }
  public static function listCargoXAreaXEmpresa($area){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cargo_empresoDao =$FactoryDao->getcargo_empresoDao(self::getDataBaseDefault());
     $result = $cargo_empresoDao->listCargoXAreaXEmpresa($area);
     $cargo_empresoDao->close();
     return $result;
  }


}
//That´s all folks!