<?php 
 include_once realpath('../mapper/CooperativismoMapper.php'); 
 
        class cooperativismoController{ 
 public function insert($cooperativismo){
$cooperativismoMapper = new CooperativismoMapper();
return $cooperativismoMapper->insert($cooperativismo);
}
public function update($cooperativismo){
$cooperativismoMapper = new CooperativismoMapper();
return $cooperativismoMapper->update($cooperativismo);
}

 }?>