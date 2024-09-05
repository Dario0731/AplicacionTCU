<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of IProgressRepository
 *
 * @author 50685
 */
interface IEventClientRepository {
    //put your code here
    public function getEventsClients($id);

        public function removeEventClients($id);
    
    public function createEventClient($clientID,$eventID);
}
