<?php
/****************************************************/
$nombre_archivos = array("foto","cedula","libreta","diploma_bachiller","curso_vigilancia","estudio_seguridad","acta_consejo","curso_cooperativismo","otros_cursos","certificacion_laboral");
/*****************************************************/

$cedula = $_POST['cedula'];

$carpeta = crearCarpeta($cedula);

foreach ($nombre_archivos as $nombre) {
    if ($_FILES[$nombre]["error"] != 4){
        //echo $carpeta;
        guardarArchivo($carpeta, $_FILES[$nombre],$nombre);
    }
}

function crearCarpeta($nombre){
    $carpeta = 'E:\\archivos\\'.$nombre;
    if (!file_exists($carpeta)) {
        echo $carpeta;
        mkdir($carpeta, 7777);
    }
    return $carpeta;
}

function guardarArchivo($carpeta,$archivo,$nombre){
    $dir_subida = $carpeta."/";
    $fichero_subido = $dir_subida.$nombre.".".getFormato($archivo['type']);

echo '<pre>';
if (move_uploaded_file($archivo['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";
  

}

function getFormato($ext){
    $f = explode("/", $ext);
    return $f[1];
}


