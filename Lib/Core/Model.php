<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Model
 *
 * @author Darío Zamora
 */
class Model {
    
    protected $db;
    protected $entity;
    
    public function __construct($entity) {
        $this->entity = $entity;
        $this->db = Database::getInstance();
        
    }
        public function create($data)
    {
        $queryString = 'CALL sp_create_' . $this->entity . '(' . implode(', ', $data) . ')';

        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
        
    }
    public function getAll()
    {
        $query = $this->db->prepare('CALL sp_get_all_' . $this->entity . '()');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getById($id)
    {
        $queryString = 'CALL sp_get_' . $this->entity . '(' . $id . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        $resuldado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resuldado[0];
    }
    public function update($id, $data)
    {
        $queryString = 'CALL sp_update_' . $this->entity . '(' . implode(', ', $data) . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }
}
