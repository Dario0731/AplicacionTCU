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
interface ICoachRepository {

    public function registCoach($email, $conection);

    public function getAllCoachs();

    public function updateCoach($id,$email,$name,$lastName,$image,$conection,$phone); 
    
     public function searchByEmail($email);
}
