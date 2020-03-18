<?php
$cedula = $_POST['cedula'];
$directorio = 'E:\\archivos\\'.$cedula;
$ficheros1  = scandir($directorio,1);
unset($ficheros1[count($ficheros1)-1],$ficheros1[count($ficheros1)-1]);
echo json_encode($ficheros1);