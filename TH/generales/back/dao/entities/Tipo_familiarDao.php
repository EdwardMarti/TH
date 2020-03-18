<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

include_once realpath('../../dao/interfaz/ITipo_familiarDao.php');
include_once realpath('../../dto/Tipo_familiar.php');

class Tipo_familiarDao implements ITipo_familiarDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_familiar){
      $idtipo_familiar=$tipo_familiar->getIdtipo_familiar();
$tipo_familiar_descripcion=$tipo_familiar->getTipo_familiar_descripcion();

      try {
          $sql= "INSERT INTO `tipo_familiar`( `idtipo_familiar`, `tipo_familiar_descripcion`)"
          ."VALUES ('$idtipo_familiar','$tipo_familiar_descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_familiar){
      $idtipo_familiar=$tipo_familiar->getIdtipo_familiar();

      try {
          $sql= "SELECT `idtipo_familiar`, `tipo_familiar_descripcion`"
          ."FROM `tipo_familiar`"
          ."WHERE `idtipo_familiar`='$idtipo_familiar'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_familiar->setIdtipo_familiar($data[$i]['idtipo_familiar']);
          $tipo_familiar->setTipo_familiar_descripcion($data[$i]['tipo_familiar_descripcion']);

          }
      return $tipo_familiar;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_familiar){
      $idtipo_familiar=$tipo_familiar->getIdtipo_familiar();
$tipo_familiar_descripcion=$tipo_familiar->getTipo_familiar_descripcion();

      try {
          $sql= "UPDATE `tipo_familiar` SET`idtipo_familiar`='$idtipo_familiar' ,`tipo_familiar_descripcion`='$tipo_familiar_descripcion' WHERE `idtipo_familiar`='$idtipo_familiar' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_familiar){
      $idtipo_familiar=$tipo_familiar->getIdtipo_familiar();

      try {
          $sql ="DELETE FROM `tipo_familiar` WHERE `idtipo_familiar`='$idtipo_familiar'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_familiar en la base de datos.
     * @return ArrayList<Tipo_familiar> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idtipo_familiar`, `tipo_familiar_descripcion`"
          ."FROM `tipo_familiar`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_familiar= new Tipo_familiar();
          $tipo_familiar->setIdtipo_familiar($data[$i]['idtipo_familiar']);
          $tipo_familiar->setTipo_familiar_descripcion($data[$i]['tipo_familiar_descripcion']);

          array_push($lista,$tipo_familiar);
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