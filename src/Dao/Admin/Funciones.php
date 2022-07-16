<?php
/**
 * PHP Version 7
 * Modelo de Datos para modelo
 *
 * @category Data_Model
 * @package  Models${1:modelo}
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */

namespace Dao\Admin;

use Dao\Table;
use phpDocumentor\Reflection\Types\Void_;

/**
 * Modelo de Datos para la tabla de Funciones
 *
 * @category Data_Model
 * @package  Dao.Table
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @link http://url.com
 */
class Funciones extends Table
{
    public static function getAll() {
        $sqlstr= "Select * from funciones;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function getById($fncod) {
        $sqlstr="SELECT * FROM funciones WHERE fncod = :fncod ;";
        $sqlparams= array(
            "fncod" => $fncod
        );
       return self::obtenerUnRegistro($sqlstr, $sqlparams);
    }

    public static function insert($fncod, $fndsc, $fnest, $fntyp) {
        $sqlstr= "
        INSERT INTO funciones
        (`fncod`, `fndsc`, `fnest`, `fntyp`)
        VALUES
        (:fncod, :fndsc, :fnest, :fntyp); 
        "; 

        $sqlparams= array(
            "fncod" => $fncod, 
            "fndsc" => $fndsc, 
            "fnest" => $fnest,
            "fntyp" => $fntyp
        );

        return self::executeNonQuery($sqlstr, $sqlparams);
    }


    public static function update($fncod, $fndsc, $fnest, $fntyp) {
        $sqlstr= "UPDATE funciones SET fndsc=:fndsc, fnest=:fnest, fntyp=:fntyp  WHERE fncod = :fncod ;";

        $sqlparams= array( 
            "fndsc" => $fndsc, 
            "fnest" => $fnest,
            "fntyp" => $fntyp,
            "fncod" => $fncod
        );

        return self::executeNonQuery($sqlstr, $sqlparams);
    }

    public static function delete($fncod) {
        $sqlstr= "DELETE FROM funciones where fncod= :fncod ;";

        $sqlparams= array(
            "fncod" => $fncod
        );

        return self::executeNonQuery($sqlstr, $sqlparams);
    }
}
