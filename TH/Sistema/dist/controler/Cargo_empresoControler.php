<?php 
 include_once realpath('../mapper/Cargo_empresoMapper.php'); 
 
        class cargo_empresoController{ 
 public function insert($cargo_empreso){
$cargo_empresoMapper = new Cargo_empresoMapper();
return $cargo_empresoMapper->insert($cargo_empreso);
}
public function update($cargo_empreso){
$cargo_empresoMapper = new Cargo_empresoMapper();
return $cargo_empresoMapper->update($cargo_empreso);
}

 }?>