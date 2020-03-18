<?php 
 class Nivel_vigilanciaMapper extends Mapper{ 

		 	public function listarNivel_vigilancia(){ 
 $sql ="SELECT id, nombre FROM nivel_vigilancia; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new nivel_vigilancia($fila));
}return $results;
 }
 

		  	public function insertNivel_vigilancia(Nivel_vigilancia $nivel_vigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Nivel_vigilancia));

			$parametros = SqlQuery::getArrayParametros($Nivel_vigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateNivel_vigilancia(Nivel_vigilancia $nivel_vigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Nivel_vigilancia));

			$parametros = SqlQuery::getArrayParametros($Nivel_vigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}