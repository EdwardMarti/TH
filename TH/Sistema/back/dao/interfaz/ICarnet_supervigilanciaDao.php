<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\


interface ICarnet_supervigilanciaDao {

    /**
     * Guarda un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($carnet_supervigilancia);
    /**
     * Modifica un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($carnet_supervigilancia);
    /**
     * Elimina un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($carnet_supervigilancia);
    /**
     * Busca un objeto Carnet_supervigilancia en la base de datos.
     * @param carnet_supervigilancia objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($carnet_supervigilancia);
    /**
     * Lista todos los objetos Carnet_supervigilancia en la base de datos.
     * @return Array<Carnet_supervigilancia> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!