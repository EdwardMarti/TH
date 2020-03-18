<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\


interface IFamiliar_has_celularDao {

    /**
     * Guarda un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($familiar_has_celular);
    /**
     * Modifica un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($familiar_has_celular);
    /**
     * Elimina un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($familiar_has_celular);
    /**
     * Busca un objeto Familiar_has_celular en la base de datos.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($familiar_has_celular);
    /**
     * Lista todos los objetos Familiar_has_celular en la base de datos.
     * @return Array<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Lista todos los objetos Familiar_has_celular en la base de datos que coincidan con la llave primaria.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByFamiliar_id($familiar_has_celular);
    /**
     * Lista todos los objetos Familiar_has_celular en la base de datos que coincidan con la llave primaria.
     * @param familiar_has_celular objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Familiar_has_celular> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByCelular_id($familiar_has_celular);
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!