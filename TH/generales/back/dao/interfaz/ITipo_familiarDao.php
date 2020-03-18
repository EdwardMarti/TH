<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    In Anarchy we trust  \\


interface ITipo_familiarDao {

    /**
     * Guarda un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_familiar);
    /**
     * Modifica un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_familiar);
    /**
     * Elimina un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_familiar);
    /**
     * Busca un objeto Tipo_familiar en la base de datos.
     * @param tipo_familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_familiar);
    /**
     * Lista todos los objetos Tipo_familiar en la base de datos.
     * @return Array<Tipo_familiar> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!