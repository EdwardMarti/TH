<?php 
 class DomicilioMapper extends Mapper{ 

		 	public function listarDomicilio(){ 
 $sql ="SELECT id, direccion, barrio, persona_id FROM domicilio; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new domicilio($fila));
}return $results;
 }
 

		  	public function insertDomicilio(Domicilio $domicilio){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Domicilio));

			$parametros = SqlQuery::getArrayParametros($Domicilio);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateDomicilio(Domicilio $domicilio){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Domicilio));

			$parametros = SqlQuery::getArrayParametros($Domicilio);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}