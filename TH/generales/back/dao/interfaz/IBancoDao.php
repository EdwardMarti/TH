<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\


interface IBancoDao {

    /**
     * Guarda un objeto Banco en la base de datos.
     * @param banco objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($banco);
    /**
     * Modifica un objeto Banco en la base de datos.
     * @param banco objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($banco);
    /**
     * Elimina un objeto Banco en la base de datos.
     * @param banco objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($banco);
    /**
     * Busca un objeto Banco en la base de datos.
     * @param banco objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($banco);
    /**
     * Lista todos los objetos Banco en la base de datos.
     * @return Array<Banco> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!