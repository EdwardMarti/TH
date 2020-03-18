<?php

require_once realpath('../../facade/GlobalController.php');

require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dao/interfaz/IPersonaDao.php');

require_once realpath('../../dto/Persona.php');
require_once realpath('../../dto/Domicilio.php');
//banco
require_once realpath('../../dto/Fechas_particulares.php');
require_once realpath('../../dto/Estudio.php');
//cooperativismo
//varios
require_once realpath('../../dto/Salud_pension.php');

require_once realpath('../../dto/Cargo.php');
require_once realpath('../../dto/Empresa.php');
require_once realpath('../../dto/Area_empresa.php');
require_once realpath('../../dto/Cargo_empreso.php');
require_once realpath('../../dto/Puesto.php');

require_once realpath('../../dto/Nivel_vigilancia.php');
require_once realpath('../../dto/Tipo_vigilancia.php');


class Todo {

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
  
  public static function registrarTodo($persona, $direccion, $banco, $fechas, $estudio, $cooperativismo, $varios, $salud, $cargo, $celular,  $familiares){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->registrarTodo(
      $persona, 
      $direccion, 
      $banco, 
      $fechas, 
      $estudio, 
      $cooperativismo,
       $varios, 
       $salud, 
       $cargo, 
       explode(";", $celular), 
       $familiares
     );
     $personaDao->close();
     return $result;
  }
  
  public static function datos(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->datos();
     $personaDao->close();
     return $result;
  }


}
