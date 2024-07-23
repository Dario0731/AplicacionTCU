<?php

require_once(CONFIG["repository_path"] . "ClientRepository.php");
require_once(CONFIG["repository_path"] . "ProgressRepository.php");
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
class ClientController extends Controller
{

    public function home()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $this->firstConection();
        try {
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

    public function coachInfo()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $repository = new ClientRepository();
        $clientByEmail = $repository->getByEmail($_SESSION['user']['email']);
        $coach_info = $clientByEmail['coachEmail'] . ',' . $clientByEmail['coachName'] . ',' .
            $clientByEmail['coachLast_name'] . ',' . $clientByEmail['imagenCoach'] . ',' . $clientByEmail['coachPhone'];
        viewbag("coach_info", $coach_info);
        return view();
    }

    public function information()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        try {
            $repository = new ClientRepository();
            $clientByEmail = $repository->getByEmail($_SESSION['user']['email']);
            $client_info = $clientByEmail['email'] . ',' . $clientByEmail['name'] . ',' .
                $clientByEmail['last_name'] . ',' . $clientByEmail['phone'] . ',' . $clientByEmail['birth_date'];
            viewbag("client_info", $client_info);
        } catch (Exception $ex) {
        }


        return view();
    }

    public function passwordAct()
    {
        return view();
    }

    private function firstConection()
    {
        $email = $_SESSION['user']['email'];
        $repository = new ClientRepository();
        $clientByEmail = $repository->searchByEmail($_SESSION['user']['email']);
        if (($clientByEmail['conections'] == 0)) {

            $info = [
                'type' => 'sucess',
                'title' => 'Bienvenido',
                'text' => 'Bienvenido a la aplicación. Vamos a cambiar tu contraseña'
            ];
            $this->redirect("/client/passwordAct", $info);
        }
    }

    public function updatePasswordClient()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $email = $_SESSION['user']['email'];
        $repository = new ClientRepository();
        $clientByEmail = $repository->searchByEmail($_SESSION['user']['email']);
        $id = $clientByEmail['id'];
        $actualPass = $_POST['actual_password'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if ($actualPass == $clientByEmail['password']) {
            if (strlen($password) < 6 || strlen($password) > 8) {
                $info = [
                    'type' => 'error',
                    'title' => 'Ha ocurrido un problema',
                    'text' => 'La contraseña debe tener entre 6 y 8 carácteres.'
                ];
                $this->redirect("/client/passwordAct", $info);
            }
            if ($password != $confirm) {
                $info = [
                    'type' => 'error',
                    'title' => 'Ha ocurrido un problema',
                    'text' => 'Las contraseñas no coinciden'
                ];
                $this->redirect("/client/passwordAct", $info);
            }

            try {
                $repository->updateClientConection($id, $password);
                $info = [
                    'type' => 'sucess',
                    'title' => 'Actualizado',
                    'text' => 'Contraseña actualizada correctamente'
                ];
                $this->redirect("/client/home", $info);
            } catch (Exception $ex) {
                $info = [
                    'type' => 'error',
                    'title' => 'Error en el servidor',
                    'text' => 'Error en el servidor, intentelo más tarde.'
                ];
                $this->redirect("/client/passwordAct", $info);
            }
        } else {
            $info = [
                'type' => 'error',
                'title' => 'La contraseña es incorrecta',
                'text' => 'La contraseña actual es incorrecta.'
            ];
            $this->redirect("/client/passwordAct", $info);
        }
    }

    public function updatePersonalInfo()
    {
        $email = $_SESSION['user']['email'];
        $repository = new ClientRepository();
        $clientByEmail = $repository->searchByEmail($_SESSION['user']['email']);
        $id = $clientByEmail['id'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birthdate'];
        try {
            $repository->updatePersonalInfo($id, $email, $name, $last_name, $phone, $birthdate);
            $info = [
                'type' => 'sucess',
                'title' => 'Actualizado',
                'text' => 'Datos actualizados correctamente'
            ];
            $this->redirect("/client/home", $info);
        } catch (Exception $ex) {
            $info = [
                'type' => 'error',
                'title' => 'Error en el servidor',
                'text' => 'Error en el servidor, intentelo más tarde.'
            ];
            $this->redirect("/client/information", $info);
        }
    }
    public function progress()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $email = $_SESSION['user']['email'];
        $clientRepo = new ClientRepository();
        $result = $clientRepo->searchByEmail($email);
        $id = $result['id'];
        $progressRepo = new ProgressRepository();
        $progressList = $progressRepo->getClientProgress($id);
        viewbag("clientes", $progressList);

        return view();
    }


    public function graphic()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['email'])) {
            // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
            $this->redirect("/authentication/login");
        }
        $email = $_SESSION['user']['email'];
        $clientRepo = new ClientRepository();
        $result = $clientRepo->searchByEmail($email);
        $id = $result['id'];
        $progressRepo = new ProgressRepository();
        $progressList = $progressRepo->getClientProgress($id);

        // Pasar los datos a la vista
        viewbag("progress", $progressList);

        return view();
    }
}
