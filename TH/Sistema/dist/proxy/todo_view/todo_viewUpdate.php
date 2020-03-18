<?php 
 include_once realpath('../../controler/Todo_viewControler.php'); 
 require_once realpath('../../entity/Todo_view.php'); 
 $array_todo_view = $_POST['todo_view']; 
 $todo_view = new Todo_view(); 
 $todo_view->set_Meta_Columnas($array_todo_view); 
 echo Todo_viewControler::update($todo_view);
 ?>