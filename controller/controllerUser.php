<?php

require_once ("views/view.php");
require_once ("models/user.php");
// require_once ("models/user.php");
// require_once ("models/security.php");

class ControllerUser
{

    private $view, $user;

    /**
     * Constructor
     */
    public function __construct() {
        session_start();
        $this->view = new View();
        $this->user = new User();
    }

    /**
     * Muestra el formulario de resource
     */
    public function showAllUsers($msg = null) {
        $query = $this->user->queryAll();
        
        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('showUsers', 'user', $query, $msg);
            $this->view->show($data);
        }
        
    }
}