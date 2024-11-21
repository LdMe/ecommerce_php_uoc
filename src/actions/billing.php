<?php

require_once "../config/Database.php";
require_once "../models/billing.php";
require_once "../models/client.php";

if (isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $address = $_POST['address'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $client = getLoggedInClient();
    if (empty($client)) {
        $client_id = createNonRegisteredClient();
    }else{
        $client_id = $client['client_id'];
    }
    createBilling($address, $email, $tel, $client_id);
    header("Location: /billing.php");
}