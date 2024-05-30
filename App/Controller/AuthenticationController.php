<?php

/* require_onrequire_once 'Model/Repository';ce(MODEL_PATH."Event.model.php");
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AuthenticationController
 *
 * @author Darío Zamora
 */
require_once(CONFIG["repository_path"] . "UserRepository.php");
require_once("Lib/Core/Controller.php");

class AuthenticationController extends Controller {

    //put your code here

    public function login() {
        return View();
    }

    public function register() {
        return View();
    }

    public function registUser() {

        // Obtener los datos
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $type = 'Administrador';

        // Lógica para crear un anuncio
        $repo = new UserRepositry();
        try {
            $error = $repo->registUser($email, $pass, $type);
            $info = [
                'type' => 'success',
                'title' => 'Registrado correctamente',
                'text' => 'El usuario ha sido registrado con éxito.'
            ];
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
        }

        $this->redirect("/authentication/register", $info);
    }

    public function loginUser() {
        $repo = new UserRepositry();
        $email = $_POST['email'];
        $pass = $_POST["password"];

        try {
            $personas = $repo->getAll();

//            for ($i = 0; $i <= sizeof($personas) - 1; $i++) {
//                        echo $personas[$i]
//                if ($personas[$i]['email'] == $email || $personas[$i]['password'] == $pass) {
//                    $this->redirect("/home/admin", $personas);
//                } else if ($personas[$i]['email'] == $email || !$personas[$i]['password'] == $pass) {
//                    $info = [
//                        'type' => 'error',
//                        'title' => 'Datos erroneos',
//                        'text' => 'Contraseña incorrecta'
//                    ];
//                    $this->redirect("/home/admin", $info);
//                }
//            }
            //Comentar para prueba
            $this->redirect("/home/admin", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
        }
    }

}
