<?php
	include 'Registrador.php';

	$array_entidades = $_POST['entidades'];

    $fami = $_POST['entidades']['familiares'];
	$registrador = new Registrador(filtrar($array_entidades),$fami);
	
	echo $registrador->registrarTodo();
        
        function filtrar($entidades) {
            $miArray = array();
            foreach ($entidades as  $nombre => $entidad){
                if($nombre != 'familiares'){
                    $miArray[$nombre] = construir($entidad);
                }
            }              
            return $miArray;
        }
        
        function construir($algo){
            $miarray2 = array();       
            for ($entidad = 0; $entidad < count($algo); $entidad++) {
                $miarray2[$algo[$entidad]['name']]=$algo[$entidad]['value'];
            }   
            return $miarray2;
        }
    