<?php

require_once(CONFIG["repository_path"] . "ClientRepository.php");
require_once(CONFIG["repository_path"] . "ProgressRepository.php");
require_once(CONFIG["repository_path"] . "CoachRepository.php");
require_once("Lib/Core/Controller.php");

class ClientManagementController extends Controller {

    public function insertClient() {
        try {
            $coach = new CoachRepository();
            $email = $_SESSION['user']['email'];
            // $email = '123@gmail.com';
            $coachsByEmail = $coach->getByEmail($email);
            $id = $coachsByEmail['id'];
            $client = new ClientRepository();

            $email = $_POST['email'];
            $name = $_POST['name'];
            $lastName = $_POST['last_name'];
            $phone = $_POST['phone'];
            $birthday = $_POST['birthday'];

            $discipline = $_POST['discipline'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $pay_date = $_POST['pay'];
            $comments = $_POST['comments'];
            $fat = $_POST['fat'];
            $muscle = $_POST['muscle'];
            $commentsClient = $_POST['clients_comments'];
            $password = $this->randomPassword();

            $client->registClient(
                    $email, $name, $lastName, $phone, $birthday, $discipline,
                    $weight, $height, $pay_date, $comments, $password, $id, $fat, $muscle, $commentsClient
            );

            $info = [
                'type' => 'success',
                'title' => 'Cliente Registrado correctamente',
                'text' => 'La contraseña generada para su cliente es: ' . $password
            ];

            $this->redirect("/admin/register", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/admin/register", $info);
        }
    }

    public function randomPassword() {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 8;
        $cadena_aleatoria = '';
        for ($i = 0; $i < $longitud; $i++) {
            $indice_aleatorio = mt_rand(0, strlen($caracteres) - 1);
            $cadena_aleatoria .= $caracteres[$indice_aleatorio];
        }
        return $cadena_aleatoria;
    }



    public function updateClient() {

       // $email = $_SESSION['user']['email'];
        try {

        $email =$_POST['email'];
        $clientRepo = new ClientRepository();
        $clientByEmail = $clientRepo->searchByEmail($email);
           $id = $clientByEmail['id'];
            $pay_date = $_POST['pay'];
            $discipline = $_POST['discipline'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $coments = $_POST['comments'];
            $fat = $_POST['fat'];
            $muscle = $_POST['mucle'];
            $comentsForClient = $_POST['clients_comments'];

            $clientRepo->updateClientByCoach($id, $discipline, $weight, $height, $pay_date, $coments, $fat, $muscle, $comentsForClient);
            $info = [
                'type' => 'success',
                'title' => 'Cliente actualizado correctamente',
                'text' => 'Se ha guardado el progreso del cliente'
            ];
            $this->redirect("/admin/clients", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Ha ocurrido un problema',
                'text' => 'Ha ocurrido un problema con el servidor.'
            ];
            $this->redirect("/admin/clients", $info);
        }
    }
public function removeProgress() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        if (!empty($id)) {
            $progressRepo = new ProgressRepository();
            $result = $progressRepo->removeProgress($id);

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
    public function removeClient() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if (!empty($id)) {
                $clientRepository = new ClientRepository();
                $result = $clientRepository->removeClient($id);

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
}

?>