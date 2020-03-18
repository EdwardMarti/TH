<?php

//Decidí colar el metodo dentro de persona porque me da pereza ponerme a escribir mas codigo.
include_once realpath('../../facade/Todo.php');

class Registrador {

    private $array_TH;
    private $mis_Familiares;

    function __construct($array_TH, $mis_Fami) {
        $this->array_TH = $array_TH;
        $this->mis_Familiares = $mis_Fami;
    }

    function registrarTodo() {
             //OK
       $cargo = $this->construirCargo($this->array_TH['cargo']);
        //OK
        $persona = $this->construirPersona($this->array_TH['persona']);
        //OK
       $direccion = $this->construirDireccion($this->array_TH['direccion']);
//        //OK
       $banco = $this->construirBanco($this->array_TH['banco']);
//        //OK
       $fechas = $this->construirFechas($this->array_TH['fechas']);
//        //OK
       $estudio = $this->construirEstudio($this->array_TH['estudio']);
//        //OK
       $cooperativismo = $this->construirCooperativismo($this->array_TH['cooperativismo']);
//        //OK
       $varios = $this->construirVarios($this->array_TH['varios']);
//        //OK
       $salud = $this->construirSalud($this->array_TH['salud']);

//
       $celular = $this->array_TH['celular']['numero'];
//
       $familiares = $this->mis_Familiares; 

//print_r($familiares);
        //$aa = array($persona, $direccion, $banco, $fechas, $estudio, $cooperativismo, $varios, $salud, $cargo);
        //print_r($aa);
        //Inserto todo ese mierdero
        $rta = Todo::registrarTodo($persona, $direccion, $banco, $fechas, $estudio, $cooperativismo, $varios, $salud, $cargo,$celular, $familiares);   
        if($rta > 0){
            $msg="{\"msg\":\"true\"}";
        }else{
            if($rta == -1){
                $msg="{\"msg\":\"erro1\"}";
            }else{
                $msg="{\"msg\":\"Error de base de datos\"}";
            }
            $rta="{\"result\":\"No se encontraron registros.\"}";   
        }
        echo "[{$msg},{$rta}]";             
    }
    
  

    function construirPersona($personaJs) {
        
       // var_dump( $lugar_nacimiento = $personaJs['lugar_nacimiento']);
        
        //$id = $personaJs['id'];
        $cedula = $personaJs['cedula'];
        $nacionalidad = $personaJs['nacionalidad'];
        $cedula_lugar_expedicion = $personaJs['cedula_lugar_expedicion'];
        $nombres = $personaJs['nombres'];
        $apellidos = $personaJs['apellidos'];
        $fechaNacimiento = $personaJs['fechaNacimiento'];
        $lugar_nacimiento = $personaJs['lugar_nacimiento'];
        $sexo = $personaJs['sexo'];
        $grupo_sanguineo = $personaJs['grupo_sanguineo'];
        $estado_civil = $personaJs['estado_civil'];
        $correo = $personaJs['correo'];
        $correo = $personaJs['correo'];
        $libreta = $personaJs['libreta'];
        $estado = '1';
     
      //  $Cargo_id = $personaJs['cargo_id'];
        $cargo = new Cargo();
       // $cargo->setId($Cargo_id);
        $Nivel_vigilancia_id_p = $personaJs['nivel_vigilancia_id_p'];
        $nivel_vigilancia = new Nivel_vigilancia();
        $nivel_vigilancia->setId($Nivel_vigilancia_id_p);
        $Tipo_vigilancia_id = $personaJs['tipo_vigilancia_id'];
        $tipo_vigilancia = new Tipo_vigilancia();
        $tipo_vigilancia->setId($Tipo_vigilancia_id);

        $persona = new Persona();
        //$persona->setId($id);
        $persona->setCedula($cedula);
        $persona->setNacionalidad($nacionalidad);
        $persona->setCedula_lugar_expedicion($cedula_lugar_expedicion);
        $persona->setNombres($nombres);
        $persona->setApellidos($apellidos);
        $persona->setFechaNacimiento($fechaNacimiento);
        $persona->setLugar_nacimiento($lugar_nacimiento);
        $persona->setSexo($sexo);
        $persona->setGrupo_sanguineo($grupo_sanguineo);
        $persona->setEstado_civil($estado_civil);
        $persona->setCorreo($correo);
        $persona->setEstado($estado);
        $persona->setCargo_id($cargo);
        $persona->setNivel_vigilancia_id_p($nivel_vigilancia);
        $persona->setTipo_vigilancia_id($tipo_vigilancia);
        $persona->setLibreta($libreta);
        
        return $persona;
    }

