<?php

/*require_onrequire_once 'Model/Repository';ce(MODEL_PATH."Event.model.php");
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AuthenticationController
 *
 * @author Darío Zamora
 */

require_once(CONFIG["repository_path"] . "UserRepository.php");
require_once("Lib/Core/Controller.php");


class AuthenticationController extends Controller
{
    
    //put your code here

    public function login()
    {
        return View();
    }

    public function register()
    {
        return View();
    }

    public function registUser()
    {
        //obtener los datos
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $type = 'Administrador';

        //logica para crear un anuncio
        $repo = new UserRepositry();
        $error = $repo->registUser($email, $pass, $type);
       $this ->redirect("/authentication/register");
    }

    public function loginUser()
    {
        //obtener los datos
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $type = $_POST["type"];
    }
}
