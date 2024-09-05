<?php

require_once CONFIG["interface_path"] . 'IEventRepository.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of EventRepository
 *
 * @author 50685
 */
class EventRepository extends Model implements IEventRepository {

    public function __construct() {
        parent::__construct('event');
    }

    public function createEvent($title, $description, $startDate, $endDate, $color, $coachID) {
        $data = [
            varchar($title),
            varchar($description),
            varchar($startDate),
            varchar($endDate),
            varchar($color),
            varchar($coachID)
        ];
        return $this->createEV($data);
    }

    public function getEvents($id) {
       return $this->getById($id);
    }

    public function removeEvent($id) {
        return $this->remove($id);
    }

}
