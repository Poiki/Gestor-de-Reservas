<?php

include_once("views/view.php");
include_once("models/timeSlot.php");
// include_once ("models/user.php");
// include_once ("models/security.php");

class ControllerTimeSlot
{

    private $view, $timeSlot;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->view = new View();
        $this->timeSlot = new TimeSlot();
    }

    /**
     * Muestra el formulario de timeSlot
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
    public function deleteTimeSlot()
    {
        $msg = $this->timeSlot->deleteId($_REQUEST['id']);
        $this->showAllTimeSlots($msg);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function modifyTimeSlot()
    {
        $dataModify = array($_REQUEST['id'], $_REQUEST['day_of_week'], $_REQUEST['start_time'], $_REQUEST['end_time']);

        $msg = $this->timeSlot->modifytimeSlot($dataModify);
        $this->showAllTimeSlots($msg);
    }
    // Muestra el formulario
    public function formularioModifyTimeSlot()
    {
        $query = $this->timeSlot->queryTimeSlot($_REQUEST['id']);

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('formModifytimeSlot', 'timeSlot', $query);
            $this->view->show($data);
        }
    }
    // Muestra el formulario
    public function formularioCrearTimeSlot()
    {

        $data = array('formCreatetimeSlot', 'timeSlot');
        $this->view->show($data);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function createTimeSlot()
    {
        $dataCreation = array($_REQUEST['day_of_week'], $_REQUEST['start_time'], $_REQUEST['end_time']);

        $msg = $this->timeSlot->createTimeSlot($dataCreation);
        $this->showAllTimeSlots($msg);
    }
}
