<?php 
 class Persona_has_celularMapper extends Mapper{ 

		 	public function listarPersona_has_celular(){ 
 $sql ="SELECT persona_id, celular_id FROM persona_has_celular; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new persona_has_celular($fila));
}return $results;
 }
 

		  	public function insertPersona_has_celular(Persona_has_celular $persona_has_celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Persona_has_celular));

			$parametros = SqlQuery::getArrayParametros($Persona_has_celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updatePersona_has_celular(Persona_has_celular $persona_has_celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Persona_has_celular));

			$parametros = SqlQuery::getArrayParametros($Persona_has_celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}