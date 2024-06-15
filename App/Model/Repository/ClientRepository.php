<?php

require_once CONFIG["interface_path"] . 'IClientRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CoachRepository
 *
 * @author 50685
 */
class ClientRepository extends Model implements IClientRepository {

    public function __construct() {
        parent::__construct('client');
    }

    public function getAllClients() {
        return $this->getAll();
    }

    public function registClient($email, $name, $last_name, $phone, $birthDate, $discipline,
            $weight, $height, $pay_date, $comments, $password, $coach_id, $fat, $muscle, $clientComment) {
        $data = [
            varchar($email),
            varchar($name),
            varchar($last_name),
            varchar($phone),
            varchar($birthDate),
            varchar($discipline),
            varchar($weight),
            varchar($height),
            varchar($pay_date),
            varchar($comments),
            varchar($password),
            varchar($coach_id),
            varchar($fat),
            varchar($muscle),
            varchar($clientComment)
        ];
        return $this->create($data);
    }
public function updateClientByCoach($id, $discipline, $weight, $height, $pay_date, $comments,$fat,$muscle,$clientComments){
                $data = [
            varchar($id),
            varchar($discipline),
            varchar($weight),
            varchar($height),
            varchar($pay_date),
            varchar($comments),
            varchar($fat),
            varchar($muscle),
            varchar($clientComments)
        ];
        return $this->updateClientAdmin($data);
}

    
    public function searchByEmail($email) {
        return $this->getByEmail($email);
    }

    public function searchByCoach($id) {
        return $this->getByCoach($id);
    }

    public function updateClientConection($id, $password) {
        $data = [
            varchar($id),
            varchar($password)
        ];
        return $this->updateConection($data);
    }

    public function removeClient($id) {
        return $this->remove($id);
    }

}
