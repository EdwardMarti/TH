<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Area_empresa.php');
require_once realpath('../../dao/interfaz/IArea_empresaDao.php');
require_once realpath('../../dto/Empresa.php');

class Area_empresaFacade {

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
   * Crea un objeto Area_empresa a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarea_emp
   * @param nom_area
   * @param empresa_idempresa
   */
  public static function insert(  $nom_area,  $empresa_idempresa){
      $area_empresa = new Area_empresa();
//      $area_empresa->setIdarea_emp($idarea_emp); 
      $area_empresa->setNom_area($nom_area); 
      $area_empresa->setEmpresa_idempresa($empresa_idempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $rtn = $area_empresaDao->insert($area_empresa);
     $area_empresaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Area_empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarea_emp
   * @return El objeto en base de datos o Null
   */
  public static function select($idarea_emp){
      $area_empresa = new Area_empresa();
      $area_empresa->setIdarea_emp($idarea_emp); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $result = $area_empresaDao->select($area_empresa);
     $area_empresaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Area_empresa  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarea_emp
   * @param nom_area
   * @param empresa_idempresa
   */
  public static function update($idarea_emp, $nom_area){
      $area_empresa = new Area_empresa();
      $area_empresa->setIdarea_emp($idarea_emp);
      $area_empresa->setNom_area($nom_area); 
//      $area_empresa->setEmpresa_idempresa($empresa_idempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
      $result = $area_empresaDao->update_1($area_empresa);
     $area_empresaDao->close();
        return $result;
  }

  /**
   * Elimina un objeto Area_empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idarea_emp
   */
  public static function delete($idarea_emp){
      $area_empresa = new Area_empresa();
      $area_empresa->setIdarea_emp($idarea_emp); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $area_empresaDao->delete($area_empresa);
     $area_empresaDao->close();
  }

  /**
   * Lista todos los objetos Area_empresa de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Area_empresa en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $result = $area_empresaDao->listAll();
     $area_empresaDao->close();
     return $result;
  }

public static function listAreaXEmpresa($empresa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $result = $area_empresaDao->listAreaXEmpresa($empresa);
     $area_empresaDao->close();
     return $result;
  }
  
public static function listAreaXEmpresa_id($empresa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $result = $area_empresaDao->select($empresa);
     $area_empresaDao->close();
     return $result;
  }
public static function listAreaXEmpresa_1($empresa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $area_empresaDao =$FactoryDao->getarea_empresaDao(self::getDataBaseDefault());
     $result = $area_empresaDao->listAreaXEmpresa_1($empresa);
     $area_empresaDao->close();
     return $result;
  }
}
//That´s all folks!