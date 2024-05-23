<?php

class Console {

    private static $data_queue = array();

    private function __construct() {
        // Hacer el constructor privado evita que se instancie la clase.
    }

    public static function log($data) {
        echo '<script>console.log('.json_encode($data).')</script>';
    }

}
