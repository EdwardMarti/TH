<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

include_once realpath('../../dao/entities/Area_empresaDao.php');
include_once realpath('../../dao/entities/BancoDao.php');
include_once realpath('../../dao/entities/CargoDao.php');
include_once realpath('../../dao/entities/Cargo_empresoDao.php');
include_once realpath('../../dao/entities/Carnet_supervigilanciaDao.php');
include_once realpath('../../dao/entities/CelularDao.php');
include_once realpath('../../dao/entities/CooperativismoDao.php');
include_once realpath('../../dao/entities/DomicilioDao.php');
include_once realpath('../../dao/entities/EmpresaDao.php');
include_once realpath('../../dao/entities/EstudioDao.php');
include_once realpath('../../dao/entities/FamiliarDao.php');
include_once realpath('../../dao/entities/Familiar_has_celularDao.php');
include_once realpath('../../dao/entities/Fechas_particularesDao.php');
include_once realpath('../../dao/entities/Nivel_vigilanciaDao.php');
include_once realpath('../../dao/entities/PersonaDao.php');
include_once realpath('../../dao/entities/Persona_has_celularDao.php');
include_once realpath('../../dao/entities/PuestoDao.php');
include_once realpath('../../dao/entities/RollDao.php');
include_once realpath('../../dao/entities/Salud_pensionDao.php');
include_once realpath('../../dao/entities/Tipo_vigilanciaDao.php');
include_once realpath('../../dao/entities/UsuarioDao.php');
include_once realpath('../../dao/entities/Varios_empresaDao.php');
include_once realpath('../../dao/entities/Empresa_pDao.php');


interface IFactoryDao {

        /**
     * Devuelve una instancia de Empresa_pDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Empresa_pDao
     */
     public function getEmpresa_pDao($dbName);
	
     /**
     * Devuelve una instancia de Area_empresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Area_empresaDao
     */
     public function getArea_empresaDao($dbName);
     /**
     * Devuelve una instancia de BancoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BancoDao
     */
     public function getBancoDao($dbName);
     /**
     * Devuelve una instancia de CargoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CargoDao
     */
     public function getCargoDao($dbName);
     /**
     * Devuelve una instancia de Cargo_empresoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cargo_empresoDao
     */
     public function getCargo_empresoDao($dbName);
     /**
     * Devuelve una instancia de Carnet_supervigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Carnet_supervigilanciaDao
     */
     public function getCarnet_supervigilanciaDao($dbName);
     /**
     * Devuelve una instancia de CelularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CelularDao
     */
     public function getCelularDao($dbName);
     /**
     * Devuelve una instancia de CooperativismoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CooperativismoDao
     */
     public function getCooperativismoDao($dbName);
     /**
     * Devuelve una instancia de DomicilioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DomicilioDao
     */
     public function getDomicilioDao($dbName);
     /**
     * Devuelve una instancia de EmpresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EmpresaDao
     */
     public function getEmpresaDao($dbName);
     /**
     * Devuelve una instancia de EstudioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudioDao
     */
     public function getEstudioDao($dbName);
     /**
     * Devuelve una instancia de FamiliarDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FamiliarDao
     */
     public function getFamiliarDao($dbName);
     /**
     * Devuelve una instancia de Familiar_has_celularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Familiar_has_celularDao
     */
     public function getFamiliar_has_celularDao($dbName);
     /**
     * Devuelve una instancia de Fechas_particularesDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fechas_particularesDao
     */
     public function getFechas_particularesDao($dbName);
     /**
     * Devuelve una instancia de Nivel_vigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Nivel_vigilanciaDao
     */
     public function getNivel_vigilanciaDao($dbName);
     /**
     * Devuelve una instancia de PersonaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName);
     /**
     * Devuelve una instancia de Persona_has_celularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_celularDao
     */
     public function getPersona_has_celularDao($dbName);
     /**
     * Devuelve una instancia de PuestoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PuestoDao
     */
     public function getPuestoDao($dbName);
     /**
     * Devuelve una instancia de RollDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RollDao
     */
     public function getRollDao($dbName);
     /**
     * Devuelve una instancia de Salud_pensionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Salud_pensionDao
     */
     public function getSalud_pensionDao($dbName);
     /**
     * Devuelve una instancia de Tipo_vigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vigilanciaDao
     */
     public function getTipo_vigilanciaDao($dbName);
     /**
     * Devuelve una instancia de UsuarioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName);
     /**
     * Devuelve una instancia de Varios_empresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Varios_empresaDao
     */
     public function getVarios_empresaDao($dbName);

}
//That´s all folks!