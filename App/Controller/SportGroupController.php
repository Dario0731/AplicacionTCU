<?php

require_once(CONFIG["repository_path"] . "SportGroupRepository.php");
require_once(CONFIG["repository_path"] . "ClientGroupRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once(CONFIG["repository_path"] . "ClientRepository.php");
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
        try {
            $repo = new SportGroupRepository();
           $idGrupo= $repo->registGroup($name, $comments, $id);
            $info = [
                'type' => 'success',
                'title' => 'Grupo Registrado correctamente',
                'text' => 'Ahora seleccionaremos los clientes para el grupo'
            ];
            $encodedID = urlencode($idGrupo);
           $this->redirect("/SportGroup/clients?id={$encodedID}", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/SportGroup/registrar", $info);
        }
    }

    public function groups() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $group = new SportGroupRepository();
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $groupsList = $group->getSportGroupsByCoach($coachsByEmail['id']);
            if (empty($groupsList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen grupos',
                    'text' => 'No hay grupos para mostrar'
                ];
            } else {
                viewbag("grupos", $groupsList);
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

    public function clients() {
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
    public function removeGroup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if (!empty($id)) {
                $groupRepo = new SportGroupRepository();
                $result = $groupRepo->removeGroup($id);

                if ($result) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el grupo']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'ID no válido']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
        }
    }
    
        public function editGroup() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $group = new ClientGroupRepository();
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        try {
            $groupsList = $group->getGroup($id);
            if (empty($groupsList)) {
                $info = [
                    'type' => 'error',
                    'title' => 'No existen grupos',
                    'text' => 'No hay grupos para mostrar'
                ];
            } else {
                viewbag("grupos", $groupsList);
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
public function updateGroup(){
    $group = new SportGroupRepository();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comments = $_POST['comments'];

    try {
        $group->editGroup($id, $name, $comments);
        $info = [
            'type' => 'success',
            'title' => 'Actualizado',
            'text' => 'Datos actualizados correctamente'
        ];
    } catch (Exception $ex) {
        $info = [
            'type' => 'error',
            'title' => 'Error en el servidor',
            'text' => 'Error en el servidor, inténtelo más tarde.'
        ];
    }
    $_SESSION['redirect-info'] = $info;
    $this->redirect("/sportgroup/editGroup?id=$id");
}
}
