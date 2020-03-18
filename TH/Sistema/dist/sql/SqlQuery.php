<?php
include 'DML.php';
/**
 * Generadora automatica de querys
 */
class SqlQuery extends DML {


  //SQL CLASICO
	public static function getSQLInsert($entidad){
    $sql = implode(" ",[DML::$INSERT_INTO, $entidad->getNombreClase()]);
    $col = $entidad->getColumnas();
    $nom = implode(", ",array_keys($col));
    $val = "'".implode("', '",$col)."'";
    $sql .= " (".$nom.") ".DML::$VALUES." (".$val.")";
    return $sql; 
  }


  public static function getSQLInsertPreparado($entidad){
    $sql = implode(" ",[DML::$INSERT_INTO, $entidad->getNombreClase()]);
    $col = $entidad->getColumnas();
    $nom = implode(", ",array_keys($col));
    $val = ":".implode(", :",array_keys($col));
    $sql .= " (".$nom.") ".DML::$VALUES." (".$val.")";
    return $sql;
  }



//-------------------------------------------------------------------------------
//UPDATE `banco` SET `idbanco`=[value-1],`banco_nombre`=[value-2],`numero_cuenta`=[value-3],`persona_id`=[value-4] WHERE 1

  public static function getSQLUpdate($entidad){
    $sql = implode(" ",[DML::$UPDATE, $entidad->getNombreClase(), DML::$SET]);
    $col =  $entidad->getColumnas();
    $sql .= SqlQuery::combinar(array_keys($col),array_values($col));
    $sql .= " ".DML::$WHERE.SqlQuery::combinar(array_keys($entidad->getPK()),array_values($entidad->getPK()),["="," AND"]);
    //print_r($entidad->getPK());
    return $sql;
  }

  public static function getSQLUpdatePreparado($entidad){
    $sql = implode(" ",[DML::$UPDATE, $entidad->getNombreClase(), DML::$SET]);
    $col =  SqlQuery::filtrarColumnas($entidad->getColumnas(),$entidad->getPK());
    $sql .= SqlQuery::combinar(array_keys($col),array_map("SqlQuery::ap",array_keys($col)));
    $sql .= " ".DML::$WHERE.SqlQuery::combinar(array_keys($entidad->getPK()),array_map("SqlQuery::ap",array_keys($entidad->getPK())),["="," AND"]);
    //print_r($entidad->getPK());
    return $sql;
  }

  private static function filtrarColumnas($columnas, $keys){
    $k = array_keys($keys);
    for ($i=0; $i < count($k); $i++) { 
      unset($columnas[$k[$i]]);
    }
    return $columnas;
  }

  private static function combinar($arr_1,$arr_2,$reglas = array("=",",")){
    $rta = " ";
    for ($i = 0; $i < count($arr_1); $i++) { 
      $rta .= $arr_1[$i].$reglas[0].$arr_2[$i].$reglas[1]." ";
    }
    return substr($rta,0,strlen($rta)-(strlen($reglas[1])+1));
}



//-------------------------------------
  public static function getArrayParametros($entidad){
    $col =  $entidad->getColumnas();
    $key = array_map("SqlQuery::ap", array_keys($col));
    return array_combine($key, array_values($col));
  }

  private static function ap($ap){
    return ":".$ap;
  }

//-----------------------------------
}