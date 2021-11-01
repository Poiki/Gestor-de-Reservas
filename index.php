<?php
// Iniciamos la sesion
session_start();
include_once("models/user.php");
include_once("models/security.php");

// Verificamos si la sesion esta abierta
if (Security::thereIsSession()) {
    if (!isset($_REQUEST['action'])) {
        // Si no la hay usamos la accion por defecto (mostrar el formulario de login)
        include_once("controller/controllerMenu.php");
        $controllerMenu = new ControllerMenu();

        $action = "showMenu";
        $controllerMenu->$action();
    } else {
        $controller = $_REQUEST['controller'];
        $action = $_REQUEST['action'];

        include_once("controller/" . $controller . ".php");
        $cont = new $controller();
        $cont->$action();
    }
} else {
    // Miramos a ver si hay alguna accion pendiente de realizar
    if (!isset($_REQUEST['action'])) {
        // Si no la hay usamos la accion por defecto (mostrar el formulario de login)
        include_once("controller/controllerMenu.php");
        $controller = new ControllerMenu();

        $action = "showMenu";
        $controller->$action();
    } else if ($_REQUEST['action'] == "showLogin") {
        include_once("controller/controllerMenu.php");
        $controller = new ControllerMenu();
        $action = $_REQUEST['action'];
        $controller -> $action();

    } else if ($_REQUEST['action'] == "loginProcessor") {
        $controller = $_REQUEST['controller'];
        $action = $_REQUEST['action'];

        include_once("controller/" . $controller . ".php");
        $cont = new $controller();
        $cont->$action();
    } else {
        header("Location: index.php");
    }
}
