<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../../facade/CooperativismoFacade.php');

$idcooperativismo = $_POST['idcooperativismo'];
$coop_nombre = $_POST['coop_nombre'];
$coop_fecha = $_POST['coop_fecha'];
$coop_nit = $_POST['coop_nit'];
$Persona_id = $_POST['persona_id'];
$persona= new Persona();
$persona->setId($Persona_id);
CooperativismoFacade::insert($idcooperativismo, $coop_nombre, $coop_fecha, $coop_nit, $persona);
echo "true";

//That´s all folks!