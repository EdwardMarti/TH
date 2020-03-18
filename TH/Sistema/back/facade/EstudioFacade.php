<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Estudio.php');
require_once realpath('../../dao/interfaz/IEstudioDao.php');
require_once realpath('../../dto/Persona.php');

class EstudioFacade {

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
   * Crea un objeto Estudio a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param nivel_academico
   * @param nivel_vigilancia
   * @param fecha_curso
   * @param id
   * @param persona_id
   */
  public static function insert( $nivel_academico,  $nivel_vigilancia,  $fecha_curso,  $id,  $persona_id){
      $estudio = new Estudio();
      $estudio->setNivel_academico($nivel_academico); 
      $estudio->setNivel_vigilancia($nivel_vigilancia); 
      $estudio->setFecha_curso($fecha_curso); 
      $estudio->setId($id); 
      $estudio->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudioDao =$FactoryDao->getestudioDao(self::getDataBaseDefault());
     $rtn = $estudioDao->insert($estudio);
     $estudioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estudio de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $estudio = new Estudio();
      $estudio->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudioDao =$FactoryDao->getestudioDao(self::getDataBaseDefault());
     $result = $estudioDao->select($estudio);
     $estudioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estudio  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param nivel_academico
   * @param nivel_vigilancia
   * @param fecha_curso
   * @param id
   * @param persona_id
   */
  public static function update($nivel_academico, $nivel_vigilancia, $fecha_curso, $id, $persona_id){
      $estudio = self::select($id);
      $estudio->setNivel_academico($nivel_academico); 
      $estudio->setNivel_vigilancia($nivel_vigilancia); 
      $estudio->setFecha_curso($fecha_curso); 
      $estudio->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudioDao =$FactoryDao->getestudioDao(self::getDataBaseDefault());
     $estudioDao->update($estudio);
     $estudioDao->close();
  }

  /**
   * Elimina un objeto Estudio de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $estudio = new Estudio();
      $estudio->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudioDao =$FactoryDao->getestudioDao(self::getDataBaseDefault());
     $estudioDao->delete($estudio);
     $estudioDao->close();
  }

  /**
   * Lista todos los objetos Estudio de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estudio en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudioDao =$FactoryDao->getestudioDao(self::getDataBaseDefault());
     $result = $estudioDao->listAll();
     $estudioDao->close();
     return $result;
  }


}
//That´s all folks!