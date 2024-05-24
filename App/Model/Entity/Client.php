<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Persona
 *
 * @author Darío Zamora
 */
class Client {
    //put your code here
    private $id;
    private $name;
    private $lastName;
    private $weight;
    private $height;
    
    public function __construct($id, $name, $lastName, $weight, $height) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->weight = $weight;
        $this->height = $height;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setLastName($lastName): void {
        $this->lastName = $lastName;
    }

    public function setWeight($weight): void {
        $this->weight = $weight;
    }

    public function setHeight($height): void {
        $this->height = $height;
    }


    
}
