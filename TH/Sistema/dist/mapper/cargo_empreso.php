<?php 
 class Cargo_empresoMapper extends Mapper{ 

		 	public function listarCargo_empreso(){ 
 $sql ="SELECT idcargo, nom_cargo, area_empresa_idarea_emp FROM cargo_empreso; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new cargo_empreso($fila));
}return $results;
 }
 

		  	public function insertCargo_empreso(Cargo_empreso $cargo_empreso){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Cargo_empreso));

			$parametros = SqlQuery::getArrayParametros($Cargo_empreso);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateCargo_empreso(Cargo_empreso $cargo_empreso){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Cargo_empreso));

			$parametros = SqlQuery::getArrayParametros($Cargo_empreso);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}