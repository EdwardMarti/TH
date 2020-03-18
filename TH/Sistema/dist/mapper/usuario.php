<?php 
 class UsuarioMapper extends Mapper{ 

		 	public function listarUsuario(){ 
 $sql ="SELECT idusuario, cedula, usuario_nombre, usuario_correo, usuario_pass, cargo_empreso_idcargo, user_activation_code, user_email_status, roll_idroll, estado FROM usuario; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new usuario($fila));
}return $results;
 }
 

		  	public function insertUsuario(Usuario $usuario){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLInsertPreparado($Usuario));

			$parametros = SqlQuery::getArrayParametros($Usuario);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		  	public function updateUsuario(Usuario $usuario){ 
 
			$sentencia = $this->db->prepare(SqlQuery::getSQLUpdatePreparado($Usuario));

			$parametros = SqlQuery::getArrayParametros($Usuario);

			foreach ($parametros as $key => &$val) { 

				$sentencia->bindParam($key, $val);
}

			$sentencia->execute(); 
      		return $this->db->lastInsertId();
 } 

		}