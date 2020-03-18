<?php

include_once realpath('../../facade/UsuarioFacade.php');

$list=UsuarioFacade::listAll_User();
$rta="";
$cont=1;


    

$rta="<div class=\"form-group\">
                    <select class=\"form-control m-b\"  name=\"cargo\" id=\"cargo\">";




foreach ($list as $obj => $Usuario) {	
	$rta.="{
<option value=".$Usuario->getus_id_cargo().">".$cont." - ".$Usuario->getusuario_correo()."</option>";

   $cont=$cont+1;
}

$rta.="  </select>
                             
 </div>";

echo $rta;

//That´s all folks!