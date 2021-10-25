<?php

require("views/view.php");

class ControllerMenu
{

    private $view;

    /**
     * Constructor.
     */
    public function __construct()
    {
        session_start();
        $this->view = new View();
    }

    /**
     * Muestra el formulario de menu
     */
    public function showMenu()
    {
        $data = array('showMenu', null);
        $this->view->show($data);
    }
}
