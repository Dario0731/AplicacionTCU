<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ICoachRepository
 *
 * @author 50685
 */
interface IClientRepository {

    public function registClient($email, $name, $last_name, $phone, $birthDate, $discipline, 
            $weight, $height, $pay_date, $comments, $password, $coach_id,$fat,$muscle,$clientComment);

    public function getAllClients();

    public function updateClientByCoach($id, $discipline, $weight, $height, $pay_date, $comments,$fat,$muscle,$clientComments);

    public function searchByEmail($email);

    public function searchByCoach($id);
    
    public function updateClientConection($id, $password);
    
    public function removeClient($id);
    
    public function updatePersonalInfo($id, $email,$name, $lastName, $phone, $birthdate);
}
