<?php 
 class Familiar_has_celularMapper extends Mapper{ 

		 	public function listarFamiliar_has_celular(){ 
 $sql ="SELECT familiar_id, celular_id FROM familiar_has_celular; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new familiar_has_celular($fila));
}return $results;
 }
 

		  	public function insertFamiliar_has_celular(Familiar_has_celular $familiar_has_celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Familiar_has_celular));

			$parametros = SqlQuery::getArrayParametros($Familiar_has_celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateFamiliar_has_celular(Familiar_has_celular $familiar_has_celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Familiar_has_celular));

			$parametros = SqlQuery::getArrayParametros($Familiar_has_celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}