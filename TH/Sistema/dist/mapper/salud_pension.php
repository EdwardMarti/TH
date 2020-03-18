<?php 
 class Salud_pensionMapper extends Mapper{ 

		 	public function listarSalud_pension(){ 
 $sql ="SELECT id, salud, pension, persona_id FROM salud_pension; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new salud_pension($fila));
}return $results;
 }
 

		  	public function insertSalud_pension(Salud_pension $salud_pension){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Salud_pension));

			$parametros = SqlQuery::getArrayParametros($Salud_pension);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateSalud_pension(Salud_pension $salud_pension){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Salud_pension));

			$parametros = SqlQuery::getArrayParametros($Salud_pension);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}