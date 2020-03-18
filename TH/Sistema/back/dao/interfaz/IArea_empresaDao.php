<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface IArea_empresaDao {

    /**
     * Guarda un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($area_empresa);
    /**
     * Modifica un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($area_empresa);
    /**
     * Elimina un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($area_empresa);
    /**
     * Busca un objeto Area_empresa en la base de datos.
     * @param area_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($area_empresa);
    /**
     * Lista todos los objetos Area_empresa en la base de datos.
     * @return Array<Area_empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!