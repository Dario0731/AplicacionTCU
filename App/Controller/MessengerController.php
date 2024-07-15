<?php

require_once("Lib/Core/Controller.php");
require_once(CONFIG["repository_path"] . "ClientRepository.php");
require_once(CONFIG["repository_path"] . "MessengerRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MessengerController
 *
 * @author 50685
 */
class MessengerController extends Controller {

    //put your code here

    public function clientMessage() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $client = new ClientRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $clientList = $client->getByCoach($coachsByEmail['id']);
            //     $clientList = $client->getAll();

            if (empty($clientList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen clientes',
                    'text' => 'No hay clientes para mostrar'
                ];
            } else {
                viewbag("clientes", $clientList);
            }
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Error al recuperar los datos',
                'text' => 'Error en la carga de datos.'
            ];
            $_SESSION['redirect-info'] = $info;
        }

        return View();
    }

    public function sendMessage() {
        $coach = new CoachRepository();
        $messageREPO = new MessengerRepository();
        $email = $_SESSION['user']['email'];
        try {

            $coachsByEmail = $coach->getByEmail($email);
            $CoachID = $coachsByEmail['id'];

            $clientID = $_POST['client_id'];
            $message = $_POST['message'];
            $messageREPO->sendMessage($message, $CoachID, $clientID);
            $info = [
                'type' => 'success',
                'title' => 'Mensaje enviado correctamente',
                'text' => 'El mensaje fue enviado correctamente al cliente'
            ];

            $this->redirect("/messenger/clientMessage", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/messenger/clientMessage", $info);
        }
    }

    public function mySendMessages() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $client = new ClientRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $clientList = $client->getByCoach($coachsByEmail['id']);
            //     $clientList = $client->getAll();

            if (empty($clientList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen clientes',
                    'text' => 'No hay clientes para mostrar'
                ];
            } else {
                viewbag("clientes", $clientList);
            }
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Error al recuperar los datos',
                'text' => 'Error en la carga de datos.'
            ];
            $_SESSION['redirect-info'] = $info;
        }

        return View();
    }

    public function getSendMessages() {
        $messageREPO = new MessengerRepository();
        try {
            $client_id = $_GET['client_id'];
            $messageList = $messageREPO->getClientMessages($client_id);
            if (sizeof($messageList) == 0) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen mensajes enviados a este cliente',
                    'text' => 'No hay mensajes para mostrar'
                ];
                $_SESSION['redirect-info'] = $info;
            }
            viewbag("messages", $messageList);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $_SESSION['redirect-info'] = $info;
        }
        return View();
    }

    public function myMessages() {
        $messageREPO = new MessengerRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $CoachID = $coachsByEmail['id'];
            $messageList = $messageREPO->getMyMessages($CoachID);
            if (sizeof($messageList) == 0) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen mensajes enviados a este cliente',
                    'text' => 'No hay mensajes para mostrar'
                ];
                $_SESSION['redirect-info'] = $info;
            }
            viewbag("messages", $messageList);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $_SESSION['redirect-info'] = $info;
        }
        return View();
    }

}