    function construirDireccion($direccionJs) {
        $id = $direccionJs['id'];
        $direccion = $direccionJs['direccion'];
        $barrio = $direccionJs['barrio'];
        $Persona_id = $direccionJs['persona_id'];
        $persona = new Persona();
        $persona->setId($Persona_id);

        $domicilio = new Domicilio();
        $domicilio->setId($id);
        $domicilio->setDireccion($direccion);
        $domicilio->setBarrio($barrio);
        $domicilio->setPersona_id($persona);
        
        return $domicilio;
    }

    function construirBanco($bancoJs) {
        $idbanco = $bancoJs['idbanco'];
        $banco_nombre = $bancoJs['banco_nombre'];
        $numero_cuenta = $bancoJs['numero_cuenta'];
        $Persona_id = $bancoJs['persona_id'];
        $persona= new Persona();
        $persona->setId($Persona_id);

        $banco = new Banco();
        $banco->setIdbanco($idbanco); 
        $banco->setBanco_nombre($banco_nombre); 
        $banco->setNumero_cuenta($numero_cuenta); 
        $banco->setPersona_id($persona); 

        return $banco;
        
    }

    function construirFechas($fechaJs) {

        $estudio_seguridad = $fechaJs['estudio_seguridad'];
        $examen_medico = $fechaJs['examen_medico'];
        $prueba_psicotecnica = $fechaJs['prueba_psicotecnica'];
        $id = $fechaJs['id'];
        $Persona_id = $fechaJs['persona_id'];
        $persona = new Persona();
        $persona->setId($Persona_id);

        $fechas_particulares = new Fechas_particulares();
        $fechas_particulares->setEstudio_seguridad($estudio_seguridad);
        $fechas_particulares->setExamen_medico($examen_medico);
        $fechas_particulares->setPrueba_psicotecnica($prueba_psicotecnica);
        $fechas_particulares->setId($id);
        $fechas_particulares->setPersona_id($persona);
        
        return $fechas_particulares;
    }

    function construirEstudio($estudioJS) {

        $nivel_academico = $estudioJS['nivel_academico'];
        $nivel_vigilancia = $estudioJS['nivel_vigilancia'];
        $fecha_curso = $estudioJS['fecha_curso'];
        //$id = $estudioJS['id'];
        //$Persona_id = $estudioJS['persona_id'];
        $persona = new Persona();
        //$persona->setId($Persona_id);

        $estudio = new Estudio();
        $estudio->setNivel_academico($nivel_academico);
        $estudio->setNivel_vigilancia($nivel_vigilancia);
        $estudio->setFecha_curso($fecha_curso);
        //$estudio->setId($id);
        $estudio->setPersona_id($persona);
        
        return $estudio;
    }

    function construirSalud($saludJS) {
        $id = $saludJS['id'];
        $salud = $saludJS['salud'];
        $pension = $saludJS['pension'];
        $Persona_id = $saludJS['persona_id'];
        $persona = new Persona();
        $persona->setId($Persona_id);

        $salud_pension = new Salud_pension();
        $salud_pension->setId($id);
        $salud_pension->setSalud($salud);
        $salud_pension->setPension($pension);
        $salud_pension->setPersona_id($persona);
        
        return $salud_pension;
    }

