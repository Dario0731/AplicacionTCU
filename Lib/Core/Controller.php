<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Controller
 *
 * @author 50685
 */
class Controller {

    //put your code here
    public function redirect($url, $info = null) {
        $newURL = URL_PATH . $url;

        if (!is_null($info)) {
            //     $_SESSION['redirect-info'] = $info; //se guarda la información antes de redirigir la página
        }
        header('Location: ' . $newURL);
        exit;
    }

}
