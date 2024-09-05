<?php
require_once(CONFIG["repository_path"] . "EventClientRepository.php");
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
class EventClientController {
public function insertEventClient() {
    try {
        // Verifica que los datos POST existan
        if (!isset($_POST['group_name']) || !isset($_POST['client_id'])) {
            throw new Exception('Datos de entrada faltantes.');
        }

        $groupID = $_POST['group_name'];
        $clientId = $_POST['client_id'];

        $repo = new EventClientRepository();

 


        // Registra al cliente en el grupo
        $repo->createEventClient($clientId, $groupID);
       
        echo json_encode(['status' => 'success']);
    } catch (Exception $ex) {
        // Proporciona un mensaje de error más detallado
        echo json_encode(['status' => 'error', 'message' => $ex->getMessage()]);
    }
}
}
