<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$viewBag = array();

function viewbag($key, $value = null) {
    global $viewBag;
    if(is_null($value)){
        return isset($viewBag[$key])? $viewBag[$key]:null;
    }
    $viewBag[$key] = $value;
}

function viewbagArray($key, $value = null) {
    static $bag = [];
    if ($value !== null) {
        $bag[$key] = $value;
    }
    return $bag[$key] ?? null;
}

function View($layout = '', $data = []) {
    $view = CONFIG['request_action'] . '.view.php';
    $viewPath = CONFIG['view_path'] . CONFIG['request_controller'] . '/' . $view;

    if (!file_exists($viewPath)) {
        $msg = 'La vista que se busca no existe';
        trigger_error($msg, E_USER_ERROR);
        return;
    }//se comprueba que la vista sí existe


    $pageLayout = empty($layout) ? 'default' : $layout;
    $pageLayout .= '.layout.php';
    $pageLayoutPath = CONFIG['view_path'] . 'Layouts/' . $pageLayout;

    if (!file_exists($pageLayoutPath)) {
        $msg = 'No hay una plantilla que despliegue la información que busca';
        trigger_error($msg, E_USER_ERROR);
        return;
    }//validar que la página de layout existe


    $page = CONFIG['view_path'] . 'page.php';
    include_once $page;
    return;
}
