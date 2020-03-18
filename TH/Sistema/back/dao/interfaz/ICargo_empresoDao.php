<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\


interface ICargo_empresoDao {

    /**
     * Guarda un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cargo_empreso);
    /**
     * Modifica un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cargo_empreso);
    /**
     * Elimina un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cargo_empreso);
    /**
     * Busca un objeto Cargo_empreso en la base de datos.
     * @param cargo_empreso objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cargo_empreso);
    /**
     * Lista todos los objetos Cargo_empreso en la base de datos.
     * @return Array<Cargo_empreso> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!