<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\

include_once realpath('../../dao/entities/ArlDao.php');
include_once realpath('../../dao/entities/BancoDao.php');
include_once realpath('../../dao/entities/BarrioDao.php');
include_once realpath('../../dao/entities/CiudadDao.php');
include_once realpath('../../dao/entities/DepartamentoDao.php');
include_once realpath('../../dao/entities/EpsDao.php');
include_once realpath('../../dao/entities/Estado_civilDao.php');
include_once realpath('../../dao/entities/EstratoDao.php');
include_once realpath('../../dao/entities/Grupo_sanguineoDao.php');
include_once realpath('../../dao/entities/Nivel_estudiosDao.php');
include_once realpath('../../dao/entities/PaisDao.php');
include_once realpath('../../dao/entities/PensionDao.php');
include_once realpath('../../dao/entities/SexoDao.php');
include_once realpath('../../dao/entities/Tipo_familiarDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de ArlDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ArlDao
     */
     public function getArlDao($dbName);
     /**
     * Devuelve una instancia de BancoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BancoDao
     */
     public function getBancoDao($dbName);
     /**
     * Devuelve una instancia de BarrioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BarrioDao
     */
     public function getBarrioDao($dbName);
     /**
     * Devuelve una instancia de CiudadDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CiudadDao
     */
     public function getCiudadDao($dbName);
     /**
     * Devuelve una instancia de DepartamentoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DepartamentoDao
     */
     public function getDepartamentoDao($dbName);
     /**
     * Devuelve una instancia de EpsDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EpsDao
     */
     public function getEpsDao($dbName);
     /**
     * Devuelve una instancia de Estado_civilDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_civilDao
     */
     public function getEstado_civilDao($dbName);
     /**
     * Devuelve una instancia de EstratoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstratoDao
     */
     public function getEstratoDao($dbName);
     /**
     * Devuelve una instancia de Grupo_sanguineoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_sanguineoDao
     */
     public function getGrupo_sanguineoDao($dbName);
     /**
     * Devuelve una instancia de Nivel_estudiosDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Nivel_estudiosDao
     */
     public function getNivel_estudiosDao($dbName);
     /**
     * Devuelve una instancia de PaisDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PaisDao
     */
     public function getPaisDao($dbName);
     /**
     * Devuelve una instancia de PensionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PensionDao
     */
     public function getPensionDao($dbName);
     /**
     * Devuelve una instancia de SexoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SexoDao
     */
     public function getSexoDao($dbName);
     /**
     * Devuelve una instancia de Tipo_familiarDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_familiarDao
     */
     public function getTipo_familiarDao($dbName);

}
//That´s all folks!