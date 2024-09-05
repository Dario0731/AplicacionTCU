<?php
require_once CONFIG["interface_path"] . 'IEventClientRepository.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class EventClientRepository extends Model implements IEventClientRepository{
    
        public function __construct() {
        parent::__construct('client_event');
    }
    
    public function createEventClient($clientID, $eventID) {
                $data = [
            varchar($clientID),
            varchar($eventID)
        ];
        return $this->create($data);    }

    public function getEventsClients($id) {
        
    }

    public function removeEventClients($id) {
        
    }

}