<?php

// Miramos a ver si hay alguna accion pendiente de realizar
if (!isset($_REQUEST['action'])) {
// No la hay. Usamos la accion por defecto (mostrar el formulario de login)
    include("controller/controllerMenu.php");    
    $controllerMenu = new ControllerMenu();

    $action = "showMenu";
    $controllerMenu->$action();
} else {
    $controller = $_REQUEST['controller'];
    $action = $_REQUEST['action'];
    
    include("controller/" . $controller . ".php");
    $cont = new $controller();
    $cont->$action();
}

