<?php
	include 'ActualizarTodo.php';

	$array_entidades = $_POST['entidades'];

    $fami = $_POST['entidades']['familiares'];
    $fami_Nuevos = $_POST['entidades']['familiaresnuevos'];

    unset($array_entidades['familiares']);
    unset($array_entidades['familiaresnuevos']);   

	$registrador = new ActualizarTodo(filtrar($array_entidades),$fami,$fami_Nuevos);
	
    echo $registrador->registrarTodo();
    
        
        function filtrar($entidades) {
            $miArray = array();
            foreach ($entidades as  $nombre => $entidad){
                if($nombre != 'familiares' or $nombre != 'familiaresnuevos'){
                    $miArray[$nombre] = construir($entidad);
                }
            }              
            return $miArray;
        }
        
        function construir($algo){

            for ($entidad = 0; $entidad < count($algo); $entidad++) {
                try{
                   // var_dump($algo[$entidad]);
                    $nombre = $algo[$entidad]['name'];
                    //echo "MI SUPER SALTO"; 
                    $miarray2[$nombre]=$algo[$entidad]['value'];
                }catch (Exception $e) {
                    echo "Fallo: " . $e->getMessage();
                 }
            }   
            return $miarray2; 
        }
    