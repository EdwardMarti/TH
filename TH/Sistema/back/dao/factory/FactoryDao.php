<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

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
     * Devuelve una instancia de Empresa_pDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Empresa_pDao
     */
     public function getEmpresa_pDao($dbName){
        return new Empresa_pDao($this->conn->obtener($dbName));
    }

     /**
     * Devuelve una instancia de Area_empresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Area_empresaDao
     */
     public function getArea_empresaDao($dbName){
        return new Area_empresaDao($this->conn->obtener($dbName));
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
     * Devuelve una instancia de CargoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CargoDao
     */
     public function getCargoDao($dbName){
        return new CargoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Cargo_empresoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cargo_empresoDao
     */
     public function getCargo_empresoDao($dbName){
        return new Cargo_empresoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Carnet_supervigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Carnet_supervigilanciaDao
     */
     public function getCarnet_supervigilanciaDao($dbName){
        return new Carnet_supervigilanciaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CelularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CelularDao
     */
     public function getCelularDao($dbName){
        return new CelularDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CooperativismoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CooperativismoDao
     */
     public function getCooperativismoDao($dbName){
        return new CooperativismoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DomicilioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DomicilioDao
     */
     public function getDomicilioDao($dbName){
        return new DomicilioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EmpresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EmpresaDao
     */
     public function getEmpresaDao($dbName){
        return new EmpresaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EstudioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudioDao
     */
     public function getEstudioDao($dbName){
        return new EstudioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FamiliarDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FamiliarDao
     */
     public function getFamiliarDao($dbName){
        return new FamiliarDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Familiar_has_celularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Familiar_has_celularDao
     */
     public function getFamiliar_has_celularDao($dbName){
        return new Familiar_has_celularDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Fechas_particularesDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fechas_particularesDao
     */
     public function getFechas_particularesDao($dbName){
        return new Fechas_particularesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Nivel_vigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Nivel_vigilanciaDao
     */
     public function getNivel_vigilanciaDao($dbName){
        return new Nivel_vigilanciaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PersonaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName){
        return new PersonaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Persona_has_celularDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_celularDao
     */
     public function getPersona_has_celularDao($dbName){
        return new Persona_has_celularDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PuestoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PuestoDao
     */
     public function getPuestoDao($dbName){
        return new PuestoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de RollDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RollDao
     */
     public function getRollDao($dbName){
        return new RollDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Salud_pensionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Salud_pensionDao
     */
     public function getSalud_pensionDao($dbName){
        return new Salud_pensionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_vigilanciaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vigilanciaDao
     */
     public function getTipo_vigilanciaDao($dbName){
        return new Tipo_vigilanciaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuarioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName){
        return new UsuarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Varios_empresaDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Varios_empresaDao
     */
     public function getVarios_empresaDao($dbName){
        return new Varios_empresaDao($this->conn->obtener($dbName));
    }

}
//That´s all folks!