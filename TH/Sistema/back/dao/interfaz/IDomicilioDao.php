<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\


interface IDomicilioDao {

    /**
     * Guarda un objeto Domicilio en la base de datos.
     * @param domicilio objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($domicilio);
    /**
     * Modifica un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($domicilio);
    /**
     * Elimina un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($domicilio);
    /**
     * Busca un objeto Domicilio en la base de datos.
     * @param domicilio objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($domicilio);
    /**
     * Lista todos los objetos Domicilio en la base de datos.
     * @return Array<Domicilio> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!