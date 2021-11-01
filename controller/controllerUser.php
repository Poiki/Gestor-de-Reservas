<?php

require_once("views/view.php");
require_once("models/user.php");
// require_once ("models/user.php");
// require_once ("models/security.php");

class ControllerUser
{

    private $view, $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        session_start();
        $this->view = new View();
        $this->user = new User();
    }

    /**
     * Muestra el formulario de resource
     */
    public function showAllUsers($msg = null)
    {
        $query = $this->user->queryAll();

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('showUsers', 'user', $query, $msg);
            $this->view->show($data);
        }
    }
    public function deleteUser()
    {
        $msg = $this->user->deleteId($_REQUEST['id']);
        $this->showAllUsers($msg);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function modifyUser()
    {
        $dataModify = array($_REQUEST['id'], $_REQUEST['username'], $_REQUEST['password'], $_REQUEST['realname']);

        $msg = $this->user->modifyUser($dataModify);
        $this->showAllUsers($msg);
    }
    // Muestra el formulario
    public function formularioModifyUser()
    {
        $query = $this->user->queryUser($_REQUEST['id']);

        // Se comprueba si contiene informacion
        if ($query != null) {
            $data = array('formModifyUser', 'user', $query);
            $this->view->show($data);
        }
    }
    // Muestra el formulario
    public function formCreateUser()
    {

        $data = array('formCreateUser', 'user');
        $this->view->show($data);
    }
    // Recoge la infromacion del formulario y la envia al modelo.
    public function createUser()
    {
        $dataCreation = array($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['realname']);

        $msg = $this->user->createUser($dataCreation);
        $this->showAllUsers($msg);
    }
}
