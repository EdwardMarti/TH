<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\

include_once realpath('../../dao/interfaz/IUsuarioDao.php');
include_once realpath('../../dto/Usuario.php');
include_once realpath('../../dto/Cargo_empreso.php');
include_once realpath('../../dto/Roll.php');

class UsuarioDao implements IUsuarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Usuario en la base de datos.
     * @param usuario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuario){
      $idusuario=$usuario->getIdusuario();
      $cedula=$usuario->getCedula();
$usuario_nombre=$usuario->getUsuario_nombre();
$usuario_correo=$usuario->getUsuario_correo();
$usuario_pass=$usuario->getUsuario_pass();
$cargo_empreso_idcargo=$usuario->getCargo_empreso_idcargo()->getIdcargo();
$user_activation_code=$usuario->getUser_activation_code();
$user_email_status=$usuario->getUser_email_status();
$roll_idroll=$usuario->getRoll_idroll()->getIdroll();

      try {
          $sql= "INSERT INTO `usuario`( `idusuario`,`cedula`, `usuario_nombre`, `usuario_correo`, `usuario_pass`, `cargo_empreso_idcargo`, `user_activation_code`, `user_email_status`, `roll_idroll`)"
          ."VALUES ('$idusuario','$cedula','$usuario_nombre','$usuario_correo','$usuario_pass','$cargo_empreso_idcargo','$user_activation_code','$user_email_status','$roll_idroll')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
      /**
     * Guarda un objeto Usuario en la base de datos.
     * @param usuario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert_1($usuario){
//      $idusuario=$usuario->getIdusuario();
       $cedula=$usuario->getCedula();
$usuario_nombre=$usuario->getUsuario_nombre();
$usuario_correo=$usuario->getUsuario_correo();
$usuario_pass=$usuario->getUsuario_pass();
$cargo_empreso_idcargo=$usuario->getCargo_empreso_idcargo()->getIdcargo();
$user_activation_code=$usuario->getUser_activation_code();
$user_email_status=$usuario->getUser_email_status();
$roll_idroll=$usuario->getRoll_idroll()->getIdroll();

    try {
          $sql= "INSERT INTO `usuario`( `cedula`, `usuario_nombre`, `usuario_correo`, `usuario_pass`, `cargo_empreso_idcargo`, `user_activation_code`, `user_email_status`, `roll_idroll`)"
          ."VALUES ('$cedula','$usuario_nombre','$usuario_correo','$usuario_pass','$cargo_empreso_idcargo','$user_activation_code','$user_email_status','$roll_idroll')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuario){
      $idusuario=$usuario->getIdusuario();

      try {
          $sql= "SELECT `idusuario`,`cedula`, `usuario_nombre`, `usuario_correo`, `usuario_pass`, `cargo_empreso_idcargo`, `user_activation_code`, `user_email_status`, `roll_idroll`"
          ."FROM `usuario`"
          ."WHERE `idusuario`='$idusuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario->setIdusuario($data[$i]['idusuario']);
          $usuario->setCedula($data[$i]['cedula']);
          $usuario->setUsuario_nombre($data[$i]['usuario_nombre']);
          $usuario->setUsuario_correo($data[$i]['usuario_correo']);
          $usuario->setUsuario_pass($data[$i]['usuario_pass']);
           $cargo_empreso = new Cargo_empreso();
           $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
           $usuario->setCargo_empreso_idcargo($cargo_empreso);
          $usuario->setUser_activation_code($data[$i]['user_activation_code']);
          $usuario->setUser_email_status($data[$i]['user_email_status']);
           $roll = new Roll();
           $roll->setIdroll($data[$i]['roll_idroll']);
           $usuario->setRoll_idroll($roll);

          }
      return $usuario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function validar_user_clave($usuario){
      $idusuario=$usuario->getIdusuario();
      $pass=$usuario->getUsuario_pass();

      try {
          $sql= "SELECT `idusuario`"
          ."FROM `usuario`"
          ."WHERE `idusuario`='$idusuario' and `usuario_pass` = '$pass' and `estado`='1'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario->setIdusuario($data[$i]['idusuario']);
         
          }
      return $usuario;      }
      catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Usuario en la base de datos.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuario){
      $idusuario=$usuario->getIdusuario();
$usuario_nombre=$usuario->getUsuario_nombre();
$usuario_correo=$usuario->getUsuario_correo();
$usuario_pass=$usuario->getUsuario_pass();
$cargo_empreso_idcargo=$usuario->getCargo_empreso_idcargo()->getIdcargo();
$user_activation_code=$usuario->getUser_activation_code();
$user_email_status=$usuario->getUser_email_status();
$roll_idroll=$usuario->getRoll_idroll()->getIdroll();

      try {
          $sql= "UPDATE `usuario` SET`idusuario`='$idusuario' ,`usuario_nombre`='$usuario_nombre' ,`usuario_correo`='$usuario_correo' ,`usuario_pass`='$usuario_pass' ,`cargo_empreso_idcargo`='$cargo_empreso_idcargo' ,`user_activation_code`='$user_activation_code' ,`user_email_status`='$user_email_status' ,`roll_idroll`='$roll_idroll' WHERE `idusuario`='$idusuario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  
  public function update_pass($idusuarios,  $usuario_passs, $usuario_pass_nuevas){
      $idusuario=$idusuarios;

$usuario_pass=$usuario_passs;
$clave_nueva=$usuario_pass_nuevas;



      try {
          $sql= "UPDATE `usuario` SET `usuario_pass`= '$clave_nueva' 
           WHERE `idusuario`='$idusuario' AND `usuario_pass` ='$usuario_pass' AND `estado` ='1'";
            return $this->updateConsulta($sql);
           } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuario){
      $idusuario=$usuario->getIdusuario();

      try {
          $sql ="DELETE FROM `usuario` WHERE `idusuario`='$idusuario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idusuario`, `usuario_nombre`, `usuario_correo`, `usuario_pass`, `cargo_empreso_idcargo`, `user_activation_code`, `user_email_status`, `roll_idroll`"
          ."FROM `usuario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdusuario($data[$i]['idusuario']);
          $usuario->setUsuario_nombre($data[$i]['usuario_nombre']);
          $usuario->setUsuario_correo($data[$i]['usuario_correo']);
          $usuario->setUsuario_pass($data[$i]['usuario_pass']);
           $cargo_empreso = new Cargo_empreso();
           $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
           $usuario->setCargo_empreso_idcargo($cargo_empreso);
          $usuario->setUser_activation_code($data[$i]['user_activation_code']);
          $usuario->setUser_email_status($data[$i]['user_email_status']);
           $roll = new Roll();
           $roll->setIdroll($data[$i]['roll_idroll']);
           $usuario->setRoll_idroll($roll);

          array_push($lista,$usuario);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  public function listAll_User(){
      $lista = array();
      
     
      
      try {
          $sql ="SELECT u.`cargo_empreso_idcargo`as id ,ce.nom_cargo as nombre FROM `usuario` u
INNER JOIN cargo_empreso ce
on ce.`idcargo`= u.`cargo_empreso_idcargo`
WHERE u.`estado` = '1' AND `idusuario` >0 ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdusuario($data[$i]['id']);
          $usuario->setUsuario_nombre($data[$i]['nombre']);
          array_push($lista,$usuario);
          }
    
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  public function loginUsers($usuario){
         
   $cargo=$usuario->getCargo_empreso_idcargo();
   $pass=$usuario->getUsuario_pass();
//   var_dump($pass);
   if($cargo='Administrador'){
     $cargo=0;  
   }
//      var_dump($cargo);
      $lista = array();
      try {
$sql ="SELECT `idusuario`, `usuario_nombre`, `usuario_correo`,`cargo_empreso_idcargo`, `usuario_pass` FROM `usuario` WHERE `user_email_status`='VERIFICADO' AND `cargo_empreso_idcargo`='$cargo' AND `usuario_pass`='$pass' AND `estado` = '1' ";
      
          $data = $this->ejecutarConsulta($sql);
        
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdusuario($data[$i]['idusuario']);
          $usuario->setUsuario_nombre($data[$i]['usuario_nombre']);
          $usuario->setUsuario_correo($data[$i]['usuario_correo']);
           $cargo_empreso = new Cargo_empreso();
           $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
           $usuario->setCargo_empreso_idcargo($cargo_empreso);
          $usuario->setUsuario_pass($data[$i]['usuario_pass']);
         

          array_push($lista,$usuario);
          
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
//   public function insertarConsulta($sql){
//          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sentencia = $this->cn->prepare($sql);
//        if (!$sentencia->execute()) {
//            $resultado = false;
//            $sentencia = null;
//        } else {
//            $resultado = true;
//            $sentencia = null;
//        }
//        var_dump("insertarConsulta  ; :".$resultado);
//        return $resultado;
//    }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
    
      public function updateConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $rta=$sentencia->rowCount();
          $sentencia = null;
          return $rta;
    }
    
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
         
          $sentencia = null;
          
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!