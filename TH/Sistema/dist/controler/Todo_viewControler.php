<?php 
 include_once realpath('../mapper/Todo_viewMapper.php'); 
 
        class todo_viewController{ 
 public function insert($todo_view){
$todo_viewMapper = new Todo_viewMapper();
return $todo_viewMapper->insert($todo_view);
}
public function update($todo_view){
$todo_viewMapper = new Todo_viewMapper();
return $todo_viewMapper->update($todo_view);
}

 }?>