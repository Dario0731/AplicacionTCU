<?php

require_once CONFIG["interface_path"] . 'ICoachRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CoachRepository
 *
 * @author 50685
 */
class CoachRepository extends Model implements ICoachRepository {

    public function __construct() {
        parent::__construct('coach');
    }

    public function getAllCoachs() {
        $this->getAllCoachs();
    }

    public function registCoach($email, $conection) {
        $data = [
            varchar($email),
            varchar(''),
            varchar(''),
            varchar(''),
            varchar($conection),
            varchar('')
        ];
        return $this->create($data);
    }

    public function updateCoach($id, $email, $name, $lastName, $image, $conection, $phone) {
        $data = [
            varchar($id),
            varchar($email),
            varchar($name),
            varchar($lastName),
            varchar($image),
            varchar($conection),
            varchar($phone)
        ];
        return $this->update($data);
    }

    public function searchByEmail($email) {
        $this->getByEmail($email);
    }

}
