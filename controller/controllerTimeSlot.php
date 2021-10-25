<?php

require("views/view.php");
require("models/timeSlot.php");
// require ("models/user.php");
// require ("models/security.php");

class ControllerTimeSlot
{

    private $view, $timeSlot;

    /**
     * Constructor
     */
    public function __construct()
    {
        session_start();
        $this->view = new View();
        $this->timeSlot = new TimeSlot();
    }

    /**
     * Muestra el formulario de resource
     */
    public function showAllTimeSlots($msg = null)
    {
        $query = $this->timeSlot->queryAll();

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('showTimeSlots', 'timeslot', $query, $msg);
            $this->view->show($data);
        }
    }
}
