<?php 
 class PuestoMapper extends Mapper{ 

		 	public function listarPuesto(){ 
 $sql ="SELECT idpuesto, nombre FROM puesto; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new puesto($fila));
}return $results;
 }
 

		  	public function insertPuesto(Puesto $puesto){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Puesto));

			$parametros = SqlQuery::getArrayParametros($Puesto);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updatePuesto(Puesto $puesto){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Puesto));

			$parametros = SqlQuery::getArrayParametros($Puesto);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}