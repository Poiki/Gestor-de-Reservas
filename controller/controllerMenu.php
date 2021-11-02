<?php

include_once("views/view.php");

class ControllerMenu
{

    private $view;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Muestra el formulario del menu
     */
    public function showMenu($msg = null)
    {
        $data = array('showMenu', null);
        $this->view->show($data);
    }
    // Muestra el formulario de login
    public function showLogin()
    {
        $data = array('showLogin', null, null, null);
        $this->view->show($data);
    }
}
