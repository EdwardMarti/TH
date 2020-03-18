<?php 
 class EstudioMapper extends Mapper{ 

		 	public function listarEstudio(){ 
 $sql ="SELECT nivel_academico, nivel_vigilancia, fecha_curso, nit_escuela, id, persona_id FROM estudio; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new estudio($fila));
}return $results;
 }
 

		  	public function insertEstudio(Estudio $estudio){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Estudio));

			$parametros = SqlQuery::getArrayParametros($Estudio);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateEstudio(Estudio $estudio){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Estudio));

			$parametros = SqlQuery::getArrayParametros($Estudio);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}