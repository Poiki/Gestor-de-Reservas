<?php

include_once("views/view.php");
include_once("models/user.php");
include_once("models/security.php");
include_once("controller/controllerMenu.php");

class ControllerUser
{

    private $view, $user, $menu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->view = new View();
        $this->user = new User();
        $this->menu = new ControllerMenu();
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

    // Procesa el login, si es correcto crea sesión y si no devuelve error
    public function loginProcessor()
    {
        $user = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $userInfo = $this->user->checkInfo($user, $password);
        if ($userInfo != null) {
            // Usuario y contraseña correctos, así que creamos la sesión
            Security::createSession($userInfo['id']);
            include_once("controller/controllerMenu.php");
            $menu = new ControllerMenu();
            $menu->showMenu();
        } else {
            $msg = "error_Lgn";
            $data = array("showLogin", null, null, $msg);
            $this->view->show($data);
        }
    }
    public function closeSession()
    {
        Security::closeSession();
        $msg = "ok_lout";
        $this->menu->showMenu($msg);
    }
}
