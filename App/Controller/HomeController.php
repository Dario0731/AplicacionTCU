<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of HomeController
 *
 * @author Darío Zamora
 */
class HomeController  {

    public function __construct() {
        
    }

    public function index() {
        return View();
    }
    
    public function Casa() {
        //persona=sql conecttion.getPersonas
        
        // $string_simple = persona.toString;
        $string_simple = 'Hola, mundo';
        viewbag("Dato",$string_simple);
        return View();
    }
    
    public function About() {
        return View();
    }

    public function admin() {
        return View();
    }

    public function accion() {
        $var = array(
            array(
                'nombre' => 'Pedro',
                'apellido' => 'Reyes',
                'edad' => '21'
            ),
            array(
                'nombre' => 'Pablo',
                'apellido' => 'Reyes',
                'edad' => '26'
            ),
            array(
                'nombre' => 'Juan',
                'apellido' => 'Reyes',
                'edad' => '21'
            ),
        );
        Console::log($var);
        return redirect('home', 'index');
    }

}
