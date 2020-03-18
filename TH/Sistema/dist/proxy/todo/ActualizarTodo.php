<?php


//Decidí colar el metodo dentro de persona porque me da pereza ponerme a escribir mas codigo.
 include_once realpath('../../controler/TodoController.php'); 
 require_once realpath('../../entity/Persona.php'); 
 require_once realpath('../../entity/Domicilio.php'); 
 require_once realpath('../../entity/Banco.php'); 
 require_once realpath('../../entity/Fechas_particulares.php'); 
 require_once realpath('../../entity/Estudio.php'); 
 require_once realpath('../../entity/Cooperativismo.php'); 
 require_once realpath('../../entity/Varios_empresa.php'); 
 require_once realpath('../../entity/Salud_pension.php'); 
// require_once realpath('../../entity/Cargo.php'); 
 require_once realpath('../../entity/Celular.php'); 
 require_once realpath('../../entity/Familiar.php'); 

class ActualizarTodo {

    private $array_TH;
    private $mis_Familiares;
    private $famiNuevos;

    function __construct($array_TH, $mis_Fami, $famiNuevos) {
        $this->array_TH = $array_TH;
        $this->mis_Familiares = $mis_Fami;
        $this->famiNuevos = $famiNuevos;
    }

    function registrarTodo() {
        //OK
        $persona = new Persona(); 
 		$persona->set_Meta_Columnas($this->array_TH['persona']); 
        //OK
        $domicilio = new Domicilio(); 
 		$domicilio->set_Meta_Columnas($this->array_TH['direccion']); 
        //OK
        $banco = new Banco(); 
 		$banco->set_Meta_Columnas($this->array_TH['banco']); 
        //OK 
        $fechas_particulares = new Fechas_particulares(); 
 		$fechas_particulares->set_Meta_Columnas($this->array_TH['fechas']); 
        //OK
        $estudio = new Estudio(); 
		$estudio->set_Meta_Columnas($this->array_TH['estudio']); 
        //OK
        $cooperativismo = new Cooperativismo(); 
 		$cooperativismo->set_Meta_Columnas($this->array_TH['cooperativismo']); 
        //OK
        $varios_empresa = new Varios_empresa(); 
 		$varios_empresa->set_Meta_Columnas($this->array_TH['varios']); 
        //OK
        $salud_pension = new Salud_pension(); 
 		$salud_pension->set_Meta_Columnas($this->array_TH['salud']); 
        //OK
     //   $cargo = new Cargo(); 
 		//$cargo->set_Meta_Columnas($this->array_TH['cargo']); 

 		$celular = new Celular(); 
 		//$celular->set_Meta_Columnas($this->array_TH['celular']['numero']); 

 		$familiar = new Familiar(); 
 		//$familiar->set_Meta_Columnas($this->mis_Familiares); 

        $todoE = array(
        	$persona,
        	$domicilio, 
        	$banco, 
        	$fechas_particulares, 
        	$estudio, 
        	$cooperativismo, 
        	$varios_empresa, 
        	$salud_pension
        	//$cargo
        	//$celular,
        	//$familiar 
        	);
       //print_r($todo);
        //echo 'Start';
        //Inserto todo ese mierdero
        $todo = new TodoController(); 
        $rta = $todo->actualizarTodo($todoE,
                                    $this->mis_Familiares,
                                    $this->famiNuevos);   
        echo $rta;
       /* if($rta > 0){
            $msg="{\"msg\":\"Registro exitoso\"}";
        }else{
            if($rta == -1){
                $msg="{\"msg\":\"Cedula Repetida\"}";
            }else{
                $msg="{\"msg\":\"Error de base de datos\"}";
            }
            $rta="{\"result\":\"No se encontraron registros.\"}";   
        }
        echo "[{$msg},{$rta}]";  */         
    }

}
