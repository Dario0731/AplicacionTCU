<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once CONFIG["interface_path"] . 'IProgressRepository.php';
/**
 * Description of ProgressRepository
 *
 * @author 50685
 */
class ProgressRepository extends Model implements IProgressRepository{
    //put your code here
        public function __construct() {
        parent::__construct('progress');
    }
      public function getClientProgress($id){
         return $this->getProgressBy($id);
      }

    public function removeProgress($id) {
        return $this->remove($id);
    }

}
