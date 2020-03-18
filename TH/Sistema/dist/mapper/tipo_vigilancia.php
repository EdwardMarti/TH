<?php 
 class Tipo_vigilanciaMapper extends Mapper{ 

		 	public function listarTipo_vigilancia(){ 
 $sql ="SELECT id, tipo_vigilancia FROM tipo_vigilancia; " ;
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new tipo_vigilancia($fila));
}return $results;
 }
 

		  	public function insertTipo_vigilancia(Tipo_vigilancia $tipo_vigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Tipo_vigilancia));

			$parametros = SqlQuery::getArrayParametros($Tipo_vigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateTipo_vigilancia(Tipo_vigilancia $tipo_vigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Tipo_vigilancia));

			$parametros = SqlQuery::getArrayParametros($Tipo_vigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}