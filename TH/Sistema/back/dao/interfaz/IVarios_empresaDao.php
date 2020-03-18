<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Vaya! ¡Al fin harás algo mejor que una calculadora!  \\


interface IVarios_empresaDao {

    /**
     * Guarda un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($varios_empresa);
    /**
     * Modifica un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($varios_empresa);
    /**
     * Elimina un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($varios_empresa);
    /**
     * Busca un objeto Varios_empresa en la base de datos.
     * @param varios_empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($varios_empresa);
    /**
     * Lista todos los objetos Varios_empresa en la base de datos.
     * @return Array<Varios_empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!