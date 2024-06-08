<?php

require_once(CONFIG["repository_path"] . "ClientRepository.php");
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
        if (($coachsByEmail['conections'] == 0)) {
            $info = [
                'type' => 'sucess',
                'title' => 'Información',
                'text' => 'Bienvenido a la aplicación. Vamos a terminar de configurar tus datos'
            ];
            $this->redirect("/admin/information", $info);
        }
        viewbag("coach_info", $coachsByEmail['name'] . ' ' . $coachsByEmail['last_name'] . ',' . $coachsByEmail['image_path']);
        return View();
//$this->redirect("/admin/home", $info);
    }

    public function information() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $coach = new CoachRepository();
        $email = $_SESSION['user']['email'];

        try {
            $coachsByEmail = $coach->getByEmail($email);
            $coach_info = $coachsByEmail['email'] . ',' . $coachsByEmail['name'] . ',' .
                    $coachsByEmail['last_name'] . ',' . $coachsByEmail['image_path'] . ',' . $coachsByEmail['phone'] . ',' . $coachsByEmail['conections'];
            viewbag("coach_info", $coach_info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/admin/information", $info);
        }
        return View();
    }

    public function register() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
// Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
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

    public function updateCoachInfo() {
        $coach = new CoachRepository();
        $email = $_POST['email'];
        $coachsByEmail = $coach->getByEmail($email);
        $id = $coachsByEmail['id'];
        $name = $_POST['name'];
        $lastName = $_POST['last_name'];
        if ($_POST['image_path'] == "") {
            $image = $coachsByEmail['image_path'];
        } else {
            $image = $_POST['image_path']; // Usar la ruta de la imagen del campo oculto
        }


        $conection = 1;
        $phone = $_POST['phone'];
        try {
            $coach->updateCoach($id, $email, $name, $lastName, $image, $conection, $phone);

            $info = [
                'type' => 'success',
                'title' => 'Actualizado',
                'text' => 'Se han actualizado sus datos.'
            ];
            $this->redirect("/admin/home", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/admin/information", $info);
        }
    }

    public function onFileSelected() {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['image'])) {
                    // Define la ruta del directorio absoluto
                    $target_dir = __DIR__ . "/../../Public/Assets/img/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);

                    // Asegúrate de que el directorio exista
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // Ruta pública del archivo subido
                        $public_path = "img/" . basename($_FILES["image"]["name"]);
                        echo json_encode(["success" => true, "message" => "File uploaded successfully.", "path" => $public_path]);
                    } else {
                        echo json_encode(["success" => false, "message" => "Error uploading file."]);
                    }
                } else {
                    echo json_encode(["success" => false, "message" => "No file uploaded."]);
                }
            } else {
                echo json_encode(["success" => false, "message" => "Invalid request method."]);
            }
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => "Server error: " . $e->getMessage()]);
        }
    }

}
