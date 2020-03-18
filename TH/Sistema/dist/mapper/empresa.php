<?php 
 class EmpresaMapper extends Mapper{ 

		 	public function listarEmpresa(){ 
 $sql ="SELECT idempresa, nombre_empresa, nit_empresa, direccion_empresa FROM empresa; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new empresa($fila));
}return $results;
 }
 

		  	public function insertEmpresa(Empresa $empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Empresa));

			$parametros = SqlQuery::getArrayParametros($Empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateEmpresa(Empresa $empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Empresa));

			$parametros = SqlQuery::getArrayParametros($Empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}