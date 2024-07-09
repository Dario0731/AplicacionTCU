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
interface ISportGroupRepository {

    //put your code here
    public function registGroup($name, $comments, $coachID);

    public function getSportGroupsByCoach($coach);
    
    public function getSportGroupByName($name);
    
    public function removeGroup($id);
    
    public function editGroup($id,$name,$comments);
}
