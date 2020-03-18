<?php 
 class Carnet_supervigilanciaMapper extends Mapper{ 

		 	public function listarCarnet_supervigilancia(){ 
 $sql ="SELECT idcarne, carnet_nombre FROM carnet_supervigilancia; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new carnet_supervigilancia($fila));
}return $results;
 }
 

		  	public function insertCarnet_supervigilancia(Carnet_supervigilancia $carnet_supervigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Carnet_supervigilancia));

			$parametros = SqlQuery::getArrayParametros($Carnet_supervigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateCarnet_supervigilancia(Carnet_supervigilancia $carnet_supervigilancia){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Carnet_supervigilancia));

			$parametros = SqlQuery::getArrayParametros($Carnet_supervigilancia);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}