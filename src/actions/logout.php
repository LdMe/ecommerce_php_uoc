<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";

$clientModel = new Client();
$clientModel->logout();
header("Location: /");