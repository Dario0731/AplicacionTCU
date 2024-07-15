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
interface IMessengerRepository {
    //put your code here
   public function sendMessage($message,$coachID,$clientID);
   
   public function getClientMessages($id);
   
   public function getMyMessages($id);
}