    function construirCargo($cargoJS) {

        $id = $cargoJS['id'];
        $fecha_ingreso = $cargoJS['fecha_ingreso'];
        $Empresa_idempresa = $cargoJS['empresa_idempresa'];
        $empresa = new Empresa();
        $empresa->setIdempresa($Empresa_idempresa);
        $Area_empresa_idarea_emp = $cargoJS['area_empresa_idarea_emp'];
        $area_empresa = new Area_empresa();
        $area_empresa->setIdarea_emp($Area_empresa_idarea_emp);
        $Cargo_empreso_idcargo = $cargoJS['cargo_empreso_idcargo'];
        $cargo_empreso = new Cargo_empreso();
        $cargo_empreso->setIdcargo($Cargo_empreso_idcargo);
        $Puesto_idpuesto = $cargoJS['puesto_idpuesto'];
        $puesto = new Puesto();
        $puesto->setIdpuesto($Puesto_idpuesto);

        $cargo = new Cargo();
        $cargo->setId($id);
        $cargo->setFecha_ingreso($fecha_ingreso);
        $cargo->setEmpresa_idempresa($empresa);
        $cargo->setArea_empresa_idarea_emp($area_empresa);
        $cargo->setCargo_empreso_idcargo($cargo_empreso);
        $cargo->setPuesto_idpuesto($puesto);
        
        return $cargo;
    }

    function construirCooperativismo($coopJs){
        $idcooperativismo = $coopJs['idcooperativismo'];
        $coop_nombre = $coopJs['coop_nombre'];
        $coop_fecha = $coopJs['coop_fecha'];
        $coop_nit = $coopJs['coop_nit'];
        $Persona_id = $coopJs['persona_id'];
        $persona= new Persona();
        $persona->setId($Persona_id);

        $cooperativismo = new Cooperativismo();
      $cooperativismo->setIdcooperativismo($idcooperativismo); 
      $cooperativismo->setCoop_nombre($coop_nombre); 
      $cooperativismo->setCoop_fecha($coop_fecha); 
      $cooperativismo->setCoop_nit($coop_nit); 
      $cooperativismo->setPersona_id($persona);

      return $cooperativismo; 
    }

    function construirVarios($variosJs){
      //  $idvarios_empresa = $variosJs['idvarios_empresa'];
        $cnsc = $variosJs['cnsc'];
        $fecha_acre_super = $variosJs['fecha_acre_super'];
        $acta_consejo = $variosJs['acta_consejo'];
        $fecha_aceptacion = $variosJs['fecha_aceptacion'];
        $psicofisico = $variosJs['psicofisico'];
        $fecha_examen_psicofisico = $variosJs['fecha_examen_psicofisico'];
        $Carnet_supervigilancia_idcarne = $variosJs['carnet_supervigilancia_idcarne'];
        $carnet_supervigilancia= new Carnet_supervigilancia();
        $carnet_supervigilancia->setIdcarne($Carnet_supervigilancia_idcarne);
        //$Persona_id = $variosJs['persona_id'];
        $persona= new Persona();
        //$persona->setId($Persona_id);

      $varios_empresa = new Varios_empresa();
     // $varios_empresa->setIdvarios_empresa($idvarios_empresa); 
      $varios_empresa->setCnsc($cnsc); 
      $varios_empresa->setFecha_acre_super($fecha_acre_super); 
      $varios_empresa->setActa_consejo($acta_consejo); 
      $varios_empresa->setFecha_aceptacion($fecha_aceptacion); 
      $varios_empresa->setPsicofisico($psicofisico); 
      $varios_empresa->setFecha_examen_psicofisico($fecha_examen_psicofisico); 
      $varios_empresa->setCarnet_supervigilancia_idcarne($carnet_supervigilancia); 
      $varios_empresa->setPersona_id($persona); 

      return $varios_empresa;
    }



}
