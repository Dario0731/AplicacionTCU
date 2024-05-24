<?php
require_once 'Lib/Core/Model.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserRepository
 *
 * @author 50685
 */
class UserRepositry extends Model implements IUserRepository{

    //put your code here


    public function registUser($email, $password) {
        $data = [
            varchar($email),
            varchar($password),
            varchar('Administrador'),
        ];
        return $this->create($data);
    }

}
