<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojitos de luz de luna  \\

include_once realpath('../../dao/conexion/Conexion.php');
include_once realpath('../../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de ArlDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ArlDao
     */
     public function getArlDao($dbName){
        return new ArlDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de BancoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BancoDao
     */
     public function getBancoDao($dbName){
        return new BancoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de BarrioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BarrioDao
     */
     public function getBarrioDao($dbName){
        return new BarrioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CiudadDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CiudadDao
     */
     public function getCiudadDao($dbName){
        return new CiudadDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DepartamentoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DepartamentoDao
     */
     public function getDepartamentoDao($dbName){
        return new DepartamentoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EpsDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EpsDao
     */
     public function getEpsDao($dbName){
        return new EpsDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Estado_civilDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_civilDao
     */
     public function getEstado_civilDao($dbName){
        return new Estado_civilDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EstratoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstratoDao
     */
     public function getEstratoDao($dbName){
        return new EstratoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_sanguineoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_sanguineoDao
     */
     public function getGrupo_sanguineoDao($dbName){
        return new Grupo_sanguineoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Nivel_estudiosDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Nivel_estudiosDao
     */
     public function getNivel_estudiosDao($dbName){
        return new Nivel_estudiosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PaisDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PaisDao
     */
     public function getPaisDao($dbName){
        return new PaisDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PensionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PensionDao
     */
     public function getPensionDao($dbName){
        return new PensionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de SexoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SexoDao
     */
     public function getSexoDao($dbName){
        return new SexoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_familiarDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_familiarDao
     */
     public function getTipo_familiarDao($dbName){
        return new Tipo_familiarDao($this->conn->obtener($dbName));
    }

}
//That´s all folks!