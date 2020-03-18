<?php 
 class FamiliarMapper extends Mapper{ 

		 	public function listarFamiliar(){ 
 $sql ="SELECT id, nombre, apellido, parentesco, persona_id FROM familiar; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new familiar($fila));
}return $results;
 }
 

		  	public function insertFamiliar(Familiar $familiar){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Familiar));

			$parametros = SqlQuery::getArrayParametros($Familiar);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateFamiliar(Familiar $familiar){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Familiar));

			$parametros = SqlQuery::getArrayParametros($Familiar);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}