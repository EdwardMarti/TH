<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    In Anarchy we trust  \\


interface IPuestoDao {

    /**
     * Guarda un objeto Puesto en la base de datos.
     * @param puesto objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($puesto);
    /**
     * Modifica un objeto Puesto en la base de datos.
     * @param puesto objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($puesto);
    /**
     * Elimina un objeto Puesto en la base de datos.
     * @param puesto objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($puesto);
    /**
     * Busca un objeto Puesto en la base de datos.
     * @param puesto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($puesto);
    /**
     * Lista todos los objetos Puesto en la base de datos.
     * @return Array<Puesto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!