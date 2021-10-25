<?php

include("db.php");

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

}
