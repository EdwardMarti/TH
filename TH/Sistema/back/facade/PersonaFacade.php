<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Persona.php');
require_once realpath('../../dao/interfaz/IPersonaDao.php');
require_once realpath('../../dto/Cargo.php');
require_once realpath('../../dto/Nivel_vigilancia.php');
require_once realpath('../../dto/Tipo_vigilancia.php');

class PersonaFacade {

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
   * Crea un objeto Persona a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param cedula
   * @param nacionalidad
   * @param cedula_lugar_expedicion
   * @param nombres
   * @param apellidos
   * @param fechaNacimiento
   * @param lugar_nacimiento
   * @param sexo
   * @param grupo_sanguineo
   * @param estado_civil
   * @param correo
   * @param estado
   * @param cargo_id
   * @param nivel_vigilancia_id
   * @param tipo_vigilancia_id
   */
  public static function insert( $id,  $cedula,  $nacionalidad,  $cedula_lugar_expedicion,  $nombres,  $apellidos,  $fechaNacimiento,  $lugar_nacimiento,  $sexo,  $grupo_sanguineo,  $estado_civil,  $correo,  $estado,  $cargo_id,  $nivel_vigilancia_id_p,  $tipo_vigilancia_id){
      $persona = new Persona();
      $persona->setId($id); 
      $persona->setCedula($cedula); 
      $persona->setNacionalidad($nacionalidad); 
      $persona->setCedula_lugar_expedicion($cedula_lugar_expedicion); 
      $persona->setNombres($nombres); 
      $persona->setApellidos($apellidos); 
      $persona->setFechaNacimiento($fechaNacimiento); 
      $persona->setLugar_nacimiento($lugar_nacimiento); 
      $persona->setSexo($sexo); 
      $persona->setGrupo_sanguineo($grupo_sanguineo); 
      $persona->setEstado_civil($estado_civil); 
      $persona->setCorreo($correo); 
      $persona->setEstado($estado); 
      $persona->setCargo_id($cargo_id); 
      $persona->setNivel_vigilancia_id_p($nivel_vigilancia_id_p); 
      $persona->setTipo_vigilancia_id($tipo_vigilancia_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $rtn = $personaDao->insert($persona);
     $personaDao->close();
     return $rtn;
  }
  
    public static function insert_1( $cedula,  $nacionalidad,    $nombres,  $apellidos,  $correo,$estado){
      $persona = new Persona();
      $persona->setCedula($cedula); 
      $persona->setNacionalidad($nacionalidad); 
     
      $persona->setNombres($nombres); 
      $persona->setApellidos($apellidos); 
     
      $persona->setCorreo($correo); 
       $persona->setEstado($estado); 


     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $rtn = $personaDao->insert_1($persona);
     $personaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Persona de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $persona = new Persona();
      $persona->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->select($persona);
     $personaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Persona  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param cedula
   * @param nacionalidad
   * @param cedula_lugar_expedicion
   * @param nombres
   * @param apellidos
   * @param fechaNacimiento
   * @param lugar_nacimiento
   * @param sexo
   * @param grupo_sanguineo
   * @param estado_civil
   * @param correo
   * @param estado
   * @param cargo_id
   * @param nivel_vigilancia_id
   * @param tipo_vigilancia_id
   */
  public static function update($id, $cedula, $nacionalidad, $cedula_lugar_expedicion, $nombres, $apellidos, $fechaNacimiento, $lugar_nacimiento, $sexo, $grupo_sanguineo, $estado_civil, $correo, $estado, $cargo_id, $nivel_vigilancia_id_p, $tipo_vigilancia_id){
      $persona = self::select($id);
      $persona->setCedula($cedula); 
      $persona->setNacionalidad($nacionalidad); 
      $persona->setCedula_lugar_expedicion($cedula_lugar_expedicion); 
      $persona->setNombres($nombres); 
      $persona->setApellidos($apellidos); 
      $persona->setFechaNacimiento($fechaNacimiento); 
      $persona->setLugar_nacimiento($lugar_nacimiento); 
      $persona->setSexo($sexo); 
      $persona->setGrupo_sanguineo($grupo_sanguineo); 
      $persona->setEstado_civil($estado_civil); 
      $persona->setCorreo($correo); 
      $persona->setEstado($estado); 
      $persona->setCargo_id($cargo_id); 
      $persona->setNivel_vigilancia_id_p($nivel_vigilancia_id); 
      $persona->setTipo_vigilancia_id($tipo_vigilancia_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $personaDao->update($persona);
     $personaDao->close();
  }
  public static function updateCargo($id, $cargo_id){
//      $persona = self::select($id);
     // $persona->setCedula($id); 
     // $persona->setNacionalidad($cargo_id); 
     
//      $persona->setCargo_id($cargo_id); 
      
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $personaDao->updateCargo($id, $cargo_id);
     $personaDao->close();
  }

  /**
   * Elimina un objeto Persona de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $persona = new Persona();
      $persona->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $personaDao->delete($persona);
     $personaDao->close();
  }

  /**
   * Lista todos los objetos Persona de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Persona en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->listAll();
     $personaDao->close();
     return $result;
  }
  public static function select_actCargo($emp){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->select_actCargo($emp);
     $personaDao->close();
     return $result;
  }
  public static function listAll_tabla($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->listAll_tabla1($id);
     $personaDao->close();
     return $result;
  }
  public static function listAll_select_viewP($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->select_viewP2($id);
     $personaDao->close();
     return $result;
  }
  public static function listAll_select_viewP2($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->select_viewP2($id);
     $personaDao->close();
     return $result;
  }

  public static function listXuser($i){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->listXuser($i);
     $personaDao->close();
     return $result;
  }
  public static function listXID($i){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->listXID($i);
     $personaDao->close();
     return $result;
  }

}
//That´s all folks!