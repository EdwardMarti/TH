<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Anarchy! Apoyando la vagancia desde 2017  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Usuario.php');
require_once realpath('../../dao/interfaz/IUsuarioDao.php');
require_once realpath('../../dto/Cargo_empreso.php');
require_once realpath('../../dto/Roll.php');

class UsuarioFacade {

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
   * Crea un objeto Usuario a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @param usuario_nombre
   * @param usuario_correo
   * @param usuario_pass
   * @param cargo_empreso_idcargo
   * @param user_activation_code
   * @param user_email_status
   * @param roll_idroll
   */
  public static function insert( $idusuario,  $usuario_nombre,  $usuario_correo,  $usuario_pass,  $cargo_empreso_idcargo,  $user_activation_code,  $user_email_status,  $roll_idroll){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 
      $usuario->setUsuario_nombre($usuario_nombre); 
      $usuario->setUsuario_correo($usuario_correo); 
      $usuario->setUsuario_pass($usuario_pass); 
      $usuario->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $usuario->setUser_activation_code($user_activation_code); 
      $usuario->setUser_email_status($user_email_status); 
      $usuario->setRoll_idroll($roll_idroll); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $rtn = $usuarioDao->insert($usuario);
     $usuarioDao->close();
     return $rtn;
  }
  public static function insert_1($cedula,  $usuario_nombre,  $usuario_correo,  $usuario_pass,  $cargo_empreso_idcargo,  $user_activation_code,  $user_email_status,  $roll_idroll){
      
      $usuario = new Usuario();
      $usuario->setIdusuario($cedula); 
     
      $usuario->setUsuario_nombre($usuario_nombre); 
      $usuario->setUsuario_correo($usuario_correo); 
      $usuario->setUsuario_pass($usuario_pass); 
      $usuario->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $usuario->setUser_activation_code($user_activation_code); 
      $usuario->setUser_email_status($user_email_status); 
      $usuario->setRoll_idroll($roll_idroll); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $rtn = $usuarioDao->insert_1($usuario);
     $usuarioDao->close();
     return $rtn;
  }
  
  
  public static function update_pass($idusuario,  $usuario_pass, $usuario_pass_nueva){
      
//      $usuario = new Usuario();
//       $usuario->setIdusuario($idusuario); 
//       $usuario->setUsuario_nombre($usuario_nombre); 
//    
//      $usuario->setUsuario_pass($usuario_pass); 
      
    $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $rtn = $usuarioDao->update_pass($idusuario,  $usuario_pass, $usuario_pass_nueva);
     $usuarioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @return El objeto en base de datos o Null
   */
  public static function select($idusuario){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->select($usuario);
     $usuarioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Usuario  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @param usuario_nombre
   * @param usuario_correo
   * @param usuario_pass
   * @param cargo_empreso_idcargo
   * @param user_activation_code
   * @param user_email_status
   * @param roll_idroll
   */
  public static function update($idusuario, $usuario_nombre, $usuario_correo, $usuario_pass, $cargo_empreso_idcargo, $user_activation_code, $user_email_status, $roll_idroll){
      $usuario = self::select($idusuario);
      $usuario->setUsuario_nombre($usuario_nombre); 
      $usuario->setUsuario_correo($usuario_correo); 
      $usuario->setUsuario_pass($usuario_pass); 
      $usuario->setCargo_empreso_idcargo($cargo_empreso_idcargo); 
      $usuario->setUser_activation_code($user_activation_code); 
      $usuario->setUser_email_status($user_email_status); 
      $usuario->setRoll_idroll($roll_idroll); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->update($usuario);
     $usuarioDao->close();
  }

  /**
   * Elimina un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   */
  public static function delete($idusuario){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->delete($usuario);
     $usuarioDao->close();
  }

  /**
   * Lista todos los objetos Usuario de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Usuario en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->listAll();
     $usuarioDao->close();
     return $result;
  }
  public static function listAll_User(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->listAll_User();
     $usuarioDao->close();
     return $result;
  }
  public static function loginUsers($usuario){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->loginUsers($usuario);
     $usuarioDao->close();
     return $result;
  }


}
//That´s all folks!