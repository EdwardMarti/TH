<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\
include_once realpath('../../dao/interfaz/IConexion.php');

class Conexion implements IConexion{
   private $cnx;
   private $gestor;

     function __construct($gestor) {
           $this->cnx = null ;
           switch ($gestor) {
             case "FactoryDao::MYSQL_FACTORY":
               $this->gestor="";
               break;
             case "FactoryDao::POSTGRESQL_FACTORY":
               $this->gestor="pgsql";
               break;
             case "FactoryDao::ORACLE_FACTORY":
               $this->gestor="oci";
               break;
             case "FactoryDao::DERBY_FACTORY":
               $this->gestor="odbc";
               break;
             default:
               $this->gestor="NULL_GESTOR";
               break;
           }           
    }
    /**     
     * Crea una conexión si no se ha establecido antes; en caso contrario, devuelve la ya existente
     * Toma los parámetros de conexión de la clase Properties y usa el driver mysql.jdbc para establecer una conexión. 
     * @return Conexión a base de datos mySql
     * @param dbName Nombre de la base de datos que se desea conectar
     */
   public function obtener($dbName){
      if ($this->cnx == null) {
         try {
             $ini_array = parse_ini_file(realpath('../../dao/properties/Properties.ini'));
            /** $host = $ini_array[$dbName]['host'];
             $username = $ini_array[$dbName]['username'];
             $password = $ini_array[$dbName]['password'];*/
             $host = 'localhost:3306';
             $username = 'sistema';
             $password = 'AsHXsBqDc9C0cUbq';
             $this->cnx = new PDO("mysql:host=$host;dbname=datos_generales;charset=utf8",$username,$password);
         }catch(Exception $e){
            die('Error : '.$e->getMessage());
        }
      }
      return $this->cnx;
   }

     /**
     * Cierra la conexión a la base de datos
     * @throws SQLException
     */
   public function cerrar(){
      if ($this->cnx != null) {
         $this->cnx=null;
      }
   }

}
//That´s all folks!