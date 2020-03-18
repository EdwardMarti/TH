<?php 
 class PersonaMapper extends Mapper{ 

		 	public function listarPersona(){ 
 $sql ="SELECT id, cedula, nacionalidad, cedula_lugar_expedicion, nombres, apellidos, fechaNacimiento, lugar_nacimiento, sexo, grupo_sanguineo, estado_civil, correo, estado, cargo_id, nivel_vigilancia_id, tipo_vigilancia_id, libreta FROM persona; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new persona($fila));
}return $results;
 }
 

		  	public function insertPersona(Persona $persona){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Persona));

			$parametros = SqlQuery::getArrayParametros($Persona);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updatePersona(Persona $persona){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Persona));

			$parametros = SqlQuery::getArrayParametros($Persona);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}