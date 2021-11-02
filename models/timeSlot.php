<?php

include_once("db.php");

class TimeSlot
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
        $result = DB::dataQuery("SELECT * FROM timeslot");
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
        $delete = DB::dataManipulation("DELETE FROM timeslot WHERE id = '$id'");
        // Comrueba si se ha eliminado correctamente
        if ($delete != 0) {
        } else {
            $info = 'errorRow';
        }
    }
    public function queryTimeSlot($id)
    {
        $result = DB::dataQuery("SELECT * FROM timeslot WHERE id = '$id'");
        if (count($result) > 0)
            return $result;
        else
            return null;
    }

    public function modifyTimeSlot($data)
    {
        // Variable info para mandar el resultado
        $info = '';
        // Variable modify para realizar la modificación en la base de datos
        $modify = DB::dataManipulation("UPDATE timeslot SET day_of_week = '$data[1]', start_time = '$data[2]', end_time = '$data[3]' WHERE id = '$data[0]'");
        if ($modify != 0) {
            $info = 'ok_m';
        } else {
            $info = 'errorRow';
        }

        return $info;
    }
    public function createTimeSlot($data)
    {
        // Variable info para mandar el resultado
        $info = '';
        $consulta = DB::dataManipulation("INSERT INTO timeslot(day_of_week, start_time, end_time, img) VALUES ('$data[0]', '$data[1]', '$data[2]');");
        if ($consulta != 0) {
            $info = 'ok_m';
        } else {
            $info = 'errorRow';
        }
        return $info;
    }
}
