<?php 
 class Area_empresaMapper extends Mapper{ 

		 	public function listarArea_empresa(){ 
 $sql ="SELECT idarea_emp, nom_area, empresa_idempresa, estado FROM area_empresa; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new area_empresa($fila));
}return $results;
 }
 

		  	public function insertArea_empresa(Area_empresa $area_empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Area_empresa));

			$parametros = SqlQuery::getArrayParametros($Area_empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateArea_empresa(Area_empresa $area_empresa){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Area_empresa));

			$parametros = SqlQuery::getArrayParametros($Area_empresa);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}