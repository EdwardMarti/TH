<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\


interface ISalud_pensionDao {

    /**
     * Guarda un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($salud_pension);
    /**
     * Modifica un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($salud_pension);
    /**
     * Elimina un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($salud_pension);
    /**
     * Busca un objeto Salud_pension en la base de datos.
     * @param salud_pension objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($salud_pension);
    /**
     * Lista todos los objetos Salud_pension en la base de datos.
     * @return Array<Salud_pension> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!