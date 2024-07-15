<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ICoachMessenger
 *
 * @author 50685
 */
interface ICoachMessenger {
      //put your code here
   public function sendMessage($message,$coachID,$clientID);
   
   public function getClientMessages($id);
   
   public function getMyMessages($id);
   
   public function getAllCoachMessages();
   
   public function updateCoachMessage($id);
}
