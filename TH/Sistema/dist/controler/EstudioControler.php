<?php 
 include_once realpath('../mapper/EstudioMapper.php'); 
 
        class estudioController{ 
 public function insert($estudio){
$estudioMapper = new EstudioMapper();
return $estudioMapper->insert($estudio);
}
public function update($estudio){
$estudioMapper = new EstudioMapper();
return $estudioMapper->update($estudio);
}

 }?>