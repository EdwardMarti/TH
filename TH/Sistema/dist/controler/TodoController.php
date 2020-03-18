<?php 
include substr(getcwd(), 0, strlen(getcwd())-10).'mapper/TodoMapper.php';

class TodoController{ 

public function actualizarTodo($todos,$mis_Fami,$famiNuevos){
	$todoMapper = new TodoMapper();
	return $todoMapper->actualizarTodo($todos,$mis_Fami,$famiNuevos);
}

}

 ?>