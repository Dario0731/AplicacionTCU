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
require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once(CONFIG["repository_path"] . "ClientRepository.php");
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
        $confirm = $_POST["confirm_password"];
        if ($pass == $confirm) {
            if (strlen($pass) < 6 || strlen($pass) > 8) {
                $info = [
                    'type' => 'error',
                    'title' => 'Ha ocurrido un problema',
                    'text' => 'La contraseña debe tener entre 6 y 8 carácteres.'
                ];
            } else {
                $repo = new UserRepositry();
                $coachs = new CoachRepository();
                try {
                    $coachs->registCoach($email, '0');
                    $repo->registUser($email, $pass, $type);
                    $info = [
                        'type' => 'success',
                        'title' => 'Registrado correctamente',
                        'text' => 'El usuario ha sido registrado con éxito.'
                    ];
                } catch (Exception $ex) {
                    $info = [
                        'type' => 'error',
                        'title' => 'Ha ocurrido un problema',
                        'text' => 'Ha ocurrido un problema con el servidor o el usuario ingresado ya existe.'
                    ];
                }
            }
        } else {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Las contraseñas no corresponden.'
            ];
        }

        $this->redirect("/authentication/register", $info);
    }

    public function loginUser() {

        $repo = new UserRepositry();
        $clients = new ClientRepository();
        $email = $_POST['email'];
        $pass = $_POST["password"];
       // $confirm = $_POST["confirm_password"];
        $bandera = "false";
    $id=0;
        try {
            $personas = $repo->getAll();
            $clientes = $clients->getAll();
            $bandera = "false";
            for ($i = 0;
                    $i <= sizeof($personas) - 1;
                    $i++) {
                if ($personas[$i]['email'] == $email) {
                    if ($personas[$i]['password'] == $pass) {
                        $bandera = "true";
                        break;
                    } else if ($personas[$i]['email'] == $email && $personas[$i]['password'] != $pass) {
                        $bandera = "pass";
                        break;
                    }
                } if ($clientes[$i]['email'] == $email) {
                    if ($clientes[$i]['password'] == $pass) {
                        $bandera = "trueClient";
                        break;
                    } else if ($clientes[$i]['email'] == $email && $clientes[$i]['password'] != $pass) {
                        $bandera = "passClient";
                        break;
                    }
                }
            }
            $this->loginValidation($bandera, $email, $pass);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
        }
    }

    private function loginValidation($bandera, $email, $pass) {
        if ($bandera == "true") {
            session_start();  // Iniciar la sesión

            $_SESSION['user'] = [
                'id' => $email,
                'email' => $email,

            ]; // Almacenar datos del usuario en la sesión

            $this->redirect("/admin/home");
        } else if ($bandera == "pass") {
            $info = [
                'type' => 'error',
                'title' => 'Datos erroneos',
                'text' => 'Contraseña incorrecta'
            ];
            $this->redirect("/authentication/login", $info);
        } if ($bandera == "trueClient") {
            session_start();  // Iniciar la sesión

            $_SESSION['user'] = [
                'email' => $email,
            ]; // Almacenar datos del usuario en la sesión

            $this->redirect("/client/home");
        } else if ($bandera == "passClient") {
            $info = [
                'type' => 'error',
                'title' => 'Datos erroneos',
                'text' => 'Contraseña incorrecta'
            ];
            $this->redirect("/authentication/login", $info);
        } else if ($bandera == "false") {
            $info = [
                'type' => 'error',
                'title' => 'Datos erroneos',
                'text' => 'El usuario ingresado no corresponde'
            ];
            $this->redirect("/authentication/login", $info);
        }
    }

}
