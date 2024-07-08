<?php
require_once CONFIG["interface_path"].'ISportGroupRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserRepository
 *
 * @author 50685
 */
class SportGroupRepository extends Model implements ISportGroupRepository{
            public function __construct() {
        parent::__construct('sport_group');
    }

    public function registGroup($name, $comments, $coachID) {
                $data = [
            varchar($name),
            varchar($comments),
            varchar($coachID)
        ];
        return $this->create($data);
    }

    public function getSportGroupByName($name) {
        return $this->getByName($name);
    }

    public function getSportGroupsByCoach($coach) {
         return $this->getByCoach($coach);
    }

    public function removeGroup($id) {
        return $this->remove($id);
    }

}