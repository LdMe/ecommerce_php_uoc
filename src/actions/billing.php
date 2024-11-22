<?php

require_once "models/billing.php";
require_once "models/client.php";

if (isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $address = $_POST['address'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $clientModel = new Client();
    $client_id = $clientModel->getClientId();
    if (!isset($client_id)) {
        $client_id = $clientModel->createNonRegistered();
        $clientModel->loginNonRegistered($client_id);
    }
    $billingModel = new Billing();
    $billingModel->create($address, $email, $tel, $client_id);
    header("Location: /purchase.php");
}