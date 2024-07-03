<?php

require_once(CONFIG["repository_path"] . "SportGroupRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once("Lib/Core/Controller.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GrupoController
 *
 * @author 50685
 */
class SportGroupController extends Controller {

    public function registrar() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        return view();
    }

    public function insertGroup() {
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];
        // $email = '123@gmail.com';
        $coachsByEmail = $coach->getByEmail($email);
        $id = $coachsByEmail['id'];
        $name = $_POST['name'];
        $comments = $_POST['comments'];
        try{
            $repo= new SportGroupRepository();
            $repo->registGroup($name, $comments, $id);
                        $info = [
                'type' => 'success',
                'title' => 'Grupo Registrado correctamente',
                'text' => 'Ahora seleccionaremos los clientes para el grupo'
            ];
            $this->redirect("/SportGroup/registrar", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/SportGroup/registrar", $info);
        }
        
    }

}
