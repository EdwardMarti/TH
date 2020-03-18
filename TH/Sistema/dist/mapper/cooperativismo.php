<?php 
 class CooperativismoMapper extends Mapper{ 

		 	public function listarCooperativismo(){ 
 $sql ="SELECT idcooperativismo, coop_nombre, coop_fecha, coop_nit, persona_id FROM cooperativismo; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new cooperativismo($fila));
}return $results;
 }
 

		  	public function insertCooperativismo(Cooperativismo $cooperativismo){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Cooperativismo));

			$parametros = SqlQuery::getArrayParametros($Cooperativismo);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateCooperativismo(Cooperativismo $cooperativismo){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Cooperativismo));

			$parametros = SqlQuery::getArrayParametros($Cooperativismo);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}