<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Fechas_particulares.php');
require_once realpath('../../dao/interfaz/IFechas_particularesDao.php');
require_once realpath('../../dto/Persona.php');

class Fechas_particularesFacade {

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
   * Crea un objeto Fechas_particulares a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param estudio_seguridad
   * @param examen_medico
   * @param prueba_psicotecnica
   * @param id
   * @param persona_id
   */
  public static function insert( $estudio_seguridad,  $examen_medico,  $prueba_psicotecnica,  $id,  $persona_id){
      $fechas_particulares = new Fechas_particulares();
      $fechas_particulares->setEstudio_seguridad($estudio_seguridad); 
      $fechas_particulares->setExamen_medico($examen_medico); 
      $fechas_particulares->setPrueba_psicotecnica($prueba_psicotecnica); 
      $fechas_particulares->setId($id); 
      $fechas_particulares->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fechas_particularesDao =$FactoryDao->getfechas_particularesDao(self::getDataBaseDefault());
     $rtn = $fechas_particularesDao->insert($fechas_particulares);
     $fechas_particularesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fechas_particulares de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $fechas_particulares = new Fechas_particulares();
      $fechas_particulares->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fechas_particularesDao =$FactoryDao->getfechas_particularesDao(self::getDataBaseDefault());
     $result = $fechas_particularesDao->select($fechas_particulares);
     $fechas_particularesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fechas_particulares  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param estudio_seguridad
   * @param examen_medico
   * @param prueba_psicotecnica
   * @param id
   * @param persona_id
   */
  public static function update($estudio_seguridad, $examen_medico, $prueba_psicotecnica, $id, $persona_id){
      $fechas_particulares = self::select($id);
      $fechas_particulares->setEstudio_seguridad($estudio_seguridad); 
      $fechas_particulares->setExamen_medico($examen_medico); 
      $fechas_particulares->setPrueba_psicotecnica($prueba_psicotecnica); 
      $fechas_particulares->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fechas_particularesDao =$FactoryDao->getfechas_particularesDao(self::getDataBaseDefault());
     $fechas_particularesDao->update($fechas_particulares);
     $fechas_particularesDao->close();
  }

  /**
   * Elimina un objeto Fechas_particulares de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $fechas_particulares = new Fechas_particulares();
      $fechas_particulares->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fechas_particularesDao =$FactoryDao->getfechas_particularesDao(self::getDataBaseDefault());
     $fechas_particularesDao->delete($fechas_particulares);
     $fechas_particularesDao->close();
  }

  /**
   * Lista todos los objetos Fechas_particulares de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fechas_particulares en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fechas_particularesDao =$FactoryDao->getfechas_particularesDao(self::getDataBaseDefault());
     $result = $fechas_particularesDao->listAll();
     $fechas_particularesDao->close();
     return $result;
  }


}
//That´s all folks!