<?php 
 class CelularMapper extends Mapper{ 

		 	public function listarCelular(){ 
 $sql ="SELECT id, numero FROM celular; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new celular($fila));
}return $results;
 }
 

		  	public function insertCelular(Celular $celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Celular));

			$parametros = SqlQuery::getArrayParametros($Celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateCelular(Celular $celular){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Celular));

			$parametros = SqlQuery::getArrayParametros($Celular);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}