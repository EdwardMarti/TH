<?php 
 include_once realpath('../mapper/FamiliarMapper.php'); 
 
        class familiarController{ 
 public function insert($familiar){
$familiarMapper = new FamiliarMapper();
return $familiarMapper->insert($familiar);
}
public function update($familiar){
$familiarMapper = new FamiliarMapper();
return $familiarMapper->update($familiar);
}

 }?>