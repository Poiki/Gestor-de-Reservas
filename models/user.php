<?php

include("db.php");

class User
{

    /**
     * Constructor de la clase.
     */
    public function __construct()
    {
        DB::createConnection();
    }
    public function queryAll()
    {
        $result = DB::dataQuery("SELECT * FROM user");
        if (count($result) > 0)
            return $result;
        else
            return null;
    }
    public function deleteId($id)
    {
        // Variable info para mandar el resultado
        $info = '';
        // Se ejecuta el borrado de la fila con el id indicado
        $delete = DB::dataManipulation("DELETE FROM user WHERE id = '$id'");
        // Comrueba si se ha eliminado correctamente
        if ($delete != 0) {
        } else {
            $info = 'errorRow';
        }
    }
    public function queryUser($id)
    {
        $result = DB::dataQuery("SELECT * FROM user WHERE id = '$id'");
        if (count($result) > 0)
            return $result;
        else
            return null;
    }

    public function modifyUser($data)
    {
        // Variable info para mandar el resultado
        $info = '';
        // Variable modify para realizar la modificación en la base de datos
        $modify = DB::dataManipulation("UPDATE user SET username = '$data[1]', password = '$data[2]', realname = '$data[3]' WHERE id = '$data[0]'");
        if ($modify != 0) {
            $info = 'ok_m';
        } else {
            $info = 'errorRow';
        }

        return $info;
    }
    public function createUser($data)
    {
        // Variable info para mandar el resultado
        $info = '';
        $consulta = DB::dataManipulation("INSERT INTO user(username, password, realname) VALUES ('$data[0]', '$data[1]', '$data[2]');");
        if ($consulta != 0) {
            $info = 'ok_m';
        } else {
            $info = 'errorRow';
        }
        return $info;
    }
}
