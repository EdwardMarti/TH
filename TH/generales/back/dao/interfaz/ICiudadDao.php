<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface ICiudadDao {

    /**
     * Guarda un objeto Ciudad en la base de datos.
     * @param ciudad objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($ciudad);
    /**
     * Modifica un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($ciudad);
    /**
     * Elimina un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($ciudad);
    /**
     * Busca un objeto Ciudad en la base de datos.
     * @param ciudad objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($ciudad);
    /**
     * Lista todos los objetos Ciudad en la base de datos.
     * @return Array<Ciudad> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!