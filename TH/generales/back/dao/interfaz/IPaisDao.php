<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


interface IPaisDao {

    /**
     * Guarda un objeto Pais en la base de datos.
     * @param pais objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pais);
    /**
     * Modifica un objeto Pais en la base de datos.
     * @param pais objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pais);
    /**
     * Elimina un objeto Pais en la base de datos.
     * @param pais objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pais);
    /**
     * Busca un objeto Pais en la base de datos.
     * @param pais objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pais);
    /**
     * Lista todos los objetos Pais en la base de datos.
     * @return Array<Pais> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!