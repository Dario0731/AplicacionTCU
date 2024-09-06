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
interface IEventRepository {
    //put your code here
    public function getEvents($id);
  public function getEventsByID($id);
        public function removeEvent($id);
    
    public function createEvent($title,$description,$startDate,$endDate,$color,$coachID);
}
