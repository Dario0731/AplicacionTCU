<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Database
 *
 * @author Brayan Vargas
 */
class Database extends PDO {

    private static $instance;

    public function __construct() {
        // cargar datos referentes a la base de datos
        parent::__construct('mysql:host=' . CONFIG['dbhost'] . ';dbname=' . CONFIG['dbname'], CONFIG['dbname'], CONFIG['dbpass']);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

}
