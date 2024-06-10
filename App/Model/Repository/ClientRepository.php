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

    public function registClient($email, $name, $last_name, $phone, $birthDate, $discipline, $weight, $height, $pay_date, $comments, $password, $coach_id) {
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
            varchar($coach_id)
        ];
        return $this->create($data);
    }

    public function updateClient($id, $email, $name, $last_name, $phone, $birthDate, $discipline, $weight, $height, $pay_date, $comments) {
        $data = [
            varchar($id),
            varchar($email),
            varchar($name),
            varchar($last_name),
            varchar($phone),
            varchar($birthDate),
            varchar($discipline),
            varchar($weight),
            varchar($height),
            varchar($pay_date),
            varchar($comments)
        ];
        return $this->update($data);
    }

    public function searchByEmail($email) {
      return  $this->getByEmail($email);
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
