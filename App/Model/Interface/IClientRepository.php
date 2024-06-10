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

    public function registClient($email, $name, $last_name, $phone, $birthDate, $discipline, $weight, $height, $pay_date, $comments, $password, $coach_id);

    public function getAllClients();

    public function updateClient($id, $email, $name, $last_name, $phone, $birthDate, $discipline, $weight, $height, $pay_date, $comments);

    public function searchByEmail($email);

    public function searchByCoach($id);
    
    public function updateClientConection($id, $password);
    
    public function removeClient($id);
}
