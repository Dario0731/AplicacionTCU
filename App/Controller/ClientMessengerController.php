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
 * Description of ClientMessengerController
 *
 * @author 50685
 */
class ClientMessengerController extends Controller{
       public function clientMessage() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }

        return View();
    }

    public function sendMessage() {
        $client = new ClientRepository();
        $messageREPO = new MessengerRepository();
        $email = $_SESSION['user']['email'];
        try {

            $clientInfo= $client->searchByEmail($email);
            $CoachID = $clientInfo['coach_id'];

            $clientID = $clientInfo['id'];
            $message = $_POST['message'];
            $messageREPO->sendMessage($message, $CoachID, $clientID);
            $info = [
                'type' => 'success',
                'title' => 'Mensaje enviado correctamente',
                'text' => 'El mensaje fue enviado correctamente al cliente'
            ];

            $this->redirect("/ClientMessenger/clientMessage", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/ClientMessenger/clientMessage", $info);
        }
    }
    public function getSendMessages() {
                if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $client = new ClientRepository();
        $messageREPO = new MessengerRepository();
        $email = $_SESSION['user']['email'];
        try {

            $clientInfo= $client->searchByEmail($email);
            $client_id = $clientInfo['id'];
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
                if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
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
