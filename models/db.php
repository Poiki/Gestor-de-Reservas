<?php

include_once("config.php");

class DB
{

    private static $connection; // Aquí guardaremos la conexión con la base de datos
    public static function createConnection()
    {
        DB::$connection = new mysqli(Config::$server, Config::$user, Config::$psw, Config::$dbname);
        if (DB::$connection->connect_errno) return false;
        else return true;
    }

    /**
     * Cierra la conexión con la base de datos
     */
    public static function closeConnection()
    {
        if (self::$connection) self::$connection->close();
    }
    // Solo consultas
    public static function dataQuery($sql)
    {
        $res = self::$connection->query($sql);
        $resArray = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_array()) {
                $resArray[] = $row;
            }
        } else {
            $resArray = null;
        }
        return $resArray;
    }
    // Manipuulacion de datos, no se usa para SELECT
    public static function dataManipulation($sql)
    {
        self::$connection->query($sql);
        return self::$connection->affected_rows;
    }
}
