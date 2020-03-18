<?php

$cedula = $_GET['cedula'];
$archivo = $_GET['tipo'];

header("Content-disposition: attachment; filename=".$archivo);
header("Content-type: application/".explode(".", $archivo)[1]);
readfile('E:\\archivos\\'.$cedula.'\\'.$archivo);
?>