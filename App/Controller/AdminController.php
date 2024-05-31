<?php

require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once("Lib/Core/Controller.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminController
 *
 * @author 50685
 */
class AdminController extends Controller {

    public function home() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }

        // Obtener el correo electrónico del usuario de la sesión
        $email = $_SESSION['user']['email'];
        $coach = new CoachRepository();

        $coachsByEmail = $coach->getByEmail($email);
//        if (($coachsByEmail[0]['conections'] == 0)) {
//            $this->redirect("/admin/information");
//        } else {
//            return View();
//        }
        return View();
    // $this->redirect("/admin/home",$info);

    }

    private function guardar() {
        for ($i = 0; $i <= sizeof($coachsCount) - 1; $i++) {
            if ($coach[$i]['email'] == $email) {
                $coach->updateCoach($coach[$i]['id'], $email,
                        $coach[$i]['name'], $coach[$i]['last_name'], $coach[$i]['image_path'],
                        $coach[$i]['conections'], 1);
                $this->redirect("/admin/home");
            }
        }
    }

}
