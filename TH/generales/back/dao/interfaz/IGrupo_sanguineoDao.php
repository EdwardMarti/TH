<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hey ¿cómo se llama tu café internet?  \\


interface IGrupo_sanguineoDao {

    /**
     * Guarda un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_sanguineo);
    /**
     * Modifica un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_sanguineo);
    /**
     * Elimina un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_sanguineo);
    /**
     * Busca un objeto Grupo_sanguineo en la base de datos.
     * @param grupo_sanguineo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_sanguineo);
    /**
     * Lista todos los objetos Grupo_sanguineo en la base de datos.
     * @return Array<Grupo_sanguineo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!