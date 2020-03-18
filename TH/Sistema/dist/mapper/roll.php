<?php 
 class RollMapper extends Mapper{ 

		 	public function listarRoll(){ 
 $sql ="SELECT idroll, roll_nombre FROM roll; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new roll($fila));
}return $results;
 }
 

		  	public function insertRoll(Roll $roll){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Roll));

			$parametros = SqlQuery::getArrayParametros($Roll);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateRoll(Roll $roll){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Roll));

			$parametros = SqlQuery::getArrayParametros($Roll);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}