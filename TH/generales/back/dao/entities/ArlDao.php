<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿En serio? ¿Tantos buenos frameworks y estás usando Anarchy?  \\

include_once realpath('../../dao/interfaz/IArlDao.php');
include_once realpath('../../dto/Arl.php');

class ArlDao implements IArlDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Arl en la base de datos.
     * @param arl objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($arl){
      $idarl=$arl->getIdarl();
$arl_nombre=$arl->getArl_nombre();

      try {
          $sql= "INSERT INTO `arl`( `idarl`, `arl_nombre`)"
          ."VALUES ('$idarl','$arl_nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Arl en la base de datos.
     * @param arl objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($arl){
      $idarl=$arl->getIdarl();

      try {
          $sql= "SELECT `idarl`, `arl_nombre`"
          ."FROM `arl`"
          ."WHERE `idarl`='$idarl'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $arl->setIdarl($data[$i]['idarl']);
          $arl->setArl_nombre($data[$i]['arl_nombre']);

          }
      return $arl;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Arl en la base de datos.
     * @param arl objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($arl){
      $idarl=$arl->getIdarl();
$arl_nombre=$arl->getArl_nombre();

      try {
          $sql= "UPDATE `arl` SET`idarl`='$idarl' ,`arl_nombre`='$arl_nombre' WHERE `idarl`='$idarl' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Arl en la base de datos.
     * @param arl objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($arl){
      $idarl=$arl->getIdarl();

      try {
          $sql ="DELETE FROM `arl` WHERE `idarl`='$idarl'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Arl en la base de datos.
     * @return ArrayList<Arl> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idarl`, `arl_nombre`"
          ."FROM `arl`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $arl= new Arl();
          $arl->setIdarl($data[$i]['idarl']);
          $arl->setArl_nombre($data[$i]['arl_nombre']);

          array_push($lista,$arl);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
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