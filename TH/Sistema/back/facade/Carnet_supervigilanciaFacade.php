<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Carnet_supervigilancia.php');
require_once realpath('../../dao/interfaz/ICarnet_supervigilanciaDao.php');

class Carnet_supervigilanciaFacade {

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
   * Crea un objeto Carnet_supervigilancia a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcarne
   * @param carnet_nombre
   */
  public static function insert( $idcarne,  $carnet_nombre){
      $carnet_supervigilancia = new Carnet_supervigilancia();
      $carnet_supervigilancia->setIdcarne($idcarne); 
      $carnet_supervigilancia->setCarnet_nombre($carnet_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $carnet_supervigilanciaDao =$FactoryDao->getcarnet_supervigilanciaDao(self::getDataBaseDefault());
     $rtn = $carnet_supervigilanciaDao->insert($carnet_supervigilancia);
     $carnet_supervigilanciaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Carnet_supervigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcarne
   * @return El objeto en base de datos o Null
   */
  public static function select($idcarne){
      $carnet_supervigilancia = new Carnet_supervigilancia();
      $carnet_supervigilancia->setIdcarne($idcarne); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $carnet_supervigilanciaDao =$FactoryDao->getcarnet_supervigilanciaDao(self::getDataBaseDefault());
     $result = $carnet_supervigilanciaDao->select($carnet_supervigilancia);
     $carnet_supervigilanciaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Carnet_supervigilancia  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcarne
   * @param carnet_nombre
   */
  public static function update($idcarne, $carnet_nombre){
      $carnet_supervigilancia = self::select($idcarne);
      $carnet_supervigilancia->setCarnet_nombre($carnet_nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $carnet_supervigilanciaDao =$FactoryDao->getcarnet_supervigilanciaDao(self::getDataBaseDefault());
     $carnet_supervigilanciaDao->update($carnet_supervigilancia);
     $carnet_supervigilanciaDao->close();
  }

  /**
   * Elimina un objeto Carnet_supervigilancia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcarne
   */
  public static function delete($idcarne){
      $carnet_supervigilancia = new Carnet_supervigilancia();
      $carnet_supervigilancia->setIdcarne($idcarne); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $carnet_supervigilanciaDao =$FactoryDao->getcarnet_supervigilanciaDao(self::getDataBaseDefault());
     $carnet_supervigilanciaDao->delete($carnet_supervigilancia);
     $carnet_supervigilanciaDao->close();
  }

  /**
   * Lista todos los objetos Carnet_supervigilancia de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Carnet_supervigilancia en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $carnet_supervigilanciaDao =$FactoryDao->getcarnet_supervigilanciaDao(self::getDataBaseDefault());
     $result = $carnet_supervigilanciaDao->listAll();
     $carnet_supervigilanciaDao->close();
     return $result;
  }


}
//That´s all folks!