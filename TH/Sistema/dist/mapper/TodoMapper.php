<?php 
include substr(getcwd(), 0, strlen(getcwd())-10).'mapper/Mapper.php';
include substr(getcwd(), 0, strlen(getcwd())-10).'sql/SqlQuery.php';
 class TodoMapper extends Mapper{ 

 
 	public function actualizarTodo22($todo){ 
  		try {  
  			$men = "";
  			for ($i=0; $i < count($todo) ; $i++) { 
  				 $men .= 
  				 SqlQuery::getSQLUpdatePreparado($todo[$i]) ."\n";
  				 //SqlQuery::getArrayParametros($todo[$i])."\n \n";
			
  			}
	      return $men;
	    } catch (Exception $e) {
	      return -1;
	    }
	} 


  	public function actualizarTodo($todo,$mis_Fami,$famiNuevos){ 
  		try {  

  			$persona_id = $todo[2]->getPersona_id();
	      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      $this->db->beginTransaction();
	      foreach ($todo as $keys => $value) {
	      	$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($value));
			$parametros = SqlQuery::getArrayParametros($value);
			foreach ($parametros as $key => &$val) { 
				$sentencia->bindParam($key, $val);
			}
			$sentencia->execute(); 
	      }

	      //Actualiza familiares
	      //Perdon por no implementar esto, me falta llevarme el id de la persona hacia la vista para actualizar	  


	      
	      foreach ($mis_Fami as $valor) {
	        	$nombre=  $valor['nombre'];
	        	$parentesco = $valor['parentesco'];
	        	$celular = $valor['celular'];
	        	$idF = $valor['idF'];

		      	$sql = "UPDATE `familiar` 
		      			SET `nombre`='$nombre',
		      				`apellido`='$nombre',
		      				`parentesco`='$parentesco' 
		      			WHERE `id`='$idF'";

		      	$sentencia=$this->db->prepare($sql);
		      	$sentencia->execute(); 
		  		
		  		$sql = "SELECT `celular_id` 
		  			 	FROM `familiar_has_celular` 
		  			 	WHERE `familiar_id`= '$idF'";
		  		$results = array(); 
				foreach($this->db->query($sql) as $fila){ 
					$celular_id = $fila['celular_id'];
					$sql = "UPDATE `celular` 
							SET `numero`='$celular' 
							WHERE `id` = '$celular_id'";
					$sentencia=$this->db->prepare($sql);
		      		$sentencia->execute(); 
				}

	      }



	      //Inserta familiares
	      if($famiNuevos['vacio'] == 0){
	        foreach ($famiNuevos as $keyss => $valor) {
	        	if($keyss != 'vacio'){
		        	$nombre=  $valor['nombre'];
		        	$parentesco = $valor['parentesco'];
		        	$celular = $valor['celular'];

			      	$sql = "INSERT INTO `familiar`(`nombre`, `parentesco`, `persona_id`) 
			      		VALUES ('$nombre','$parentesco','$persona_id')";
			      		//echo $sql;

			      	$sentencia=$this->db->prepare($sql);
			      	$sentencia->execute(); 
			      	$familiar_id = $this->db->lastInsertId();

			      	$sql = "INSERT INTO `celular`(`numero`) VALUES ('$celular')";

			      	//echo $sql;

			      	$sentencia=$this->db->prepare($sql);
			      	$sentencia->execute(); 
			      	$celular_id = $this->db->lastInsertId();


			      	$sql = "INSERT INTO `familiar_has_celular`(`familiar_id`, `celular_id`) VALUES ($familiar_id,$celular_id)";
			      	//echo $sql;

			      	$sentencia=$this->db->prepare($sql);
			      	$sentencia->execute();
			      } 
	      	}
		
	      }

	      $this->db->commit(); 
	      return 1;
	    } catch (Exception $e) {
	      $this->db->rollBack(); 
	    //  echo "Fallo: " . $e->getLine() . "  ".$e->getMessage();
	      return -1;
	    }

	} 

}