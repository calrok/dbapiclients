<?php
namespace roc\dbapiclients;
use \PDO;

include_once 'client.php';


class ApiClients
{

    function getAll()
    {
        $client = new client();

        $clients = array();

        $clients['register'] = array();

        $result = $client->readClients();

        if ($result->rowCount()) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $register = array(
                    'clientID' => $row['clientID'],
                    'clientEmail' => $row['clientEmail'],
                    'date' => $row['date'],
                    'orderQty' => $row['orderQty'],
                );
                array_push($clients['register'], $register);
            }
            http_response_code(200);
            echo json_encode($clients);
        } else {
            http_response_code(404);
            echo json_decode(array('message' => 'Elemento no encontrado'));
        }
    }

    function getForDomain($domain){
        $client = new client();

        $clients = array();

        $clients['register'] = array();

        $result = $client->readClientsForDomain($domain);

        if ($result->rowCount()) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $register = array(
                    'clientID' => $row['clientID'],
                    'clientEmail' => $row['clientEmail'],
                    'date' => $row['date'],
                    'orderQty' => $row['orderQty'],
                );
                array_push($clients['register'], $register);
            }
            http_response_code(200);
            echo json_encode($clients);
        } else {
            http_response_code(404);
            echo json_decode(array('message' => 'Elemento no encontrado'));
        }
    }

    function getForDate($date){
        $client = new client();

        $clients = array();

        $clients['register'] = array();

        $result = $client->readClientsForDate($date);

        if ($result->rowCount()) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $register = array(
                    'clientID' => $row['clientID'],
                    'clientEmail' => $row['clientEmail'],
                    'date' => $row['date'],
                    'orderQty' => $row['orderQty'],
                );
                array_push($clients['register'], $register);
            }
            http_response_code(200);
            echo json_encode($clients);
        } else {
            http_response_code(404);
            echo json_decode(array('message' => 'Elemento no encontrado'));
        }
    }
}


$api = new ApiClients();
if(!empty($_GET["domain"])){
    $api->getForDomain($_GET["domain"]);
} else if(!empty($_GET["date"])){
    $api->getForDate($_GET["date"]);
} else {
    $api->getAll();
}




?>