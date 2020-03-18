<?php 
 class Varios_empresaMapper extends Mapper{ 

		 	public function listarVarios_empresa(){ 
 $sql ="SELECT idvarios_empresa, cnsc, fecha_acre_super, acta_consejo, fecha_aceptacion, psicofisico, fecha_examen_psicofisico, carnet_supervigilancia_idcarne, persona_id FROM varios_empresa; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new varios_empresa($fila));
}return $results;
 }
 

		  	public function insertVarios_empresa(Varios_empresa $varios_empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Varios_empresa));

			$parametros = SqlQuery::getArrayParametros($Varios_empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateVarios_empresa(Varios_empresa $varios_empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Varios_empresa));

			$parametros = SqlQuery::getArrayParametros($Varios_empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}