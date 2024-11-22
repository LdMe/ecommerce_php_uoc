<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";
$redirect =  $_GET['redirect'] ?? null;
$correctUrl = $redirect ? "/".$redirect : "/";
$incorrectUrl = "/login.php" . ($redirect ? "?redirect=$redirect" : "");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $clientModel = new Client();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $clientModel->loginRegistered($email, $password);
    if ($result) {
        header("Location: $correctUrl");
    }
    else {
        header("Location: $incorrectUrl");
    }
}

