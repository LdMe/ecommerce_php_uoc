<?php
require "./config/Database.php";
require "./models/client.php";

$client_id  = getClientId();
if(!isset($client_id)){
    header("Location: /");
}

$lastBilling = getLastBilling($client_id);
if(empty($lastBilling)){
    header("Location: /billing.php");
}

