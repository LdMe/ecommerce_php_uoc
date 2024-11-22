<?php

require $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";
require $_SERVER['DOCUMENT_ROOT'] ."/models/billing.php";
require $_SERVER['DOCUMENT_ROOT'] ."/models/purchase.php";
require $_SERVER['DOCUMENT_ROOT'] ."/models/cart.php";

$clientModel = new Client();
$billingModel = new Billing();
$purchaseModel = new Purchase();
$cartModel = new Cart();
$cart = $cartModel->get();
$client_id  = $clientModel->getLoggedInClientId();
if(!isset($client_id)){
    header("Location: /");
    exit();
}
$lastBilling = $billingModel->getLastByClient($client_id);
if(empty($lastBilling)){
    header("Location: /billing.php");
    exit();
}

$purchaseModel->create($client_id, $lastBilling['billing_info_id'], $cart);
$cartModel->delete();
header('Location:/purchase-history.php');