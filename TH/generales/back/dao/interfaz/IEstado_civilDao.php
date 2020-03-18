<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\


interface IEstado_civilDao {

    /**
     * Guarda un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estado_civil);
    /**
     * Modifica un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estado_civil);
    /**
     * Elimina un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estado_civil);
    /**
     * Busca un objeto Estado_civil en la base de datos.
     * @param estado_civil objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estado_civil);
    /**
     * Lista todos los objetos Estado_civil en la base de datos.
     * @return Array<Estado_civil> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!