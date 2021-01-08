<?php

include __DIR__ . "/../vendor/autoload.php";

$apiClients= new \roc\dbapiclients\ApiClients();

echo $apiClients->getAll();
?>