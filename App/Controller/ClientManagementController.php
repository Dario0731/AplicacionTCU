<?php

require_once(CONFIG["repository_path"] . "ClientRepository.php");
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
            $password = $this->randomPassword();

            $client->registClient(
                    $email, $name, $lastName, $phone, $birthday, $discipline,
                    $weight, $height, $pay_date, $comments, $password, $id
            );

            $info = [
                'type' => 'success',
                'title' => 'Cliente Registrado correctamente',
                'text' => 'La contraseña generada para su cliente es: ' . $password
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

}

?>