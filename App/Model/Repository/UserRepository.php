<?php
require_once CONFIG["interface_path"].'IUserRepository.php';
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

        public function __construct() {
        parent::__construct('user');
    }
    //put your code here


    public function registUser($email, $password,$type) {
        $data = [
            varchar($email),
            varchar($password),
            varchar($type)
        ];
        return $this->create($data);
    }

    public function getAllUsers() {
        return $this->getAllUsers();
    }

}
