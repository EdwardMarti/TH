<?php 
 include_once realpath('../mapper/Carnet_supervigilanciaMapper.php'); 
 
        class carnet_supervigilanciaController{ 
 public function insert($carnet_supervigilancia){
$carnet_supervigilanciaMapper = new Carnet_supervigilanciaMapper();
return $carnet_supervigilanciaMapper->insert($carnet_supervigilancia);
}
public function update($carnet_supervigilancia){
$carnet_supervigilanciaMapper = new Carnet_supervigilanciaMapper();
return $carnet_supervigilanciaMapper->update($carnet_supervigilancia);
}

 }?>