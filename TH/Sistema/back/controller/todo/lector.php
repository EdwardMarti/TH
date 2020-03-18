<?php

require_once '../../Classes/PHPExcel.php';
$archivo = "th.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$entidades = array("entidades" => []);
for ($row = 3; $row <= $highestRow; $row++) {
    array_push($entidades['entidades'], nuevo_empleado($sheet,$row));
}

print_r($entidades);

function nuevo_empleado($sheet,$row) {
    return
            array(
                'persona' => array(
                    'cedula' => $sheet->getCell("A" . $row)->getValue(),
                    'nacionalidad' => $sheet->getCell("B" . $row)->getValue(),
                    'cedula_lugar_expedicion' => $sheet->getCell("C" . $row)->getValue(),
                    'nombres' => $sheet->getCell("D" . $row)->getValue(),
                    'apellidos' => $sheet->getCell("E" . $row)->getValue(),
                    'fechaNacimiento' => $sheet->getCell("F" . $row)->getValue(),
                    'lugar_nacimiento' => $sheet->getCell("G" . $row)->getValue(),
                    'sexo' => $sheet->getCell("H" . $row)->getValue(),
                    'grupo_sanguineo' => $sheet->getCell("I" . $row)->getValue(),
                    'estado_civil' => $sheet->getCell("J" . $row)->getValue(),
                    'libreta' => $sheet->getCell("K" . $row)->getValue(),
                    'telefono' => $sheet->getCell("L" . $row)->getValue()
                ),
                'direccion' => array(
                    'direccion' => $sheet->getCell("M" . $row)->getValue(),
                    'barrio' => $sheet->getCell("N" . $row)->getValue()
                ),
                'banco' => array(
                    'banco_nombre' => $sheet->getCell("O" . $row)->getValue(),
                    'numero_cuenta' => $sheet->getCell("P" . $row)->getValue()
                ),
                'fechas' => array(
                    'estudio_seguridad' => $sheet->getCell("Q" . $row)->getValue(),
                    'examen_medico' => $sheet->getCell("R" . $row)->getValue(),
                    'prueba_psicotecnica' => $sheet->getCell("S" . $row)->getValue()
                ),
                'estudio' => array(
                    'nivel_academico' => $sheet->getCell("Y" . $row)->getValue(),
                    'nivel_vigilancia' => $sheet->getCell("Z" . $row)->getValue(),
                    'fecha_curso' => $sheet->getCell("AA" . $row)->getValue(),
                    'nit_escuela' => $sheet->getCell("AB" . $row)->getValue()
                ),
                'cooperativismo' => array(
                    'coop_nombre' => $sheet->getCell("AC" . $row)->getValue(),
                    'coop_fecha' => $sheet->getCell("AD" . $row)->getValue(),
                    'coop_nit' => $sheet->getCell("AE" . $row)->getValue()
                ),
                'varios' => array(
                    'cnsc' => $sheet->getCell("AF" . $row)->getValue(),
                    'carnet_supervigilancia_idcarne' => $sheet->getCell("AG" . $row)->getValue(),
                    'fecha_acre_super' => $sheet->getCell("AH" . $row)->getValue(),
                    'acta_consejo' => $sheet->getCell("AI" . $row)->getValue(),
                    'fecha_aceptacion' => $sheet->getCell("AJ" . $row)->getValue(),
                    'psicofisico' => $sheet->getCell("AK" . $row)->getValue(),
                    'fecha_examen_psicofisico' => $sheet->getCell("AL" . $row)->getValue()
                ),
                'salud' => array(
                    'salud' => $sheet->getCell("AM" . $row)->getValue(),
                    'pension' => $sheet->getCell("AN" . $row)->getValue()
                ),
                'cargo' => array(
                    'empresa_idempresa' => $sheet->getCell("AO" . $row)->getValue(),
                    'fecha_ingreso' => $sheet->getCell("AP" . $row)->getValue(),
                    'area_empresa_idarea_emp' => $sheet->getCell("AQ" . $row)->getValue(),
                    'cargo_empreso_idcargo' => $sheet->getCell("AR" . $row)->getValue(),
                    'puesto_idpuesto' => $sheet->getCell("AS" . $row)->getValue()
                )
    );
}

//function 









    /**
      //persona
      $sheet->getCell("A".$row)->getValue();
      $sheet->getCell("B".$row)->getValue();
      $sheet->getCell("C".$row)->getValue();
      $sheet->getCell("D".$row)->getValue();
      $sheet->getCell("E".$row)->getValue();
      $sheet->getCell("F".$row)->getValue();
      $sheet->getCell("G".$row)->getValue();
      $sheet->getCell("H".$row)->getValue();
      $sheet->getCell("I".$row)->getValue();
      $sheet->getCell("J".$row)->getValue();
      $sheet->getCell("K".$row)->getValue();
      $sheet->getCell("L".$row)->getValue();
      $sheet->getCell("M".$row)->getValue();
      //direccion
      $sheet->getCell("N".$row)->getValue();
      $sheet->getCell("O".$row)->getValue();
      //banco
      $sheet->getCell("P".$row)->getValue();
      $sheet->getCell("Q".$row)->getValue();
      //fechasParticulares
      $sheet->getCell("R".$row)->getValue();
      $sheet->getCell("S".$row)->getValue();
      $sheet->getCell("T".$row)->getValue();
      //Familiares
      /*
      $sheet->getCell("U".$row)->getValue();
      $sheet->getCell("V".$row)->getValue();
      $sheet->getCell("W".$row)->getValue();
      $sheet->getCell("X".$row)->getValue();
      $sheet->getCell("Y".$row)->getValue();
     *
      //Estudio
      $sheet->getCell("Z".$row)->getValue();
      $sheet->getCell("AA".$row)->getValue();
      $sheet->getCell("AB".$row)->getValue();
      $sheet->getCell("AC".$row)->getValue();
      //coopertaivismo
      $sheet->getCell("AD".$row)->getValue();
      $sheet->getCell("AE".$row)->getValue();
      $sheet->getCell("AF".$row)->getValue();
      //varios
      $sheet->getCell("AG".$row)->getValue();
      $sheet->getCell("AH".$row)->getValue();
      $sheet->getCell("AI".$row)->getValue();
      $sheet->getCell("AJ".$row)->getValue();
      $sheet->getCell("AK".$row)->getValue();
      $sheet->getCell("AL".$row)->getValue();
      $sheet->getCell("AM".$row)->getValue();
      //Salud y pension
      $sheet->getCell("AN".$row)->getValue();
      $sheet->getCell("AO".$row)->getValue();
      //empresa
      $sheet->getCell("AP".$row)->getValue();
      $sheet->getCell("AQ".$row)->getValue();
      $sheet->getCell("AR".$row)->getValue();
      $sheet->getCell("AS".$row)->getValue();
      $sheet->getCell("AT".$row)->getValue();
      //otros
      $sheet->getCell("AU".$row)->getValue();
      $sheet->getCell("AV".$row)->getValue();
     */
