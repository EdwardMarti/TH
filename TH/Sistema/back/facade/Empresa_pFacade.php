<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Empresa_p.php');
require_once realpath('../../dao/interfaz/IEmpresa_pDao.php');

class Empresa_pFacade {

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
   * Crea un objeto Empresa_p a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEmpresa_p
   * @param empresa_p_nombre
   * @param nit_empresa_p
   * @param empresa_p_direccion
   * @param empresa_p_tel
   */
  public static function insert(  $empresa_p_nombre,  $nit_empresa_p,  $empresa_p_direccion,  $empresa_p_tel){
      $empresa_p = new Empresa_p();
     
      $empresa_p->setEmpresa_p_nombre($empresa_p_nombre); 
      $empresa_p->setNit_empresa_p($nit_empresa_p); 
      $empresa_p->setEmpresa_p_direccion($empresa_p_direccion); 
      $empresa_p->setEmpresa_p_tel($empresa_p_tel); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresa_pDao =$FactoryDao->getempresa_pDao(self::getDataBaseDefault());
     $rtn = $empresa_pDao->insert($empresa_p);
     $empresa_pDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Empresa_p de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEmpresa_p
   * @return El objeto en base de datos o Null
   */
  public static function select($idEmpresa_p){
      $empresa_p = new Empresa_p();
      $empresa_p->setIdEmpresa_p($idEmpresa_p); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresa_pDao =$FactoryDao->getempresa_pDao(self::getDataBaseDefault());
     $result = $empresa_pDao->select($empresa_p);
     $empresa_pDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Empresa_p  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEmpresa_p
   * @param empresa_p_nombre
   * @param nit_empresa_p
   * @param empresa_p_direccion
   * @param empresa_p_tel
   */
  public static function update($idEmpresa_p, $empresa_p_nombre, $nit_empresa_p, $empresa_p_direccion, $empresa_p_tel){
     $empresa_p = self::select($idEmpresa_p);
    //    $empresa_p = new Empresa_p();
      $empresa_p->setEmpresa_p_nombre($empresa_p_nombre); 
      $empresa_p->setNit_empresa_p($nit_empresa_p); 
      $empresa_p->setEmpresa_p_direccion($empresa_p_direccion); 
      $empresa_p->setEmpresa_p_tel($empresa_p_tel); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresa_pDao =$FactoryDao->getempresa_pDao(self::getDataBaseDefault());
     $empresa_pDao->update($empresa_p);
     $empresa_pDao->close();
  }

  /**
   * Elimina un objeto Empresa_p de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idEmpresa_p
   */
  public static function delete($idEmpresa_p){
      $empresa_p = new Empresa_p();
      $empresa_p->setIdEmpresa_p($idEmpresa_p); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresa_pDao =$FactoryDao->getempresa_pDao(self::getDataBaseDefault());
     $empresa_pDao->delete($empresa_p);
     $empresa_pDao->close();
  }

  /**
   * Lista todos los objetos Empresa_p de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Empresa_p en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $empresa_pDao =$FactoryDao->getempresa_pDao(self::getDataBaseDefault());
     $result = $empresa_pDao->listAll();
     $empresa_pDao->close();
     return $result;
  }


}
//That´s all folks!