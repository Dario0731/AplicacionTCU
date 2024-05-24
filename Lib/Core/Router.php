<?php

session_start();
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Router
 *
 * @author Darío Zamora
 */
class Router {

    private $controller;
    private $action;

    public function __construct() {
        $this->matchRoute();
    }

    public function matchRoute() {

        # Se establece el nombre de controlador y acción (o valores por defecto)
        $this->controller = CONFIG['request_controller']; // Establece el valor predeterminado
        $this->controller = $this->controller . 'Controller';
        $this->action = CONFIG['request_action'];

        $ruta = CONFIG['controller_path'] . $this->controller . '.php';
        if (!file_exists($ruta)) {
            trigger_error('No hay controlador para atender la petición', E_USER_ERROR);
        }
        require_once($ruta);
    }

    public function run() {

        $ClassName = $this->controller;
        $controller = new $ClassName();

        $method = $this->action;

        if (!method_exists($controller, $method)) {
            trigger_error('El controlador no puede atender esta solicitud', E_USER_ERROR);
            return;
        }
        return $controller->$method();
    }

}

function RUN() {
    $router = new Router();
    $content = $router->run();
    echo $content;
}

function redirect($controller, $action, $info = null) {
    $newURL = route($controller, $action);

    if (!is_null($info)) {
        $_SESSION['redirect-info'] = $info; //se guarda la información antes de redirigir la página
    }
    header('Location: ' . $newURL);
    exit;
}

function route($controller, $action) {
    return CONFIG['url'] . '/' . strtolower($controller) . '/' . strtolower($action);
}
