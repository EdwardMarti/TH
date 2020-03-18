<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\


interface IEmpresaDao {

    /**
     * Guarda un objeto Empresa en la base de datos.
     * @param empresa objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($empresa);
    /**
     * Modifica un objeto Empresa en la base de datos.
     * @param empresa objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($empresa);
    /**
     * Elimina un objeto Empresa en la base de datos.
     * @param empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($empresa);
    /**
     * Busca un objeto Empresa en la base de datos.
     * @param empresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($empresa);
    /**
     * Lista todos los objetos Empresa en la base de datos.
     * @return Array<Empresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!