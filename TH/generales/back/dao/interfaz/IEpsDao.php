<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\


interface IEpsDao {

    /**
     * Guarda un objeto Eps en la base de datos.
     * @param eps objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($eps);
    /**
     * Modifica un objeto Eps en la base de datos.
     * @param eps objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($eps);
    /**
     * Elimina un objeto Eps en la base de datos.
     * @param eps objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($eps);
    /**
     * Busca un objeto Eps en la base de datos.
     * @param eps objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($eps);
    /**
     * Lista todos los objetos Eps en la base de datos.
     * @return Array<Eps> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!