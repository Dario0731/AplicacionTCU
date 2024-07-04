<?php
require_once(CONFIG["repository_path"] . "ClientGroupRepository.php");
require_once(CONFIG["repository_path"] . "SportGroupRepository.php");
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ClientGroupController
 *
 * @author 50685
 */
class ClientGroupController {
public function insertClientGroup() {
    try {
        $groupName = $_POST['group_name'];
        $clientId = $_POST['client_id'];

        $sport = new SportGroupRepository();
        $repo = new ClientGroupRepository();

        $sportGr = $sport->getSportGroupByName($groupName);
        $sportID = $sportGr['id'];

        $repo->registClientGroup($clientId, $sportID);

        echo json_encode(['status' => 'success']);
    } catch (Exception $ex) {
        echo json_encode(['status' => 'error', 'message' => 'Hubo un problema con la solicitud.']);
    }
}

}
