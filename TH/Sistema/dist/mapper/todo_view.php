<?php 
 class Todo_viewMapper extends Mapper{ 

		 	public function listarTodo_view(){ 
 $sql ="SELECT id, cedula, nacionalidad, cedula_lugar_expedicion, nombres, apellidos, fechaNacimiento, lugar_nacimiento, sexo, grupo_sanguineo, estado_civil, correo, cargo_id, nivel_vigilancia_id, tipo_vigilancia_id, libreta, direccion, barrio, estudio_seguridad, examen_medico, prueba_psicotecnica, nivel_academico, nivel_vigilancia, fecha_curso, nit_escuela, salud, pension, banco_nombre, numero_cuenta, coop_nombre, coop_fecha, coop_nit, cnsc, fecha_acre_super, acta_consejo, fecha_aceptacion, psicofisico, fecha_examen_psicofisico, carnet_supervigilancia_idcarne, persona_id, id_cargo, fecha_ingreso, empresa_idempresa, area_empresa_idarea_emp, cargo_empreso_idcargo, puesto_idpuesto FROM todo_view; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new todo_view($fila));
}return $results;
 }
 

		  	public function insertTodo_view(Todo_view $todo_view){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Todo_view));

			$parametros = SqlQuery::getArrayParametros($Todo_view);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateTodo_view(Todo_view $todo_view){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Todo_view));

			$parametros = SqlQuery::getArrayParametros($Todo_view);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}