<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\


interface IArlDao {

    /**
     * Guarda un objeto Arl en la base de datos.
     * @param arl objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($arl);
    /**
     * Modifica un objeto Arl en la base de datos.
     * @param arl objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($arl);
    /**
     * Elimina un objeto Arl en la base de datos.
     * @param arl objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($arl);
    /**
     * Busca un objeto Arl en la base de datos.
     * @param arl objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($arl);
    /**
     * Lista todos los objetos Arl en la base de datos.
     * @return Array<Arl> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!