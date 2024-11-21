<?php

require_once "../models/client.php";
require_once "../config/Database.php";
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;
$correctUrl = $redirect ? "/".$redirect : "/";
$incorrectUrl = "/login.php" . ($redirect ? "?redirect=$redirect" : "");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = loginClient($email, $password);
    if ($result) {
        header("Location: $correctUrl");
    }
    else {
        header("Location: $incorrectUrl");
    }
}

