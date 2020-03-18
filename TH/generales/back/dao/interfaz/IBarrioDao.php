<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\


interface IBarrioDao {

    /**
     * Guarda un objeto Barrio en la base de datos.
     * @param barrio objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($barrio);
    /**
     * Modifica un objeto Barrio en la base de datos.
     * @param barrio objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($barrio);
    /**
     * Elimina un objeto Barrio en la base de datos.
     * @param barrio objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($barrio);
    /**
     * Busca un objeto Barrio en la base de datos.
     * @param barrio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($barrio);
    /**
     * Lista todos los objetos Barrio en la base de datos.
     * @return Array<Barrio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!