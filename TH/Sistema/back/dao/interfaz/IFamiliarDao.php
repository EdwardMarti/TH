<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface IFamiliarDao {

    /**
     * Guarda un objeto Familiar en la base de datos.
     * @param familiar objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($familiar);
    /**
     * Modifica un objeto Familiar en la base de datos.
     * @param familiar objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($familiar);
    /**
     * Elimina un objeto Familiar en la base de datos.
     * @param familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($familiar);
    /**
     * Busca un objeto Familiar en la base de datos.
     * @param familiar objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($familiar);
    /**
     * Lista todos los objetos Familiar en la base de datos.
     * @return Array<Familiar> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!