<?php

include_once("db.php");

class Reserves
{

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    public function __construct()
    {
        DB::createConnection();
    }
    public function queryAll()
    {
        $result = DB::dataQuery("SELECT
        reserves.id,
        resource.name,
        user.username,
        timeslot.start_time,
        timeslot.end_time,
        timeslot.day_of_week,
        reserves.note
    FROM
        reserves INNER JOIN resource
        ON reserves.id_resource = resource.id
        INNER JOIN timeslot
        ON reserves.id_timeslot = timeslot.id
        INNER JOIN user
        ON reserves.id_user = user.id");

        if (count($result) > 0)
            return $result;
        else
            return null;
    }
    public function queryReserve($id)
    {
        $result = DB::dataQuery("SELECT * FROM reserves WHERE id = '$id'");
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
        $delete = DB::dataManipulation("DELETE FROM reserves WHERE id = '$id'");
        // Comrueba si se ha eliminado correctamente
        if ($delete != 0) {
        } else {
            $info = 'errorRow';
        }
    }
    public function modifyReserve($data)
    {
        // Variable info para mandar el resultado
        $info = '';
        // Variable modify para realizar la modificación en la base de datos
        $modify = DB::dataManipulation("UPDATE reserves SET id_resource = '$data[1]', id_user = '$data[2]', id_timeslot = '$data[3]', note = '$data[4]'  WHERE id = '$data[0]'");
        if ($modify != 0) {
            $info = 'ok_m';
        } else {
            $info = 'errorRow';
        }

        return $info;
    }
    public function createReserve($data)
    {
        $info = '';

        $create = DB::dataManipulation("INSERT INTO reserves(id_resource, id_user, id_timeslot, note) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')");

        if ($create != 0) {
            $info = 'ok_c';
        } else {
            $info = 'errorRow';
        }
    }
}
