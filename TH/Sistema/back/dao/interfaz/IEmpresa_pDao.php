<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\


interface IEmpresa_pDao {

    /**
     * Guarda un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($empresa_p);
    /**
     * Modifica un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($empresa_p);
    /**
     * Elimina un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($empresa_p);
    /**
     * Busca un objeto Empresa_p en la base de datos.
     * @param empresa_p objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($empresa_p);
    /**
     * Lista todos los objetos Empresa_p en la base de datos.
     * @return Array<Empresa_p> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!