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

    public function getProgressBy($id) {
        $queryString = 'CALL sp_get_client_' . $this->entity . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function getIDS($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '_ids' . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
    
    public function create($data) {
        $queryString = 'CALL sp_create_' . $this->entity . '(' . implode(', ', $data) . ')';

        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }

    public function createGP($data) {
        $queryString = 'CALL sp_create_' . $this->entity . '(' . implode(', ', $data) . ')';

        $query = $this->db->prepare($queryString);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['new_id'];
    }

    public function getAll() {
        $query = $this->db->prepare('CALL sp_get_all_' . $this->entity . '()');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getById($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '(' . $id . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        $resuldado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resuldado;
    }

    public function remove($id) {
        $queryString = 'CALL sp_remove_' . $this->entity . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query->rowCount();
    }

    public function remove2Params($id, $secondParam) {
        $queryString = 'CALL sp_remove_' . $this->entity . '(:id, :secondParam)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':secondParam', $secondParam, PDO::PARAM_STR);
        $query->execute();
        return $query->rowCount();
    }

    public function update($data) {
        $queryString = 'CALL sp_update_' . $this->entity . '(' . implode(', ', $data) . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }

    public function updateInfo($data) {
        $queryString = 'CALL sp_update_' . $this->entity . '_info' . '(' . implode(', ', $data) . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }

    public function getByEmail($email) {
        $queryString = 'CALL sp_get_' . $this->entity . '_by_email' . '(:email)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado[0];
    }

    public function getByName($name) {
        $queryString = 'CALL sp_get_' . $this->entity . '_by_name' . '(:name)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado[0];
    }

    public function getByCoach($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '_by_coach' . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

        public function getByClient($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '_by_client' . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
    
    public function getGroupById($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '_by_id' . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function getGroupModel($id) {
        $queryString = 'CALL sp_get_' . $this->entity . '(:id)';
        $query = $this->db->prepare($queryString);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function updateConection($data) {
        $queryString = 'CALL sp_update_conection_' . $this->entity . '(' . implode(', ', $data) . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }

    public function updateClientAdmin($data) {
        $queryString = 'CALL sp_update_' . $this->entity . '_admin' . '(' . implode(', ', $data) . ')';
        $query = $this->db->prepare($queryString);
        $query->execute();
        return $query->rowCount();
    }

}
