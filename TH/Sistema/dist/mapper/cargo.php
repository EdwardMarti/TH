<?php 
 class CargoMapper extends Mapper{ 

		 	public function listarCargo(){ 
 $sql ="SELECT id, fecha_ingreso, empresa_idempresa, area_empresa_idarea_emp, cargo_empreso_idcargo, puesto_idpuesto FROM cargo; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new cargo($fila));
}return $results;
 }
 

		  	public function insertCargo(Cargo $cargo){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Cargo));

			$parametros = SqlQuery::getArrayParametros($Cargo);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateCargo(Cargo $cargo){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Cargo));

			$parametros = SqlQuery::getArrayParametros($Cargo);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}