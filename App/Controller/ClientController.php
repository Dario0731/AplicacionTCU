<?php

require_once(CONFIG["repository_path"] . "ClientRepository.php");
require_once("Lib/Core/Controller.php");
/*
  /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ClientController
 *
 * @author 50685
 */
class ClientController extends Controller {

    public function home() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        } try {
            $repository = new ClientRepository();
            $clientByEmail = $repository->getByEmail($_SESSION['user']['email']);
            $clientInfo = $clientByEmail['name'] . ' ' . $clientByEmail['last_name'] . ', ' . $clientByEmail['pay_date']
                    . ',' . $clientByEmail['imagenCoach'];
            viewbag("client_info", $clientInfo);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Error en la carga de datos',
                'text' => 'Los datos no pudieron ser recuperados'
            ];
        }

        return View();
    }

    public function coachInfo() {
        $repository = new ClientRepository();
        $clientByEmail = $repository->getByEmail($_SESSION['user']['email']);
            $coach_info = $clientByEmail['coachEmail'] . ',' . $clientByEmail['coachName'] . ',' .
                    $clientByEmail['coachLast_name'] . ',' .  $clientByEmail['imagenCoach']. ',' .$clientByEmail['coachPhone'];
            viewbag("coach_info", $coach_info);
        return view();
    }

}
