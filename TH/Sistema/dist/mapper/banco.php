<?php 
 class BancoMapper extends Mapper{ 

		 	public function listarBanco(){ 
 $sql ="SELECT idbanco, banco_nombre, numero_cuenta, persona_id FROM banco; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new banco($fila));
}return $results;
 }
 

		  	public function insertBanco(Banco $banco){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Banco));

			$parametros = SqlQuery::getArrayParametros($Banco);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateBanco(Banco $banco){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Banco));

			$parametros = SqlQuery::getArrayParametros($Banco);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}