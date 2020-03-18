<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    ¿Documentaqué?  \\

include_once realpath('../../dao/interfaz/IPersonaDao.php');
include_once realpath('../../dto/Persona.php');
include_once realpath('../../dto/Cargo.php');
include_once realpath('../../dto/Nivel_vigilancia.php');
include_once realpath('../../dto/Tipo_vigilancia.php');

class PersonaDao implements IPersonaDao {

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Persona en la base de datos.
     * @param persona objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($persona) {
       // $id = $persona->getId();
        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();
        $cedula_lugar_expedicion = $persona->getCedula_lugar_expedicion();
        $nombres = $persona->getNombres();
        $apellidos = $persona->getApellidos();
        $fechaNacimiento = $persona->getFechaNacimiento();
        $lugar_nacimiento = $persona->getLugar_nacimiento();
        $sexo = $persona->getSexo();
        $grupo_sanguineo = $persona->getGrupo_sanguineo();
        $estado_civil = $persona->getEstado_civil();
        $correo = $persona->getCorreo();
        $estado = $persona->getEstado();
        $cargo_id = $persona->getCargo_id()->getId();
        $nivel_vigilancia_id_p_p = $persona->getNivel_vigilancia_id()->getId();
        $tipo_vigilancia_id = $persona->getTipo_vigilancia_id()->getId();

        $rta = $this->validar_cc($persona);
        if ($rta = 'erro') {
            return 'error';
        } else {
            try {
                $sql = "INSERT INTO `persona`(  `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`)"
                        . "VALUES ($cedula','$nacionalidad','$cedula_lugar_expedicion','$nombres','$apellidos','$fechaNacimiento','$lugar_nacimiento','$sexo','$grupo_sanguineo','$estado_civil','$correo','$estado','$cargo_id','$nivel_vigilancia_id_p','$tipo_vigilancia_id')";
                return $this->insertarConsulta($sql);
            } catch (SQLException $e) {
                throw new Exception('Primary key is null');
            }
        }
    }

    public function insert_1($persona) {
        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();
        $nombres = $persona->getNombres();
        $apellidos = $persona->getApellidos();
        $estado = $persona->getEstado();
        $correo = $persona->getCorreo();

        $rta = $this->validar_cc($persona);

        if ($rta) {
            return false;
        } else {

            try {
                $sql = "INSERT INTO `persona`( `cedula`, `nacionalidad`, `nombres`, `apellidos`,  `correo`, `estado`)"
                        . "VALUES ('$cedula','$nacionalidad','$nombres','$apellidos','$correo','$estado')";
                return $this->insertarConsulta($sql);
            } catch (SQLException $e) {
                throw new Exception('Primary key is null');
            }
        }
    }

