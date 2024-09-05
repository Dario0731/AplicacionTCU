<?php

require_once("Lib/Core/Controller.php");
require_once(CONFIG["repository_path"] . "EventRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once(CONFIG["repository_path"] . "ClientRepository.php");
require_once(CONFIG["repository_path"] . "ProgressRepository.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of EventController
 *
 * @author 50685
 */
class EventController extends Controller {

    //put your code here

    public function newEvent() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        return View();
    }

    public function createEvent() {
        try {
            $coach = new CoachRepository();
            $email = $_SESSION['user']['email'];
            // $email = '123@gmail.com';
            $coachsByEmail = $coach->getByEmail($email);
            $id = $coachsByEmail['id'];
            $event = new EventRepository();

            $title = $_POST['title'];
            $description = $_POST['description'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $color = $_POST['color'];
            $coachID = $id;

            $idSportGr = $event->createEvent($title, $description, $startDate, $endDate, $color, $coachID);

            $info = [
                'type' => 'success',
                'title' => 'Evento agregado correctamente',
                'text' => 'El evento ha sido agregado al calendario'
            ];

            $encodedID = urlencode($idSportGr);
            $this->redirect("/event/newClientsToEvent?id={$encodedID}", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/event/newClientsToEvent", $info);
        }
    }

    public function listEvents() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $event = new EventRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $eventList = $event->getEvents($coachsByEmail['id']);

            if (empty($eventList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen eventos',
                    'text' => 'No hay eventos para mostrar'
                ];
            } else {
                viewbag("events", $eventList);
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

    public function calendar() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $event = new EventRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        $client = new ClientRepository();
        $coach = new CoachRepository();
        $emailClient = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $eventList = $event->getEvents($coachsByEmail['id']);

            $coachsByEmail = $coach->getByEmail($emailClient);
            $clientList = $client->getByCoach($coachsByEmail['id']);

            if (empty($eventList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen eventos',
                    'text' => 'No hay eventos para mostrar'
                ];
            } else {
                viewbag("events", $eventList);
                viewbag("clients", $clientList);
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

    public function removeEvent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if (!empty($id)) {
                $event = new EventRepository();
                $result = $event->removeEvent($id);

                if ($result) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el cliente']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'ID no válido']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        }
    }

    public function newClientsToEvent() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $client = new ClientRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];
        $id = isset($_GET['id']) ? $_GET['id'] : null;
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
  
}
