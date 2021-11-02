<?php

include_once("views/view.php");
include_once("models/resource.php");
// include_once ("models/user.php");
// include_once ("models/security.php");

class ControllerResource
{

    private $view, $resource;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        $this->view = new View(); // Vistas
        $this->resource = new Resource(); // Modelo de usuarios
    }

    /**
     * Muestra la información de resource
     */
    public function showAllResources($msg = null)
    {
        $query = $this->resource->queryAll();

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('showResources', 'resource', $query, $msg);
            $this->view->show($data);
        }
    }

    public function deleteResource()
    {
        $msg = $this->resource->deleteId($_REQUEST['idResource']);
        $this->showAllResources($msg);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function modifyResource()
    {
        $dataModify = array($_REQUEST['idResource'], $_REQUEST['name'], $_REQUEST['description'], $_REQUEST['location'], $_FILES['img']['tmp_name']);

        $msg = $this->resource->modifyResource($dataModify);
        $this->showAllResources($msg);
    }
    // Muestra el formulario
    public function formularioModificarResource()
    {
        $query = $this->resource->queryResource($_REQUEST['idResource']);

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('formModifyResource', 'resource', $query);
            $this->view->show($data);
        }
    }
     // Muestra el formulario
    public function formularioCrearResource()
    {

        $data = array('formCreateResource', 'resource');
        $this->view->show($data);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function createResource()
    {
        $dataCreation = array($_REQUEST['name'], $_REQUEST['description'], $_REQUEST['location'], $_FILES['img']['tmp_name']);

        $msg = $this->resource->createResource($dataCreation);
        $this->showAllResources($msg);
    }
}
