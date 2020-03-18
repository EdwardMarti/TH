<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Empresa.php');
require_once realpath('../../dto/Cargo_empreso.php');
require_once realpath('../../dao/interfaz/IEmpresaDao.php');

class EmpresaFacade {

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
   * Crea un objeto Empresa a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idempresa
   * @param nombre_empresa
   * @param nit_empresa
   * @param direccion_empresa
   */
  public static function insert(   $nombre_empresa,  $nit_empresa,  $direccion_empresa,$Empresa_p_idEmpresa_p){
      $empresa = new Empresa();
//      $empresa->setIdempresa($idempresa); 
      $empresa->setNombre_empresa($nombre_empresa); 
      $empresa->setNit_empresa($nit_empresa); 
      $empresa->setDireccion_empresa($direccion_empresa); 
      $empresa->setEmpresa_p_idEmpresa_p($Empresa_p_idEmpresa_p); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $rtn = $empresaDao->insert($empresa);
     $empresaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idempresa
   * @return El objeto en base de datos o Null
   */
  public static function select($idempresa){
      $empresa = new Empresa();
      $empresa->setIdempresa($idempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $result = $empresaDao->select($empresa);
     $empresaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Empresa  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idempresa
   * @param nombre_empresa
   * @param nit_empresa
   * @param direccion_empresa
   */
  public static function update($idempresa, $nombre_empresa, $nit_empresa, $direccion_empresa){
      $empresa = self::select($idempresa);
      $empresa->setNombre_empresa($nombre_empresa); 
      $empresa->setNit_empresa($nit_empresa); 
      $empresa->setDireccion_empresa($direccion_empresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $empresaDao->update($empresa);
     $empresaDao->close();
  }

  /**
   * Elimina un objeto Empresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idempresa
   */
  public static function delete($idempresa){
      $empresa = new Empresa();
      $empresa->setIdempresa($idempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $empresaDao->delete($empresa);
     $empresaDao->close();
  }

  /**
   * Lista todos los objetos Empresa de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Empresa en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $result = $empresaDao->listAll();
     $empresaDao->close();
     return $result;
  }
  /**
   * Lista todos los objetos Empresa de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Empresa en base de datos o Null
   */
  public static function listAll_sucursal($emp){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresaDao =$FactoryDao->getempresaDao(self::getDataBaseDefault());
     $result = $empresaDao->listAll_sucursal($emp);
     $empresaDao->close();
     return $result;
  }


}
//That´s all folks!