    /**
     * Busca un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($persona) {
        $id = $persona->getId();

        try {
            $sql = "SELECT `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`"
                    . "FROM `persona`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
                $persona->setNacionalidad($data[$i]['nacionalidad']);
                $persona->setCedula_lugar_expedicion($data[$i]['cedula_lugar_expedicion']);
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);
                $persona->setFechaNacimiento($data[$i]['fechaNacimiento']);
                $persona->setLugar_nacimiento($data[$i]['lugar_nacimiento']);
                $persona->setSexo($data[$i]['sexo']);
                $persona->setGrupo_sanguineo($data[$i]['grupo_sanguineo']);
                $persona->setEstado_civil($data[$i]['estado_civil']);
                $persona->setCorreo($data[$i]['correo']);
                $persona->setEstado($data[$i]['estado']);
                $cargo = new Cargo();
                $cargo->setId($data[$i]['cargo_id']);
                $persona->setCargo_id($cargo);
                $nivel_vigilancia = new Nivel_vigilancia();
                $nivel_vigilancia->setId($data[$i]['nivel_vigilancia_id_p']);
                $persona->setNivel_vigilancia_id($nivel_vigilancia);
                $tipo_vigilancia = new Tipo_vigilancia();
                $tipo_vigilancia->setId($data[$i]['tipo_vigilancia_id']);
                $persona->setTipo_vigilancia_id($tipo_vigilancia);
            }
            return $persona;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function validar_cc($persona) {

        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();

        try {
            $sql = "SELECT `id`"
                    . "FROM `persona`"
                    . "WHERE `cedula`='$cedula' AND `nacionalidad`='$nacionalidad'";
            $data = $this->ejecutarConsulta($sql);

            if (!empty($data)) {
                return true;
            } else {
                return false;
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return false;
        }
    }

    /**
     * Modifica un objeto Persona en la base de datos.
     * @param persona objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($persona) {
        $id = $persona->getId();
        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();
        $cedula_lugar_expedicion = $persona->getCedula_lugar_expedicion();
        $nombres = $persona->getNombres();
        $apellidos = $persona->getApellidos();
        $fechaNacimiento = $persona->getFechaNacimiento();
        $lugar_nacimiento = $persona->getLugar_nacimiento();
        $sexo = $persona->getSexo();
        $grupo_sanguineo = $persona->getGrupo_sanguineo();
        $estado_civil = $persona->getEstado_civil();
        $correo = $persona->getCorreo();
        $estado = $persona->getEstado();
        $cargo_id = $persona->getCargo_id()->getId();
        $nivel_vigilancia_id_p = $persona->getNivel_vigilancia_id()->getId();
        $tipo_vigilancia_id = $persona->getTipo_vigilancia_id()->getId();

        try {
            $sql = "UPDATE `persona` SET`id`='$id' ,`cedula`='$cedula' ,`nacionalidad`='$nacionalidad' ,`cedula_lugar_expedicion`='$cedula_lugar_expedicion' ,`nombres`='$nombres' ,`apellidos`='$apellidos' ,`fechaNacimiento`='$fechaNacimiento' ,`lugar_nacimiento`='$lugar_nacimiento' ,`sexo`='$sexo' ,`grupo_sanguineo`='$grupo_sanguineo' ,`estado_civil`='$estado_civil' ,`correo`='$correo' ,`estado`='$estado' ,`cargo_id`='$cargo_id' ,`nivel_vigilancia_id_p`='$nivel_vigilancia_id_p' ,`tipo_vigilancia_id`='$tipo_vigilancia_id' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }
    
    
    public function updateCargo($id, $cargo_id) {
      
      //  $id = $persona->getCedula();
     //   $cargo_id = $persona->getNacionalidad();
       

        try {
            $sql = "UPDATE `persona` SET `cargo_id`='$cargo_id' WHERE `id`='$id' ";
            return $this->insertarConsulta2($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($persona) {
        $id = $persona->getId();

        try {
            $sql = "DELETE FROM `persona` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Persona en la base de datos.
     * @return ArrayList<Persona> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll() {
        $lista = array();
        try {
            $sql = "SELECT `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`"
                    . "FROM `persona`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
                $persona->setNacionalidad($data[$i]['nacionalidad']);
                $persona->setCedula_lugar_expedicion($data[$i]['cedula_lugar_expedicion']);
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);
                $persona->setFechaNacimiento($data[$i]['fechaNacimiento']);
                $persona->setLugar_nacimiento($data[$i]['lugar_nacimiento']);
                $persona->setSexo($data[$i]['sexo']);
                $persona->setGrupo_sanguineo($data[$i]['grupo_sanguineo']);
                $persona->setEstado_civil($data[$i]['estado_civil']);
                $persona->setCorreo($data[$i]['correo']);
                $persona->setEstado($data[$i]['estado']);
                $cargo = new Cargo();
                $cargo->setId($data[$i]['cargo_id']);
                $persona->setCargo_id($cargo);
                $nivel_vigilancia = new Nivel_vigilancia();
                $nivel_vigilancia->setId($data[$i]['nivel_vigilancia_id_p']);
                $persona->setNivel_vigilancia_id_p($nivel_vigilancia);
                $tipo_vigilancia = new Tipo_vigilancia();
                $tipo_vigilancia->setId($data[$i]['tipo_vigilancia_id']);
                $persona->setTipo_vigilancia_id($tipo_vigilancia);

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    public function listAll_tabla1($id) {
        $lista = array();
        try {
            $sql = "SELECT `p`.`id` , `p`.`cedula`, `p`.`nombres`, `p`.`apellidos`,`p`.`cargo_id`, `car_emp`.`nom_cargo` AS `tipo_vigilancia_id`, `emp`.`nombre_empresa` AS `nivel_vigilancia_id_p` 
FROM `persona` `p`
join `cargo` `c` 
on `c`.`id` = `p`.`cargo_id` 
join `cargo_empreso` `car_emp` 
on `car_emp`.`idcargo` = `c`.`cargo_empreso_idcargo` 
join `empresa` `emp` 
on `emp`.`idempresa` = `c`.`empresa_idempresa`
WHERE `c`.`stado`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
               
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);
                $cargo = new Cargo();
                $cargo->setId($data[$i]['cargo_id']);
                $persona->setCargo_id($cargo);
           
                $nivel_vigilancia = new Nivel_vigilancia();
                $nivel_vigilancia->setId($data[$i]['nivel_vigilancia_id_p']);
                $persona->setNivel_vigilancia_id_p($nivel_vigilancia);
                $tipo_vigilancia = new Tipo_vigilancia();
                $tipo_vigilancia->setId($data[$i]['tipo_vigilancia_id']);
                $persona->setTipo_vigilancia_id($tipo_vigilancia);

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function listAll_tabla() {
        $lista = array();
        try {
            $sql = "select `id`,`cedula`, `nombres`, `apellidos`,`nombre_empresa`, `nom_cargo`
 FROM `todo_view2`"
                    . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);


                $nivel_vigilancia = new Nivel_vigilancia();
                $nivel_vigilancia->setId($data[$i]['nombre_empresa']);
                $persona->setNivel_vigilancia_id($nivel_vigilancia);
                $tipo_vigilancia = new Tipo_vigilancia();
                $tipo_vigilancia->setId($data[$i]['nom_cargo']);
                $persona->setTipo_vigilancia_id($tipo_vigilancia);

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function listXID($i) {
        $lista = array();
        try {
            $sql = "SELECT `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`"
                    . "FROM `persona`"
                    . "WHERE `id`= '$i'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
                $persona->setNacionalidad($data[$i]['nacionalidad']);
                $persona->setCedula_lugar_expedicion($data[$i]['cedula_lugar_expedicion']);
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);
                $persona->setFechaNacimiento($data[$i]['fechaNacimiento']);
                $persona->setLugar_nacimiento($data[$i]['lugar_nacimiento']);
                $persona->setSexo($data[$i]['sexo']);
                $persona->setGrupo_sanguineo($data[$i]['grupo_sanguineo']);
                $persona->setEstado_civil($data[$i]['estado_civil']);
                $persona->setCorreo($data[$i]['correo']);
                $persona->setEstado($data[$i]['estado']);
                $cargo = new Cargo();
                $cargo->setId($data[$i]['cargo_id']);
                $persona->setCargo_id($cargo);
                $nivel_vigilancia = new Nivel_vigilancia();
                $nivel_vigilancia->setId($data[$i]['nivel_vigilancia_id']);
                $persona->setNivel_vigilancia_id($nivel_vigilancia);
                $tipo_vigilancia = new Tipo_vigilancia();
                $tipo_vigilancia->setId($data[$i]['tipo_vigilancia_id']);
                $persona->setTipo_vigilancia_id($tipo_vigilancia);

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    public function listXuser($i) {
        $lista = array();
        try {
            $sql = "SELECT `id`, `cedula`,  `nombres`, `apellidos`, `correo`, `cargo_empreso_idcargo` FROM `todo_view2` WHERE `id` ='$i'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cedula']);
                $persona->setNombres($data[$i]['nombres']);
                $persona->setApellidos($data[$i]['apellidos']);
              
                $persona->setSexo($data[$i]['cargo_empreso_idcargo']);
               
                $persona->setCorreo($data[$i]['correo']);
                

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    // <editor-fold defaultstate="collapsed" desc="Insertar Especial">
    // 
    public function datos() {
        $lista = "dddd";
        try {
            $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
            WHERE table_schema = 'talento_humano';";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $lista .= $data[$i]['TABLE_NAME'] . ";" . $this->resto($data[$i]['TABLE_NAME']) . ";";
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return "null";
        }
    }

    function resto($param) {

        $lista = "";
        try {
            $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = '$param'
AND table_schema = 'talento_humano';";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $lista .= $this->resto($data[$i]['COLUMN_NAME']) . ",";
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function registrarTodo($persona, $direccion, $banco, $fechas, $estudio, $cooperativismo, $varios, $salud, $cargo, $celular, $familiares) {
        try {
            if (!$this->validar_cc($persona)) {
                $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->cn->beginTransaction();
                //Inserto el cargo
                $this->cn->exec($this->getSql('cargo', $cargo));
                //Obtengo el id de cargo
                $idCargo = $this->cn->lastInsertId();
                //Actualizo el id en el objeto persona
                $persona->getCargo_id()->setId($idCargo);
                //Inserto persona
                $this->cn->exec($this->getSql('persona', $persona));
                //Obtengo el id de la ultima persona
                $id_Persona = $this->cn->lastInsertId();
                //Actualizo el id_persona en los diferentes objetos
                $direccion->getPersona_id()->setId($id_Persona);
                $banco->getPersona_id()->setId($id_Persona);
                $fechas->getPersona_id()->setId($id_Persona);
                $estudio->getPersona_id()->setId($id_Persona);
                $cooperativismo->getPersona_id()->setId($id_Persona);
                $varios->getPersona_id()->setId($id_Persona);
                $salud->getPersona_id()->setId($id_Persona);

                //Insertamos todo
                $this->cn->exec($this->getSql('direccion', $direccion));
                $this->cn->exec($this->getSql('banco', $banco));
                $this->cn->exec($this->getSql('fechas', $fechas));
                $this->cn->exec($this->getSql('estudio', $estudio));
                $this->cn->exec($this->getSql('cooperativismo', $cooperativismo));
                $this->cn->exec($this->getSql('varios', $varios));
                $this->cn->exec($this->getSql('salud', $salud));

                //Familiar
                foreach ($familiares as $key => $value) {
                    $f = $familiares[$key];
                    $this->cn->exec($this->sqlFamiliar($f['nombre'], $f['parentesco'], $id_Persona));
                    $idFAM = $this->cn->lastInsertId();
                    $cfa = $f['celular'];
                    $this->cn->exec($this->sqlCelular($cfa));
                    $idCel = $this->cn->lastInsertId();
                    $this->cn->exec($this->sqlFamliarXcelular($idFAM, $idCel));
                }


                //Celular
                foreach ($celular as $key => $value) {
                    $this->cn->exec($this->sqlCelular($value));
                    $id_celular = $this->cn->lastInsertId();
                    $this->cn->exec($this->sqlPersonaXcelular($id_Persona, $id_celular));
                }
                
                  //Obtengo el id de cargo
                $this->cn->exec($this->sqlR_Cargo($idCargo, $id_Persona));
              //  $this->cn->exec($this->getSql('actcargo',$idCargo, $id_Persona));
               
                
                $this->cn->commit();

                return $id_Persona;
            } else {
                return -1;
            }
        } catch (Exception $e) {
            $this->cn->rollBack();
            echo "Fallo: " . $e->getLine() . "  " . $e->getMessage();
            return -2;
        }
    }

    public function getSql($entidad, $objeto) {
        switch ($entidad) {
            case 'persona':
                return $this->sqlPersona($objeto);
            case 'direccion':
                return $this->sqlDireccion($objeto);
            case 'banco':
                return $this->sqlBanco($objeto);
            case 'fechas':
                return $this->sqlFechas($objeto);
            case 'estudio':
                return $this->sqlEstudio($objeto);
            case 'cooperativismo':
                return $this->sqlCooperativismo($objeto);
            case 'varios':
                return $this->sqlVarios($objeto);
            case 'salud':
                return $this->sqlSalud($objeto);
            case 'familiar':
                return $this->sqlFamiliar($objeto);
            case 'cargo':
                return $this->sqlCargo($objeto);
             default:
                return $this->sqlCargo($objeto);
        }
    }

    public function sqlPersona($persona) {
        $id = $persona->getId();
        $cedula = $persona->getCedula();
        $nacionalidad = $persona->getNacionalidad();
        $cedula_lugar_expedicion = $persona->getCedula_lugar_expedicion();
        $nombres = $persona->getNombres();
        $apellidos = $persona->getApellidos();
        $fechaNacimiento = $persona->getFechaNacimiento();
        $lugar_nacimiento = $persona->getLugar_nacimiento();
        $sexo = $persona->getSexo();
        $grupo_sanguineo = $persona->getGrupo_sanguineo();
        $estado_civil = $persona->getEstado_civil();
        $correo = $persona->getCorreo();
        $estado = $persona->getEstado();
        $cargo_id = $persona->getCargo_id()->getId();
        $nivel_vigilancia_id_p = $persona->getNivel_vigilancia_id_p()->getId();
        $tipo_vigilancia_id = $persona->getTipo_vigilancia_id()->getId();
        $libreta = $persona->getLibreta();
        $sql = "INSERT INTO `persona`( `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`,`libreta`)"
                . "VALUES ('$id','$cedula','$nacionalidad','$cedula_lugar_expedicion','$nombres','$apellidos','$fechaNacimiento','$lugar_nacimiento','$sexo','$grupo_sanguineo','$estado_civil','$correo','$estado','$cargo_id','$nivel_vigilancia_id_p','$tipo_vigilancia_id','$libreta')";
        return $sql;
    }

    public function sqlDireccion($domicilio) {
        $id = $domicilio->getId();
        $direccion = $domicilio->getDireccion();
        $barrio = $domicilio->getBarrio();
        $persona_id = $domicilio->getPersona_id()->getId();
        $sql = "INSERT INTO `domicilio`( `id`, `direccion`, `barrio`, `persona_id`)"
                . "VALUES ('$id','$direccion','$barrio','$persona_id')";
        return $sql;
    }

    public function sqlBanco($banco) {
        $idbanco = $banco->getIdbanco();
        $banco_nombre = $banco->getBanco_nombre();
        $numero_cuenta = $banco->getNumero_cuenta();
        $persona_id = $banco->getPersona_id()->getId();

        $sql = "INSERT INTO `banco`( `idbanco`, `banco_nombre`, `numero_cuenta`, `persona_id`)"
                . "VALUES ('$idbanco','$banco_nombre','$numero_cuenta','$persona_id')";
        return $sql;
    }

    public function sqlFechas($fechas_particulares) {
        $estudio_seguridad = $fechas_particulares->getEstudio_seguridad();
        $examen_medico = $fechas_particulares->getExamen_medico();
        $prueba_psicotecnica = $fechas_particulares->getPrueba_psicotecnica();
        $id = $fechas_particulares->getId();
        $persona_id = $fechas_particulares->getPersona_id()->getId();
        $sql = "INSERT INTO `fechas_particulares`( `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`)"
                . "VALUES ('$estudio_seguridad','$examen_medico','$prueba_psicotecnica','$id','$persona_id')";
        return $sql;
    }

    public function sqlEstudio($estudio) {
        $nivel_academico = $estudio->getNivel_academico();
        $nivel_vigilancia = $estudio->getNivel_vigilancia();
        $fecha_curso = $estudio->getFecha_curso();
        $id = $estudio->getId();
        $persona_id = $estudio->getPersona_id()->getId();

        $sql = "INSERT INTO `estudio`( `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`)"
                . "VALUES ('$nivel_academico','$nivel_vigilancia','$fecha_curso','$id','$persona_id')";
        return $sql;
    }

    public function sqlCooperativismo($cooperativismo) {

        $idcooperativismo = $cooperativismo->getIdcooperativismo();
        $coop_nombre = $cooperativismo->getCoop_nombre();
        $coop_fecha = $cooperativismo->getCoop_fecha();
        $coop_nit = $cooperativismo->getCoop_nit();
        $persona_id = $cooperativismo->getPersona_id()->getId();

        $sql = "INSERT INTO `cooperativismo`( `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`)"
                . "VALUES ('$idcooperativismo','$coop_nombre','$coop_fecha','$coop_nit','$persona_id')";
        return $sql;
    }

    public function sqlVarios($varios_empresa) {
        $idvarios_empresa = $varios_empresa->getIdvarios_empresa();
        $cnsc = $varios_empresa->getCnsc();
        $fecha_acre_super = $varios_empresa->getFecha_acre_super();
        $acta_consejo = $varios_empresa->getActa_consejo();
        $fecha_aceptacion = $varios_empresa->getFecha_aceptacion();
        $psicofisico = $varios_empresa->getPsicofisico();
        $fecha_examen_psicofisico = $varios_empresa->getFecha_examen_psicofisico();
        $carnet_supervigilancia_idcarne = $varios_empresa->getCarnet_supervigilancia_idcarne()->getIdcarne();
        $persona_id = $varios_empresa->getPersona_id()->getId();

        $sql = "INSERT INTO `varios_empresa`( `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`)"
                . "VALUES ('$idvarios_empresa','$cnsc','$fecha_acre_super','$acta_consejo','$fecha_aceptacion','$psicofisico','$fecha_examen_psicofisico','$carnet_supervigilancia_idcarne','$persona_id')";
        return $sql;
    }

    public function sqlSalud($salud_pension) {
        $id = $salud_pension->getId();
        $salud = $salud_pension->getSalud();
        $pension = $salud_pension->getPension();
        $persona_id = $salud_pension->getPersona_id()->getId();
        $sql = "INSERT INTO `salud_pension`( `id`, `salud`, `pension`, `persona_id`)"
                . "VALUES ('$id','$salud','$pension','$persona_id')";
        return $sql;
    }

    public function sqlCargo($cargo) {

        $fecha_ingreso = $cargo->getFecha_ingreso();
        $empresa_idempresa = $cargo->getEmpresa_idempresa()->getIdempresa();
        $area_empresa_idarea_emp = $cargo->getArea_empresa_idarea_emp()->getIdarea_emp();
        $cargo_empreso_idcargo = $cargo->getCargo_empreso_idcargo()->getIdcargo();
        $Empresa_p_idEmpresa_p = '1';
        $puesto_idpuesto=$cargo->getPuesto_idpuesto()->getIdpuesto();
        $sql = "INSERT INTO `cargo`(`fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`,`puesto_idpuesto`,`Empresa_p_idEmpresa_p`)"
     . "VALUES ('$fecha_ingreso',$empresa_idempresa,$area_empresa_idarea_emp,$cargo_empreso_idcargo,$puesto_idpuesto,$Empresa_p_idEmpresa_p)";
       
        return $sql;
    }
    
    
    public function sqlR_Cargo($idCargo, $id_Persona) {

     
        //$puesto_idpuesto=$cargo->getPuesto_idpuesto()->getIdpuesto();
        $sql = "UPDATE `cargo` SET `persona_id`=$id_Persona  WHERE `id`=$idCargo";
        return $sql;
    }

    public function sqlPersonaXcelular($persona, $celular) {
        $sql = "INSERT INTO `persona_has_celular`( `persona_id`, `celular_id`)"
                . "VALUES ('$persona','$celular')";
        return $sql;
    }

    public function sqlCelular($celular) {
        $sql = "INSERT INTO `celular`(`numero`)"
                . "VALUES ('$celular')";
        return $sql;
    }

    public function sqlFamiliar($n, $pa, $pe) {
        $sql = "INSERT INTO `familiar`( `nombre`, `parentesco`, `persona_id`) 
            VALUES ('$n','$pa','$pe')";
        return $sql;
    }

    public function sqlFamliarXcelular($persona, $celular) {
        $sql = "INSERT INTO `familiar_has_celular`(`familiar_id`, `celular_id`) 
          VALUES ('$persona','$celular')";
        return $sql;
    }

    public function insertarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        if (!$sentencia->execute()) {
            $result = " . $mysqli->errno .";
            $sentencia = null;
        } else {
            $result = true;

            $sentencia = null;
        }

        return $result;
    }

// </editor-fold>


    public function updateConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $rta = $sentencia->rowCount();
        $sentencia = null;
        return $rta;
    }

        public function insertarConsulta2($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
    
    public function ejecutarConsulta($sql) {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll();
        $sentencia = null;
        return $data;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
    public function close() {
        $cn = null; 
    }

    // <editor-fold defaultstate="collapsed" desc="Select id">






    public function select_viewP($i) {


        try {
            $sql = "SELECT `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `cargo_id`, `nivel_vigilancia_id`, `tipo_vigilancia_id`, `libreta`, `direccion`, `barrio`, `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `nit_escuela`, `salud`, `pension`, `banco_nombre`, `numero_cuenta`, `coop_nombre`, `coop_fecha`, `coop_nit`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`, `id_cargo`, `fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto` FROM `todo_view` WHERE `id` ='$i'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                return
                        array(
                            'persona' => array(
                                'id' => $data[$i]['id'],
                                'cedula' => $data[$i]['cedula'],
                                'nacionalidad' => $data[$i]['nacionalidad'],
                                'cedula_lugar_expedicion' => $data[$i]['cedula_lugar_expedicion'],
                                'nombres' => $data[$i]['nombres'],
                                'apellidos' => $data[$i]['apellidos'],
                                'fechaNacimiento' => $data[$i]['fechaNacimiento'],
                                'lugar_nacimiento' => $data[$i]['lugar_nacimiento'],
                                'sexo' => $data[$i]['sexo'],
                                'grupo_sanguineo' => $data[$i]['grupo_sanguineo'],
                                'estado_civil' => $data[$i]['estado_civil'],
                                'correo' => $data[$i]['correo'],
                                'cargo_id' => $data[$i]['cargo_id'],
                                'nivel_vigilancia_id' => $data[$i]['nivel_vigilancia_id'],
                                'tipo_vigilancia_id' => $data[$i]['tipo_vigilancia_id'],
                                'libreta' => $data[$i]['libreta']
                            ),
                            'domicilio' => array(
                                'direccion' => $data[$i]['direccion'],
                                'barrio' => $data[$i]['barrio']
                            ),
                            'banco' => array(
                                'banco_nombre' => $data[$i]['banco_nombre'],
                                'numero_cuenta' => $data[$i]['numero_cuenta']
                            ),
                            'fechas_particulares' => array(
                                'estudio_seguridad' => $data[$i]['estudio_seguridad'],
                                'examen_medico' => $data[$i]['examen_medico'],
                                'prueba_psicotecnica' => $data[$i]['prueba_psicotecnica']
                            ),
                            'estudio' => array(
                                'nivel_academico' => $data[$i]['nivel_academico'],
                                'nivel_vigilancia' => $data[$i]['nivel_vigilancia'],
                                'fecha_curso' => $data[$i]['fecha_curso'],
                                'nit_escuela' => $data[$i]['nit_escuela']
                            ),
                            'cooperativismo' => array(
                                'coop_nombre' => $data[$i]['coop_nombre'],
                                'coop_fecha' => $data[$i]['coop_fecha'],
                                'coop_nit' => $data[$i]['coop_nit'],
                            ),
                            'varios_empresa' => array(
                                'cnsc' => $data[$i]['cnsc'],
                                'fecha_acre_super' => $data[$i]['fecha_acre_super'],
                                'acta_consejo' => $data[$i]['acta_consejo'],
                                'fecha_aceptacion' => $data[$i]['fecha_aceptacion'],
                                'psicofisico' => $data[$i]['psicofisico'],
                                'fecha_examen_psicofisico' => $data[$i]['fecha_examen_psicofisico'],
                                'carnet_supervigilancia_idcarne' => $data[$i]['carnet_supervigilancia_idcarne']
                            ),
                            'salud_pension' => array(
                                'salud' => $data[$i]['salud'],
                                'pension' => $data[$i]['pension'],
                            ),
                            'cargo' => array(
                                'id' => $data[$i]['id_cargo'],
                                'fecha_ingreso' => $data[$i]['fecha_ingreso'],
                                'empresa_idempresa' => $data[$i]['empresa_idempresa'],
                                'area_empresa_idarea_emp' => $data[$i]['area_empresa_idarea_emp'],
                                'cargo_empreso_idcargo' => $data[$i]['cargo_empreso_idcargo'],
                                'puesto_idpuesto' => $data[$i]['puesto_idpuesto'],
                            )
                );
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    } 

    public function select_viewP2($i) {


        try {
            $sql = "select `id`,
                        `cedula`,
                        `nacionalidad`,
                        `cedula_lugar_expedicion`,
                        `nombres`, 
                        `apellidos`,
                        `fechaNacimiento`,
                        `lugar_nacimiento`, 
                        `sexo`,
                        `grupo_sanguineo`, 
                        `estado_civil`,
                        `correo`,
                        `cargo_id`,
                        `nivel_vigilancia_id_p`,
                        `tipo_vigilancia_id`,
                        `libreta`,
                        `direccion`,
                        `barrio`,
                        `estudio_seguridad`,
                        `examen_medico`,
                        `prueba_psicotecnica`,
                        `nivel_academico`,
                        `nivel_vigilancia`,
                        `fecha_curso`,`nit_escuela`, `salud`,`pension`, `banco_nombre`,
  `numero_cuenta`,`coop_nombre`, `coop_fecha`, `coop_nit`, `cnsc`, `fecha_acre_super`,`acta_consejo`,
  `fecha_aceptacion`, `psicofisico`,`fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`,
  `id_cargo`,`fecha_ingreso`,`empresa_idempresa`, `nombre_empresa`,`area_empresa_idarea_emp`,
   `nom_area`,`cargo_empreso_idcargo`, `nom_cargo`,`Empresa_p_idEmpresa_p`, `Empresa_p_nombre`,
   `puesto_idpuesto`, `puesto_nombre` FROM `todo_view2` WHERE `id` ='$i'";
            $data = $this->ejecutarConsulta($sql);

            for ($i = 0; $i < count($data); $i++) {
                return
                        array(
                            'persona' => array(
                                'id' => $data[$i]['id'],
                                'cedula' => $data[$i]['cedula'],
                                'nacionalidad' => $data[$i]['nacionalidad'],
                                'cedula_lugar_expedicion' => $data[$i]['cedula_lugar_expedicion'],
                                'nombres' => $data[$i]['nombres'],
                                'apellidos' => $data[$i]['apellidos'],
                                'fechaNacimiento' => $data[$i]['fechaNacimiento'],
                                'lugar_nacimiento' => $data[$i]['lugar_nacimiento'],
                                'edad' => $this->calcularEdad($data[$i]['fechaNacimiento']),
                                'sexo' => $data[$i]['sexo'],
                                'grupo_sanguineo' => $data[$i]['grupo_sanguineo'],
                                'estado_civil' => $data[$i]['estado_civil'],
                                'correo' => $data[$i]['correo'],
                                'cargo_id' => $data[$i]['cargo_id'],
                                'nivel_vigilancia_id_p' => $data[$i]['nivel_vigilancia_id_p'],
                                'tipo_vigilancia_id' => $data[$i]['tipo_vigilancia_id'],
                                'libreta' => $data[$i]['libreta']
                            ),
                            'domicilio' => array(
                                'direccion' => $data[$i]['direccion'],
                                'barrio' => $data[$i]['barrio'],
                            ),
                            'banco' => array(
                                'banco_nombre' => $data[$i]['banco_nombre'],
                                'numero_cuenta' => $data[$i]['numero_cuenta']
                            ),
                            'fechas_particulares' => array(
                                'estudio_seguridad' => $data[$i]['estudio_seguridad'],
                                'examen_medico' => $data[$i]['examen_medico'],
                                'prueba_psicotecnica' => $data[$i]['prueba_psicotecnica']
                            ),
                            'estudio' => array(
                                'nivel_academico' => $data[$i]['nivel_academico'],
                                'nivel_vigilancia' => $data[$i]['nivel_vigilancia'],
                                'fecha_curso' => $data[$i]['fecha_curso'],
                                'nit_escuela' => $data[$i]['nit_escuela']
                            ),
                            'cooperativismo' => array(
                                'coop_nombre' => $data[$i]['coop_nombre'],
                                'coop_fecha' => $data[$i]['coop_fecha'],
                                'coop_nit' => $data[$i]['coop_nit'],
                            ),
                            'varios_empresa' => array(
                                'cnsc' => $data[$i]['cnsc'],
                                'fecha_acre_super' => $data[$i]['fecha_acre_super'],
                                'acta_consejo' => $data[$i]['acta_consejo'],
                                'fecha_aceptacion' => $data[$i]['fecha_aceptacion'],
                                'psicofisico' => $data[$i]['psicofisico'],
                                'fecha_examen_psicofisico' => $data[$i]['fecha_examen_psicofisico'],
                                'carnet_supervigilancia_idcarne' => $data[$i]['carnet_supervigilancia_idcarne']
                            ),
                            'salud_pension' => array(
                                'salud' => $data[$i]['salud'],
                                'pension' => $data[$i]['pension'],
                            ),
                            'cargo' => array(
                                'id' => $data[$i]['id_cargo'],
                                'fecha_ingreso' => $data[$i]['fecha_ingreso'],
                                'Empresa_p_idEmpresa_p' => $data[$i]['Empresa_p_nombre'],
                                'empresa_idempresa' => $data[$i]['nombre_empresa'],
                                'area_empresa_idarea_emp' => $data[$i]['nom_area'],
                                'cargo_empreso_idcargo' => $data[$i]['nom_cargo'],
                                'puesto_idpuesto' => $data[$i]['puesto_nombre'],
                            )
                );
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    
    public function select_actCargo($i) {
     $lista = array();

        try {
            $sql = "select `id`,`cargo_id`,`empresa_idempresa` FROM `todo_view2` WHERE `id` ='$i'";
            $data = $this->ejecutarConsulta($sql);
          
            for ($i = 0; $i < count($data); $i++) {
                $persona = new Persona();
                $persona->setId($data[$i]['id']);
                $persona->setCedula($data[$i]['cargo_id']);
                $persona->setNacionalidad($data[$i]['empresa_idempresa']);
               

                array_push($lista, $persona);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }


    public function calcularEdad($fechaNacimiento){
        $datetime1 = new DateTime();
        $datetime2 = new DateTime($fechaNacimiento);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%y');
    }

    public function select_area_empresa($area_empresa) {
        $idarea_emp = $area_empresa->getIdarea_emp();

        try {
            $sql = "SELECT `idarea_emp`, `nom_area`, `empresa_idempresa`"
                    . "FROM `area_empresa`"
                    . "WHERE `idarea_emp`='$idarea_emp'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $area_empresa->setIdarea_emp($data[$i]['idarea_emp']);
                $area_empresa->setNom_area($data[$i]['nom_area']);
                $empresa = new Empresa();
                $empresa->setIdempresa($data[$i]['empresa_idempresa']);
                $area_empresa->setEmpresa_idempresa($empresa);
            }
            return $area_empresa;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_banco($banco) {
        $idbanco = $banco->getIdbanco();

        try {
            $sql = "SELECT `idbanco`, `banco_nombre`, `numero_cuenta`, `persona_id`"
                    . "FROM `banco`"
                    . "WHERE `idbanco`='$idbanco'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $banco->setIdbanco($data[$i]['idbanco']);
                $banco->setBanco_nombre($data[$i]['banco_nombre']);
                $banco->setNumero_cuenta($data[$i]['numero_cuenta']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $banco->setPersona_id($persona);
            }
            return $banco;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_cargo($cargo) {
        $id = $cargo->getId();

        try {
            $sql = "SELECT `id`, `fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`, `puesto_idpuesto`"
                    . "FROM `cargo`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cargo->setId($data[$i]['id']);
                $cargo->setFecha_ingreso($data[$i]['fecha_ingreso']);
                $empresa = new Empresa();
                $empresa->setIdempresa($data[$i]['empresa_idempresa']);
                $cargo->setEmpresa_idempresa($empresa);
                $area_empresa = new Area_empresa();
                $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
                $cargo->setArea_empresa_idarea_emp($area_empresa);
                $cargo_empreso = new Cargo_empreso();
                $cargo_empreso->setIdcargo($data[$i]['cargo_empreso_idcargo']);
                $cargo->setCargo_empreso_idcargo($cargo_empreso);
                $puesto = new Puesto();
                $puesto->setIdpuesto($data[$i]['puesto_idpuesto']);
                $cargo->setPuesto_idpuesto($puesto);
            }
            return $cargo;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_cargo_empreso($cargo_empreso) {
        $idcargo = $cargo_empreso->getIdcargo();

        try {
            $sql = "SELECT `idcargo`, `nom_cargo`, `area_empresa_idarea_emp`"
                    . "FROM `cargo_empreso`"
                    . "WHERE `idcargo`='$idcargo'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cargo_empreso->setIdcargo($data[$i]['idcargo']);
                $cargo_empreso->setNom_cargo($data[$i]['nom_cargo']);
                $area_empresa = new Area_empresa();
                $area_empresa->setIdarea_emp($data[$i]['area_empresa_idarea_emp']);
                $cargo_empreso->setArea_empresa_idarea_emp($area_empresa);
            }
            return $cargo_empreso;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_carnet_supervigilancia($carnet_supervigilancia) {
        $idcarne = $carnet_supervigilancia->getIdcarne();

        try {
            $sql = "SELECT `idcarne`, `carnet_nombre`"
                    . "FROM `carnet_supervigilancia`"
                    . "WHERE `idcarne`='$idcarne'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $carnet_supervigilancia->setIdcarne($data[$i]['idcarne']);
                $carnet_supervigilancia->setCarnet_nombre($data[$i]['carnet_nombre']);
            }
            return $carnet_supervigilancia;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_celular($celular) {
        $id = $celular->getId();

        try {
            $sql = "SELECT `id`, `numero`"
                    . "FROM `celular`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $celular->setId($data[$i]['id']);
                $celular->setNumero($data[$i]['numero']);
            }
            return $celular;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_cooperativismo($cooperativismo) {
        $idcooperativismo = $cooperativismo->getIdcooperativismo();

        try {
            $sql = "SELECT `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`"
                    . "FROM `cooperativismo`"
                    . "WHERE `idcooperativismo`='$idcooperativismo'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $cooperativismo->setIdcooperativismo($data[$i]['idcooperativismo']);
                $cooperativismo->setCoop_nombre($data[$i]['coop_nombre']);
                $cooperativismo->setCoop_fecha($data[$i]['coop_fecha']);
                $cooperativismo->setCoop_nit($data[$i]['coop_nit']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $cooperativismo->setPersona_id($persona);
            }
            return $cooperativismo;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_domicilio($domicilio) {
        $id = $domicilio->getId();

        try {
            $sql = "SELECT `id`, `direccion`, `barrio`, `persona_id`"
                    . "FROM `domicilio`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $domicilio->setId($data[$i]['id']);
                $domicilio->setDireccion($data[$i]['direccion']);
                $domicilio->setBarrio($data[$i]['barrio']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $domicilio->setPersona_id($persona);
            }
            return $domicilio;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

//  empresa no 
//  
    public function select_estudio($estudio) {
        $id = $estudio->getId();

        try {
            $sql = "SELECT `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`"
                    . "FROM `estudio`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $estudio->setNivel_academico($data[$i]['nivel_academico']);
                $estudio->setNivel_vigilancia($data[$i]['nivel_vigilancia']);
                $estudio->setFecha_curso($data[$i]['fecha_curso']);
                $estudio->setId($data[$i]['id']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $estudio->setPersona_id($persona);
            }
            return $estudio;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_familiar($familiar) {
        $id = $familiar->getId();

        try {
            $sql = "SELECT `id`, `nombre`, `apellido`, `parentesco`, `persona_id`"
                    . "FROM `familiar`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $familiar->setId($data[$i]['id']);
                $familiar->setNombre($data[$i]['nombre']);
                $familiar->setApellido($data[$i]['apellido']);
                $familiar->setParentesco($data[$i]['parentesco']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $familiar->setPersona_id($persona);
            }
            return $familiar;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_fechas_particulares($fechas_particulares) {
        $id = $fechas_particulares->getId();

        try {
            $sql = "SELECT `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`"
                    . "FROM `fechas_particulares`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $fechas_particulares->setEstudio_seguridad($data[$i]['estudio_seguridad']);
                $fechas_particulares->setExamen_medico($data[$i]['examen_medico']);
                $fechas_particulares->setPrueba_psicotecnica($data[$i]['prueba_psicotecnica']);
                $fechas_particulares->setId($data[$i]['id']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $fechas_particulares->setPersona_id($persona);
            }
            return $fechas_particulares;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_nivel_vigilancia($nivel_vigilancia) {
        $id = $nivel_vigilancia->getId();

        try {
            $sql = "SELECT `id`, `nombre`"
                    . "FROM `nivel_vigilancia`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $nivel_vigilancia->setId($data[$i]['id']);
                $nivel_vigilancia->setNombre($data[$i]['nombre']);
            }
            return $nivel_vigilancia;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_puesto($puesto) {
        $idpuesto = $puesto->getIdpuesto();

        try {
            $sql = "SELECT `idpuesto`, `nombre`"
                    . "FROM `puesto`"
                    . "WHERE `idpuesto`='$idpuesto'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $puesto->setIdpuesto($data[$i]['idpuesto']);
                $puesto->setNombre($data[$i]['nombre']);
            }
            return $puesto;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_salud_pension($salud_pension) {
        $id = $salud_pension->getId();

        try {
            $sql = "SELECT `id`, `salud`, `pension`, `persona_id`"
                    . "FROM `salud_pension`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $salud_pension->setId($data[$i]['id']);
                $salud_pension->setSalud($data[$i]['salud']);
                $salud_pension->setPension($data[$i]['pension']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $salud_pension->setPersona_id($persona);
            }
            return $salud_pension;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_tipo_vigilancia($tipo_vigilancia) {
        $id = $tipo_vigilancia->getId();

        try {
            $sql = "SELECT `id`, `tipo_vigilancia`"
                    . "FROM `tipo_vigilancia`"
                    . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $tipo_vigilancia->setId($data[$i]['id']);
                $tipo_vigilancia->setTipo_vigilancia($data[$i]['tipo_vigilancia']);
            }
            return $tipo_vigilancia;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function select_varios_empresa($varios_empresa) {
        $idvarios_empresa = $varios_empresa->getIdvarios_empresa();

        try {
            $sql = "SELECT `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`"
                    . "FROM `varios_empresa`"
                    . "WHERE `idvarios_empresa`='$idvarios_empresa'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $varios_empresa->setIdvarios_empresa($data[$i]['idvarios_empresa']);
                $varios_empresa->setCnsc($data[$i]['cnsc']);
                $varios_empresa->setFecha_acre_super($data[$i]['fecha_acre_super']);
                $varios_empresa->setActa_consejo($data[$i]['acta_consejo']);
                $varios_empresa->setFecha_aceptacion($data[$i]['fecha_aceptacion']);
                $varios_empresa->setPsicofisico($data[$i]['psicofisico']);
                $varios_empresa->setFecha_examen_psicofisico($data[$i]['fecha_examen_psicofisico']);
                $carnet_supervigilancia = new Carnet_supervigilancia();
                $carnet_supervigilancia->setIdcarne($data[$i]['carnet_supervigilancia_idcarne']);
                $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $varios_empresa->setPersona_id($persona);
            }
            return $varios_empresa;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

// </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Viejo">
    // 
//  public function datos(){
//      $lista = "dddd";
//      try {
//          $sql ="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
//            WHERE table_schema = 'talento_humano';";
//          $data = $this->ejecutarConsulta($sql);
//          for ($i=0; $i < count($data) ; $i++) {       
//                $lista .= $data[$i]['TABLE_NAME'].";".$this->resto($data[$i]['TABLE_NAME']).";";   
//          }
//      return $lista;
//      } catch (SQLException $e) {
//          throw new Exception('Primary key is null');
//      return "null";
//      }
//}
//
//function resto($param) {
//    
//    $lista = "";
//      try {
//          $sql ="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
//WHERE table_name = '$param'
//AND table_schema = 'talento_humano';";
//          $data = $this->ejecutarConsulta($sql);
//          for ($i=0; $i < count($data) ; $i++) {       
//                $lista .= $this->resto($data[$i]['COLUMN_NAME']).",";   
//          }
//      return $lista;
//      } catch (SQLException $e) {
//          throw new Exception('Primary key is null');
//      return null;
//      }
//   
//}
//
//public function registrarTodo($persona, $direccion, $banco, $fechas, $estudio, $cooperativismo, $varios, $salud, $cargo){
//    try {  
//      $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//      $this->cn->beginTransaction();
//      //Inserto el cargo
//      $this->cn->exec($this->getSql('cargo',$cargo));
//      //Obtengo el id de cargo
//      $idCargo = $this->cn->lastInsertId();
//      //Actualizo el id en el objeto persona
//      $persona->getCargo_id()->setId($idCargo);
//      //Inserto persona
//      $this->cn->exec($this->getSql('persona',$persona));
//      //Obtengo el id de la ultima persona
//      $id_Persona = $this->cn->lastInsertId();
//      //Actualizo el id_persona en los diferentes objetos
//      $direccion->getPersona_id()->setId($id_Persona);
//      $banco->getPersona_id()->setId($id_Persona);
//      $fechas->getPersona_id()->setId($id_Persona);
//      $estudio->getPersona_id()->setId($id_Persona);
//      $cooperativismo->getPersona_id()->setId($id_Persona);
//      $varios->getPersona_id()->setId($id_Persona);
//      $salud->getPersona_id()->setId($id_Persona);
//
//      //Insertamos todo
//      $this->cn->exec($this->getSql('direccion',$direccion));
//      $this->cn->exec($this->getSql('banco',$banco));
//      $this->cn->exec($this->getSql('fechas',$fechas));
//      $this->cn->exec($this->getSql('estudio',$estudio));
//      $this->cn->exec($this->getSql('cooperativismo',$cooperativismo));
//      $this->cn->exec($this->getSql('varios',$varios));
//      $this->cn->exec($this->getSql('salud',$salud));
//      $this->cn->commit();     
//      return $id_Persona;
//    } catch (Exception $e) {
//      $this->cn->rollBack(); 
//      echo "Fallo: " . $e->getLine() . "  ".$e->getMessage();
//    }
//  }
//
//  public function getSql($entidad, $objeto){
//    switch ($entidad) {
//      case 'persona':          
//          return $this->sqlPersona($objeto);
//      case 'direccion':
//          return $this->sqlDireccion($objeto);
//        case 'banco':
//          return $this->sqlBanco($objeto);
//        case 'fechas':
//          return $this->sqlFechas($objeto);
//        case 'estudio':
//          return $this->sqlEstudio($objeto);
//        case 'cooperativismo':
//          return $this->sqlCooperativismo($objeto);
//        case 'varios':
//          return $this->sqlVarios($objeto);
//        case 'salud':
//          return $this->sqlSalud($objeto);     
//      default:
//        return $this->sqlCargo($objeto);
//    }
//  }
//
//  public function sqlPersona($persona){
//    $id=$persona->getId();
//    $cedula=$persona->getCedula();
//    $nacionalidad=$persona->getNacionalidad();
//    $cedula_lugar_expedicion=$persona->getCedula_lugar_expedicion();
//    $nombres=$persona->getNombres();
//    $apellidos=$persona->getApellidos();
//    $fechaNacimiento=$persona->getFechaNacimiento();
//    $lugar_nacimiento=$persona->getLugar_nacimiento();
//    $sexo=$persona->getSexo();
//    $grupo_sanguineo=$persona->getGrupo_sanguineo();
//    $estado_civil=$persona->getEstado_civil();
//    $correo=$persona->getCorreo();
//    $estado=$persona->getEstado();
//    $cargo_id=$persona->getCargo_id()->getId();
//    $nivel_vigilancia_id_p=$persona->getNivel_vigilancia_id()->getId();
//    $tipo_vigilancia_id=$persona->getTipo_vigilancia_id()->getId();
//    $sql= "INSERT INTO `persona`( `id`, `cedula`, `nacionalidad`, `cedula_lugar_expedicion`, `nombres`, `apellidos`, `fechaNacimiento`, `lugar_nacimiento`, `sexo`, `grupo_sanguineo`, `estado_civil`, `correo`, `estado`, `cargo_id`, `nivel_vigilancia_id_p`, `tipo_vigilancia_id`)"
//          ."VALUES ('$id','$cedula','$nacionalidad','$cedula_lugar_expedicion','$nombres','$apellidos','$fechaNacimiento','$lugar_nacimiento','$sexo','$grupo_sanguineo','$estado_civil','$correo','$estado','$cargo_id','$nivel_vigilancia_id_p','$tipo_vigilancia_id')";
//    return $sql;
//  }
//  public function sqlDireccion($domicilio){
//    $id=$domicilio->getId();
//    $direccion=$domicilio->getDireccion();
//    $barrio=$domicilio->getBarrio();
//    $persona_id=$domicilio->getPersona_id()->getId();
//    $sql= "INSERT INTO `domicilio`( `id`, `direccion`, `barrio`, `persona_id`)"
//          ."VALUES ('$id','$direccion','$barrio','$persona_id')";
//    return $sql;
//  }
//    public function sqlBanco($banco){
//      $idbanco=$banco->getIdbanco();
//      $banco_nombre=$banco->getBanco_nombre();
//      $numero_cuenta=$banco->getNumero_cuenta();
//      $persona_id=$banco->getPersona_id()->getId();
//
//      $sql= "INSERT INTO `banco`( `idbanco`, `banco_nombre`, `numero_cuenta`, `persona_id`)"
//          ."VALUES ('$idbanco','$banco_nombre','$numero_cuenta','$persona_id')";
//      return $sql;
//    }
//
//    public function sqlFechas($fechas_particulares){
//      $estudio_seguridad=$fechas_particulares->getEstudio_seguridad();
//      $examen_medico=$fechas_particulares->getExamen_medico();
//      $prueba_psicotecnica=$fechas_particulares->getPrueba_psicotecnica();
//      $id=$fechas_particulares->getId();
//      $persona_id=$fechas_particulares->getPersona_id()->getId();
//      $sql= "INSERT INTO `fechas_particulares`( `estudio_seguridad`, `examen_medico`, `prueba_psicotecnica`, `id`, `persona_id`)"
//          ."VALUES ('$estudio_seguridad','$examen_medico','$prueba_psicotecnica','$id','$persona_id')";
//      return $sql;
//    }
//
//    public function sqlEstudio($estudio){
//      $nivel_academico=$estudio->getNivel_academico();
//      $nivel_vigilancia=$estudio->getNivel_vigilancia();
//      $fecha_curso=$estudio->getFecha_curso();
//      $id=$estudio->getId();
//      $persona_id=$estudio->getPersona_id()->getId();
//
//      $sql= "INSERT INTO `estudio`( `nivel_academico`, `nivel_vigilancia`, `fecha_curso`, `id`, `persona_id`)"
//          ."VALUES ('$nivel_academico','$nivel_vigilancia','$fecha_curso','$id','$persona_id')";
//          return $sql;  
//    }
//
//    public function sqlCooperativismo($cooperativismo){
//
//       $idcooperativismo=$cooperativismo->getIdcooperativismo();
//        $coop_nombre=$cooperativismo->getCoop_nombre();
//        $coop_fecha=$cooperativismo->getCoop_fecha();
//        $coop_nit=$cooperativismo->getCoop_nit();
//        $persona_id=$cooperativismo->getPersona_id()->getId();
//
//        $sql= "INSERT INTO `cooperativismo`( `idcooperativismo`, `coop_nombre`, `coop_fecha`, `coop_nit`, `persona_id`)"
//          ."VALUES ('$idcooperativismo','$coop_nombre','$coop_fecha','$coop_nit','$persona_id')";
//          return $sql;
//    }
//
//    public function sqlVarios($varios_empresa){
//    $idvarios_empresa=$varios_empresa->getIdvarios_empresa();
//    $cnsc=$varios_empresa->getCnsc();
//    $fecha_acre_super=$varios_empresa->getFecha_acre_super();
//    $acta_consejo=$varios_empresa->getActa_consejo();
//    $fecha_aceptacion=$varios_empresa->getFecha_aceptacion();
//    $psicofisico=$varios_empresa->getPsicofisico();
//    $fecha_examen_psicofisico=$varios_empresa->getFecha_examen_psicofisico();
//    $carnet_supervigilancia_idcarne=$varios_empresa->getCarnet_supervigilancia_idcarne()->getIdcarne();
//    $persona_id=$varios_empresa->getPersona_id()->getId();
//
//    $sql= "INSERT INTO `varios_empresa`( `idvarios_empresa`, `cnsc`, `fecha_acre_super`, `acta_consejo`, `fecha_aceptacion`, `psicofisico`, `fecha_examen_psicofisico`, `carnet_supervigilancia_idcarne`, `persona_id`)"
//          ."VALUES ('$idvarios_empresa','$cnsc','$fecha_acre_super','$acta_consejo','$fecha_aceptacion','$psicofisico','$fecha_examen_psicofisico','$carnet_supervigilancia_idcarne','$persona_id')";
//    return $sql;
//}
//
//    public function sqlSalud($salud_pension){
//      $id=$salud_pension->getId();
//    $salud=$salud_pension->getSalud();
//    $pension=$salud_pension->getPension();
//    $persona_id=$salud_pension->getPersona_id()->getId();
//    $sql= "INSERT INTO `salud_pension`( `id`, `salud`, `pension`, `persona_id`)"
//          ."VALUES ('$id','$salud','$pension','$persona_id')";
//          return $sql;
//}
//      
//
//  public function sqlCargo($cargo){
//
//    $fecha_ingreso=$cargo->getFecha_ingreso();
//    $empresa_idempresa=$cargo->getEmpresa_idempresa()->getIdempresa();
//    $area_empresa_idarea_emp=$cargo->getArea_empresa_idarea_emp()->getIdarea_emp();
//    $cargo_empreso_idcargo=$cargo->getCargo_empreso_idcargo()->getIdcargo();
//    $puesto_idpuesto=$cargo->getPuesto_idpuesto()->getIdpuesto();
//    $sql= "INSERT INTO `cargo`(`fecha_ingreso`, `empresa_idempresa`, `area_empresa_idarea_emp`, `cargo_empreso_idcargo`)"
//          ."VALUES ('$fecha_ingreso','$empresa_idempresa','$area_empresa_idarea_emp','$cargo_empreso_idcargo')";
//    return $sql;
//
//  }
//
//
//
//
//
//
//
//
//
//  public function insertarConsulta($sql){
//          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//          $sentencia=$this->cn->prepare($sql);
//                if (!$sentencia->execute()) {
//           $result=" . $mysqli->errno .";
//  $sentencia = null;
//          }
//           else{
//               $result=true;

//                 $sentencia = null;
//           }
//          
//          return $result;
//          
//    }
//    
//      public function insertarConsulta($sql){
//          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//          $sentencia=$this->cn->prepare($sql);
//          $sentencia->execute(); 
//          $sentencia = null;
//          return $this->cn->lastInsertId();
////    }
//      public function ejecutarConsulta($sql){
//          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//          $sentencia=$this->cn->prepare($sql);
//          $sentencia->execute(); 
//          $data = $sentencia->fetchAll();
//          $sentencia = null;
//          return $data;
//    }
// </editor-fold>
}

//That´s all folks!