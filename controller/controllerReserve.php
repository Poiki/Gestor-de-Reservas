<?php

include_once("views/view.php");
include_once("models/reserves.php");
include_once("models/resource.php");
include_once("models/timeSlot.php");
include_once("models/user.php");
include_once("models/security.php");
class ControllerReserve
{

    private $view, $reserve, $user, $timeSlot;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        $this->view = new View(); // Vistas
        $this->reserve = new Reserves(); // Modelo de reserva
        $this->resource = new Resource();  // Recursos
        $this->user = new User();  // Usuario
        $this->timeSlot = new TimeSlot();  // TimeSlot
    }
    public function showAllReserves($msg = null)
    {
        $query = $this->reserve->queryAll();

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('showReserves', 'reserve', $query, $msg);
            $this->view->show($data);
        }
    }
    public function createReserve()
    {
        // Envio de los datos necesarios para hacer una reserva
        $dataQuery = array($_REQUEST['idResource'], Security::getUserId(), $_REQUEST['idTimeSlot'], $_REQUEST['note']);

        // Llamada al modelo para que realiza la consulta y de paso lo guarda en un mensaje para ver si ha fallado o no.
        $msg = $this->reserve->createReserve($dataQuery);
        $this->showAllReserves($msg);
    }
    public function deleteReserve()
    {
        $msg = $this->reserve->deleteId($_REQUEST['idReserve']);
        $this->showAllReserves($msg);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function modifyReserve()
    {
        $dataModify = array($_REQUEST['idReserve'], $_REQUEST['id_resource'], $_REQUEST['id_user'], $_REQUEST['id_timeslot'], $_REQUEST['note']);

        $msg = $this->reserve->modifyReserve($dataModify);
        $this->showAllReserves($msg);
    }
    // Muestra el formulario
    public function formModifyReserve()
    {
        $query = $this->reserve->queryReserve($_REQUEST['idReserve']);

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('formModifyReserve', 'reserve', $query);
            $this->view->show($data);
        }
    }
    // Muestra el formulario
    public function formCreateReserve()
    {
        $queryResource = $this->resource->queryAll();
        $queryTimeSlot = $this->timeSlot->queryAll();
        $query = array($queryResource, $queryTimeSlot);
        $data = array('formCreateReserve', 'reserve', $query);
        $this->view->show($data);
    }
}
