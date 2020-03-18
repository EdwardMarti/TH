<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Para entender la recursividad, primero debes entender la recursividad  \\


interface IPensionDao {

    /**
     * Guarda un objeto Pension en la base de datos.
     * @param pension objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pension);
    /**
     * Modifica un objeto Pension en la base de datos.
     * @param pension objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pension);
    /**
     * Elimina un objeto Pension en la base de datos.
     * @param pension objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pension);
    /**
     * Busca un objeto Pension en la base de datos.
     * @param pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pension);
    /**
     * Lista todos los objetos Pension en la base de datos.
     * @return Array<Pension> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!