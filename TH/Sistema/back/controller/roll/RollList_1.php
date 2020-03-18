

<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

////    ¿Me ayudas con la tesis?  \\

//    Únicamente cuando se pierde todo somos libres para actuar.  \\
include_once realpath('../../facade/RollFacade.php');

$list=RollFacade::listAll();
$rta="";

$cont=1;


    

$rta="<div class=\"form-group\">
                    <select class=\"form-control m-b\"  name=\"roll_idroll\" id=\"roll_idroll\">";

foreach ($list as $obj => $Roll) {

$rta.="
<option value=".$Roll->getidroll().">".$cont." - ".$Roll->getroll_nombre()."</option>";

   $cont=$cont+1;
}

$rta.="  </select>
                             
 </div>";

echo $rta;

//That´s all folks!