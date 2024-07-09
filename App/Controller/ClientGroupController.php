<?php
require_once(CONFIG["repository_path"] . "ClientGroupRepository.php");
require_once(CONFIG["repository_path"] . "SportGroupRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ClientGroupController
 *
 * @author 50685
 */
class ClientGroupController {
public function insertClientGroup() {
    try {
        // Verifica que los datos POST existan
        if (!isset($_POST['group_name']) || !isset($_POST['client_id'])) {
            throw new Exception('Datos de entrada faltantes.');
        }

        $groupID = $_POST['group_name'];
        $clientId = $_POST['client_id'];

        $sport = new SportGroupRepository();
        $repo = new ClientGroupRepository();

 


        // Registra al cliente en el grupo
        $repo->registClientGroup($clientId, $groupID);
       
        echo json_encode(['status' => 'success']);
    } catch (Exception $ex) {
        // Proporciona un mensaje de error más detallado
        echo json_encode(['status' => 'error', 'message' => $ex->getMessage()]);
    }
}
    public function clientsGroup() {
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
public function removeClient() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $groupId = $_POST['groupID']; // Ajustado para coincidir con el nombre en el script JavaScript

        if (!empty($id)) {
            $group = new ClientGroupRepository();
            $result = $group->removeGroup($id, $groupId); // Ajustado para pasar correctamente ambos parámetros

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

    public function editClients() {
    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
        // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
        $this->redirect("/authentication/login");
    }

    $groupRepo = new ClientGroupRepository();
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    try {
       $group= $groupRepo->getGroup($id);
        $groupsList = $groupRepo->getAllClientGroups($id);

        if (empty($groupsList)) {
            $info = [
                'type' => 'error',
                'title' => 'No existen grupos',
                'text' => 'No hay grupos para mostrar'
            ];
        } else {
            viewbag("grupos", $groupsList);
            viewbag("grupInfo", $group);
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
