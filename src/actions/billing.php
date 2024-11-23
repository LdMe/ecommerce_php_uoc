<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/billing.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
if (isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $address = $_POST['address'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $clientModel = new Client();
    $client_id = $clientModel->getLoggedInClientId();
    if (!isset($client_id) || !$clientModel->checkLoggedInClientInDb()) {
        $client_id = $clientModel->createNonRegistered();
        $clientModel->loginNonRegistered($client_id);
    }
    $billingModel = new Billing();
    $billingModel->create($address, $email, $tel, $client_id);
    header("Location: /purchase.php");
}else{
    header("Location: /billing.php");
}
