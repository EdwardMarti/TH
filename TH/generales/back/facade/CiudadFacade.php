<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo tengo un sueño. El sueño de que mis hijos vivan en un mundo con un único lenguaje de programación.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Ciudad.php');
require_once realpath('../../dao/interfaz/ICiudadDao.php');
require_once realpath('../../dto/Departamento.php');

class CiudadFacade {

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
   * Crea un objeto Ciudad a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idciudad
   * @param ciudad_descripcion
   * @param departamento_iddepartamento
   */
  public static function insert( $idciudad,  $ciudad_descripcion,  $departamento_iddepartamento){
      $ciudad = new Ciudad();
      $ciudad->setIdciudad($idciudad); 
      $ciudad->setCiudad_descripcion($ciudad_descripcion); 
      $ciudad->setDepartamento_iddepartamento($departamento_iddepartamento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $rtn = $ciudadDao->insert($ciudad);
     $ciudadDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Ciudad de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idciudad
   * @return El objeto en base de datos o Null
   */
  public static function select($idciudad){
      $ciudad = new Ciudad();
      $ciudad->setIdciudad($idciudad); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $result = $ciudadDao->select($ciudad);
     $ciudadDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Ciudad  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idciudad
   * @param ciudad_descripcion
   * @param departamento_iddepartamento
   */
  public static function update($idciudad, $ciudad_descripcion, $departamento_iddepartamento){
      $ciudad = self::select($idciudad);
      $ciudad->setCiudad_descripcion($ciudad_descripcion); 
      $ciudad->setDepartamento_iddepartamento($departamento_iddepartamento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $ciudadDao->update($ciudad);
     $ciudadDao->close();
  }

  /**
   * Elimina un objeto Ciudad de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idciudad
   */
  public static function delete($idciudad){
      $ciudad = new Ciudad();
      $ciudad->setIdciudad($idciudad); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $ciudadDao->delete($ciudad);
     $ciudadDao->close();
  }

  /**
   * Lista todos los objetos Ciudad de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Ciudad en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $result = $ciudadDao->listAll(); 
     $ciudadDao->close();
     return $result;
  }

public static function listXDepartamento($depa){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ciudadDao =$FactoryDao->getciudadDao(self::getDataBaseDefault());
     $result = $ciudadDao->listXDepartamento($depa);
     $ciudadDao->close();
     return $result;
  }
}
//That´s all folks!