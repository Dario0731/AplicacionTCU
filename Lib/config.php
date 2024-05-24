<?php

#Se obtiene el nombre de la carpeta 
$folderPath = dirname($_SERVER['SCRIPT_NAME']);

#Se debe leer el contenido de la ruta para procesarlo después
$urlPath = $_SERVER['REQUEST_URI'];

#Se extrae la ruta a trabajar, que contiene el controlador y la acción
$url = substr($urlPath, strlen($folderPath));

$protocolo = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
# Construye la URL base del servidor
$urlBase = $protocolo . '://' . $_SERVER['HTTP_HOST'];

$uri_content = explode('/', $url);

$CONFIG = array(
    'url' => $folderPath,
    'assets' => $urlBase . $folderPath . '/Public/Assets/',
    'public_path' => __DIR__.'/../Public/',
    'view_path' => __DIR__ . '/../App/View/',
    'controller_path' => __DIR__ . '/../App/Controller/',
    'model_path' => __DIR__ . '/../App/Model/',
    'request_controller' => !empty($uri_content[1]) ? $uri_content[1] : 'home',
    'request_action' => !empty($uri_content[2]) ? $uri_content[2] : 'index',
    'dbhost' => 'localhost',
    'dbname' => 'coachingapp',
    'dbuser' => 'root',
    'dbpass' => '',
);

define("CONFIG", $CONFIG);
