<?php

require("views/view.php");
require("models/resource.php");
// include ("models/user.php");
// include ("models/security.php");

class ControllerResource
{

    private $view, $resource;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->resource = new Resource(); // Modelo de usuarios
    }

    /**
     * Muestra el formulario de resource
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

    public function modificarResource()
    {
        $dataModify = array($_REQUEST['idResource'], $_REQUEST['name'], $_REQUEST['description'], $_REQUEST['location'], $_FILES['img']['tmp_name']);

        $msg = $this->resource->modifyResource($dataModify);
        $this->showAllResources($msg);
    }
    
    public function formularioModificarResource()
    {
        $query = $this->resource->queryResource($_REQUEST['idResource']);

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('formModifyResource', 'resource', $query);
            $this->view->show($data);
        }
    }
}