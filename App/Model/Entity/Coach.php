<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Coach
 *
 * @author 50685
 */
class Coach {
    private $id;
    private $email;
    private $password;
    private $name;
    private $lastName;
    private $image_path;
    private $conections;
    private $phone;
    public function __construct($id, $email, $password, $name, $lastName, $image_path, $conections, $phone) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->image_path = $image_path;
        $this->conections = $conections;
        $this->phone = $phone;
    }
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getImage_path() {
        return $this->image_path;
    }

    public function getConections() {
        return $this->conections;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setLastName($lastName): void {
        $this->lastName = $lastName;
    }

    public function setImage_path($image_path): void {
        $this->image_path = $image_path;
    }

    public function setConections($conections): void {
        $this->conections = $conections;
    }

    public function setPhone($phone): void {
        $this->phone = $phone;
    }


}
