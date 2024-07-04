<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of IUserRepository
 *
 * @author 50685
 */
interface IClientGroupRepository {

    //put your code here
    public function registClientGroup($clientID, $coachID);

    public function getAllClientGroups();
}