<?php

require_once CONFIG["interface_path"] . 'IMessengerRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CoachRepository
 *
 * @author 50685
 */
class MessengerRepository extends Model implements IMessengerRepository {

    public function __construct() {
        parent::__construct('client_messenger');
    }

    public function sendMessage($message, $coachID, $clientID) {
                $data = [
            varchar($message),
            varchar($coachID),
            varchar($clientID)
        ];
        return $this->create($data);
    }

    public function getClientMessages($id) {
        return $this->getByClient($id);
    }

    public function getMyMessages($id) {
        return $this->getById($id);
    }

    public function updateMessage($id) {
                $data = [
            varchar($id)
        ];
        return $this->update($data);
    
    }

}