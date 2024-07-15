<?php
require_once CONFIG["interface_path"] . 'ICoachMessengerRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CoachMessengerRepository
 *
 * @author 50685
 */
class CoachMessengerRepository extends Model implements ICoachMessenger {
    public function __construct() {
        parent::__construct('coach_messenger');
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
        return $this->getByCoach($id);
    }

    public function getMyMessages($id) {
        return $this->getById($id);
    }

    public function getAllCoachMessages() {
        return $this->getAll();
    }

    public function updateCoachMessage($id) {
                $data = [
            varchar($id)
        ];
        return $this->update($data);
    }

}
