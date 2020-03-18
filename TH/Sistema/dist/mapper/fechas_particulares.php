<?php 
 class Fechas_particularesMapper extends Mapper{ 

		 	public function listarFechas_particulares(){ 
 $sql ="SELECT estudio_seguridad, examen_medico, prueba_psicotecnica, id, persona_id FROM fechas_particulares; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new fechas_particulares($fila));
}return $results;
 }
 

		  	public function insertFechas_particulares(Fechas_particulares $fechas_particulares){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Fechas_particulares));

			$parametros = SqlQuery::getArrayParametros($Fechas_particulares);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateFechas_particulares(Fechas_particulares $fechas_particulares){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Fechas_particulares));

			$parametros = SqlQuery::getArrayParametros($Fechas_particulares);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}