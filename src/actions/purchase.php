<?php

require "./models/client.php";

$clientModel = new Client();
$client_id  = $clientModel->getLoggedInClientId();
if(!isset($client_id)){
    header("Location: /");
}
$billingModel = new Billing();
$lastBilling = $billingModel->getLastByClient($client_id);
if(empty($lastBilling)){
    header("Location: /billing.php");
}

