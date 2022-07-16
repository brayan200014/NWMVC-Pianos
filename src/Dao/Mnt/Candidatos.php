<?php


namespace Dao\Mnt;

use Dao\Table;


class Candidatos extends Table
{
   
    public static function getAll() {
        $sqlstr= "SELECT * FROM candidatos;";
        return self::obtenerRegistros($sqlstr, array());
    }
   
   
    public static function getById(int $id)
    {
        $sqlstr = "SELECT * FROM `candidatos` where id=:id;";
        $sqlParams = array("id" => $id);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }



    public static function insert(
        $nombre, $identidad, $edad
    )
    {
        $sqlstr = "INSERT INTO `candidatos`
        (`nombre`, `identidad`, `edad`)
        VALUES
        (:nombre, :identidad,  :edad);
        ";
                $sqlParams = array( 
                    "nombre" => $nombre ,
                    "identidad" => $identidad,
                    "edad" => $edad ,
                   
                );
                return self::executeNonQuery($sqlstr, $sqlParams);
    }



    public static function update(
        $nombre, $identidad, $edad, $id
    )
    {
        $sqlstr = "UPDATE `candidatos` SET `nombre`=:nombre, `identidad`= :identidad, `edad`= :edad where `id` = :id;";
                $sqlParams = array (
                    "nombre" => $nombre ,
                    "identidad" => $identidad,
                    "edad" => $edad ,
                    "id" => $id,
                   
                );
                return self::executeNonQuery($sqlstr, $sqlParams);
    }
   
   

    
    public static function delete($id)
    {
        $sqlstr = "DELETE from `candidatos` where id = :id;";
        $sqlParams = array(
            "id" => $id
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

}