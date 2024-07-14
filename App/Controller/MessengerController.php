<?php
require_once("Lib/Core/Controller.php");
require_once(CONFIG["repository_path"] . "ClientRepository.php");
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
class MessengerController extends Controller  {
    //put your code here
    
    public function clientMessage(){
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
}
