<?php
require_once CONFIG["interface_path"].'IClientGroupRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserRepository
 *
 * @author 50685
 */
class ClientGroupRepository extends Model implements IClientGroupRepository{
            public function __construct() {
        parent::__construct('clients_group');
    }
    public function getAllClientGroups() {
                return $this->getAll();
    }

    public function registClientGroup($clientID, $coachID) {
                        $data = [
            varchar($clientID),
            varchar($coachID)
        ];
        return $this->create($data);
    }

}