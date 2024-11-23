<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
$clientModel = new Client();
$clientModel->logout();
$cartModel = new Cart();
$cartModel->delete();
header("Location: /");