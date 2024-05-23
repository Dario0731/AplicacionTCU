<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Usuario
 *
 * @author 50685
 */
class User {
   private $id;
    private $email;
    private $password;
    private $type;
    
    public function __construct($email, $password, $type) {
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
    }

    
}
