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
    private $phone; 
    private $birthday;
    private $discipline;
    private $weight;
    private $height;
    private $pay_date;
    
    public function __construct($id, $name, $lastName, $phone, $birthday, $discipline, $weight, $height, $pay_date) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->discipline = $discipline;
        $this->weight = $weight;
        $this->height = $height;
        $this->pay_date = $pay_date;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getDiscipline() {
        return $this->discipline;
    }

    public function getPay_date() {
        return $this->pay_date;
    }

    public function setPhone($phone): void {
        $this->phone = $phone;
    }

    public function setBirthday($birthday): void {
        $this->birthday = $birthday;
    }

    public function setDiscipline($discipline): void {
        $this->discipline = $discipline;
    }

    public function setPay_date($pay_date): void {
        $this->pay_date = $pay_date;
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
