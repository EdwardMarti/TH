<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\


interface ICargoDao {

    /**
     * Guarda un objeto Cargo en la base de datos.
     * @param cargo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cargo);
    /**
     * Modifica un objeto Cargo en la base de datos.
     * @param cargo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cargo);
    /**
     * Elimina un objeto Cargo en la base de datos.
     * @param cargo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cargo);
    /**
     * Busca un objeto Cargo en la base de datos.
     * @param cargo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cargo);
    /**
     * Lista todos los objetos Cargo en la base de datos.
     * @return Array<Cargo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!